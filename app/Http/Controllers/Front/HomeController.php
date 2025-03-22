<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeCartSection;
use App\Models\HomeFollow;
use App\Models\Keyfiyet;
use App\Models\TranslationManage;
use App\Models\ContactMessage;
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
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'message' => 'required|string',
            ]);

            DB::beginTransaction();
            
            $contactMessage = ContactMessage::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'message' => $validated['message'],
                'status' => false 
            ]);

            Mail::to('museyibli.ruhin@gmail.com')->send(new ContactMail($contactMessage));
            
            DB::commit();

            return redirect()->back()->with('success', 'Mesajınız uğurla göndərildi!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Contact message error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Xəta baş verdi, zəhmət olmasa yenidən cəhd edin!')->withInput();
        }
    }

    public function contact()
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
            $settings[$translation->key] = $translation->{'value_' . app()->getLocale()};
        }

        // Varsayılan değerleri ekle
        $settings = array_merge([
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
            'search' => 'Ara'
        ], $settings);
        
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
            'allServices'
        ));
    }
} 