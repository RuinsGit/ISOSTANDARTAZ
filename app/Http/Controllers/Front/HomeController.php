<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeCartSection;
use App\Models\HomeFollow;
use App\Models\Keyfiyet;
use App\Models\TranslationManage;
use App\Models\ContactMessage;
use App\Models\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        // Tüm çevirileri al
        $translations = TranslationManage::where('status', 1)->get();
        
        // Settings için çevirileri hazırla
        $settings = [];
        foreach ($translations as $translation) {
            $settings[$translation->key] = $translation->{'value_' . app()->getLocale()};
        }

        // Varsayılan değerleri ekle
        $defaultSettings = [
            'home' => 'Ana Sayfa',
            'about' => 'Hakkımızda',
            'services' => 'Hizmetler',
            'products' => 'Ürünler',
            'blog' => 'Blog',
            'contact' => 'İletişim',
            'search' => 'Ara',
            'loading' => 'Yükleniyor...',
            'new_in_stock' => 'Stokta Yeni',
            'next_gen_cars' => 'Yeni Nesil Arabalar',
            'discover_innovation' => 'İnovasyonu Keşfedin',
            'buy_this_car' => 'Bu Arabayı Satın Al',
            'explore_more' => 'Daha Fazla Keşfet',
            'follow' => 'Takip Et',
            'variety_of_cars' => 'Araba Çeşitleri',
            'variety_desc' => 'Geniş araba seçenekleri',
            'next_gen_cars_2' => 'Yeni Nesil Arabalar 2',
            'next_gen_cars_3' => 'Yeni Nesil Arabalar 3',
            'discover_innovation_2' => 'İnovasyonu Keşfedin 2',
            'discover_innovation_3' => 'İnovasyonu Keşfedin 3',
            'buy_this_car_2' => 'Bu Arabayı Satın Al 2',
            'buy_this_car_3' => 'Bu Arabayı Satın Al 3',
            'explore_more_2' => 'Daha Fazla Keşfet 2',
            'explore_more_3' => 'Daha Fazla Keşfet 3',
            'competitive_pricing' => 'Rekabetçi Fiyatlandırma',
            'competitive_pricing_desc' => 'En uygun fiyatlarla en iyi arabalar',
            'support' => '7/24 Destek',
            'support_desc' => 'Her zaman yanınızdayız',
            'sign_up_never_miss_a_deal' => 'Kaydolun ve Fırsatları Kaçırmayın',
            
            // Footer çevirileri
            'contact_us' => 'Bize Ulaşın',
            'call_us' => 'Bizi Arayın',
            'our_projects' => 'Projelerimiz',
            'location' => 'Konum',
            'working_hours' => 'Pazar - Cuma 24/7',
            'store_location' => 'Mağaza Konumu',
            'footer_about' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.',
            'pages' => 'Sayfalar',
            'portfolio' => 'Portfolyo',
            'our_blog' => 'Blog',
            'services' => 'Hizmetler',
            'our_shop' => 'Mağazamız',
            'contact_we' => 'İletişim',
            'all_rights_reserved' => 'Tüm hakları saklıdır.',
            'number_footer' => '+90 123 456 7890'
        ];

        $settings = array_merge($defaultSettings, $settings);

        // Ana sayfa için gerekli verileri çek
        $homeCartSections = HomeCartSection::where('status', 1)->latest()->get();
        $homeFollows = HomeFollow::where('status', 1)->latest()->get();
        $keyfiyet = Keyfiyet::first();
        
        // Hizmetleri çek (navbar için)
        $allServices = Service::all();

        $route_name = 'front.index';
        $locale = app()->getLocale();

        return view('front.pages.index', compact(
            'settings',
            'route_name',
            'locale',
            'homeCartSections',
            'homeFollows',
            'keyfiyet',
            'translations',
            'allServices'
        ));
    }

    public function about()
    {
        // Tüm çevirileri al
        $translations = TranslationManage::where('status', 1)->get();
        
        // Header için çevirileri hazırla
        $header = new \stdClass();
        foreach ($translations as $translation) {
            $field = $translation->key . '_' . app()->getLocale();
            $header->$field = $translation->{'value_' . app()->getLocale()};
        }

        // Settings için çevirileri hazırla
        $settings = [];
        foreach ($translations as $translation) {
            if ($translation->group === 'navbar') {
                $settings[$translation->key] = $translation->{'value_' . app()->getLocale()};
            }
        }

        // Varsayılan değerleri ekle
        $settings = array_merge([
            'home' => 'Ana Sayfa',
            'about' => 'Hakkımızda',
            'services' => 'Hizmetler',
            'products' => 'Ürünler',
            'blog' => 'Blog',
            'contact' => 'İletişim',
            'search' => 'Ara'
        ], $settings);
        
        // Hizmetleri çek (navbar için)
        $allServices = Service::all();

        $route_name = 'front.about';
        $locale = app()->getLocale();

        return view('front.pages.about', compact(
            'settings', 
            'route_name', 
            'locale', 
            'header',
            'translations',
            'allServices'
        ));
    }

    public function storeMessage(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email|max:255',
                'website' => 'nullable|string|max:255',
                'comment' => 'required|string',
            ]);

            DB::beginTransaction();
            
            $contactRequest = ContactRequest::create([
                'email' => $validated['email'],
                'website' => $validated['website'] ?? null,
                'comment' => $validated['comment'],
                'status' => false 
            ]);

            Mail::to('museyibli.ruhin@gmail.com')->send(new ContactMail($contactRequest));
            
            DB::commit();

            return redirect()->back()->with('success', 'Mesajınız uğurla göndərildi!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Contact request error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Xəta baş verdi, zəhmət olmasa yenidən cəhd edin!')->withInput();
        }
    }

    public function contact()
    {
        // Tüm çevirileri al
        $translations = TranslationManage::where('status', 1)->get();
        
        // Settings için çevirileri hazırla
        $settings = [];
        foreach ($translations as $translation) {
            $settings[$translation->key] = $translation->{'value_' . app()->getLocale()};
        }

        // Navbar için gerekli çevirileri içeren header dizisini oluştur
        $navbarKeys = ['home', 'about', 'services', 'pages', 'portfolio', 'contact_us', 'shop', 'cart', 'blog'];
        $header = new \stdClass();
        foreach ($navbarKeys as $key) {
            $translation = $translations->where('key', $key)->first();
            if ($translation) {
                $field = $key . '_' . app()->getLocale();
                $header->$field = $translation->{'value_' . app()->getLocale()};
            }
        }

        // Varsayılan değerleri ekle
        $defaultSettings = [
            'home' => 'Ana Sayfa',
            'about' => 'Hakkımızda',
            'services' => 'Hizmetler',
            'products' => 'Ürünler',
            'blog' => 'Blog',
            'contact' => 'İletişim',
            'contact_us' => 'Bize Ulaşın',
            'phone' => 'Telefon',
            'email' => 'E-posta',
            'address' => 'Adres',
            'send_message' => 'Mesaj Gönder',
            'your_name' => 'Adınız',
            'your_email' => 'E-posta Adresiniz',
            'your_phone' => 'Telefon Numaranız',
            'your_message' => 'Mesajınız',
            'send' => 'Gönder',
            'get_in_touch' => 'Bizimle İletişime Geçin',
            'website' => 'Web Siteniz', 
            'search' => 'Ara',
            
            // Footer çevirileri
            'working_hours' => 'Pazar - Cuma 24/7',
            'contact_us' => 'Bize Ulaşın',
            'call_us' => 'Bizi Arayın',
            'our_projects' => 'Projelerimiz',
            'location' => 'Konum',
            'store_location' => 'Mağaza Konumu',
            'footer_about' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.',
            'pages' => 'Sayfalar',
            'portfolio' => 'Portfolyo',
            'our_blog' => 'Blog',
            'our_shop' => 'Mağazamız',
            'contact_we' => 'İletişim',
            'all_rights_reserved' => 'Tüm hakları saklıdır.',
            'number_footer' => '+90 123 456 7890'
        ];

        $settings = array_merge($defaultSettings, $settings);
        
        // Admin panelinden girilen iletişim bilgilerini al
        $contactInfo = \App\Models\Contact::first();
        
        // İletişim sayfası banner fotoğrafını al
        $contactPhoto = \App\Models\ContactPhoto::where('status', 1)->first();
        
        // İletişim formu için ek veriler
        $contactData = \App\Models\ContactData::where('status', 1)->first();
        
        // Hizmetleri çek (navbar için)
        $allServices = Service::all();

        $route_name = 'front.contact';
        $locale = app()->getLocale();

        return view('front.pages.contact', compact(
            'settings', 
            'route_name', 
            'locale', 
            'header',
            'translations',
            'allServices',
            'contactInfo',
            'contactPhoto',
            'contactData'
        ));
    }
} 