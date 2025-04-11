<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TranslationManage;
use App\Models\Service;
use App\Models\Socialfooter;
use App\Models\Socialshare;
use App\Models\Contact;

class ServiceController extends Controller
{
    public function index()
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
        $defaultSettings = [
            'home' => 'Ana Sayfa',
            'about' => 'Hakkımızda',
            'services' => 'Hizmetler',
            'products' => 'Ürünler',
            'blog' => 'Blog',
            'contact' => 'İletişim',
            'search' => 'Ara',
            
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
            'our_shop' => 'Mağazamız',
            'contact_we' => 'İletişim',
            'all_rights_reserved' => 'Tüm hakları saklıdır.',
            'number_footer' => '+90 123 456 7890'
        ];

        $settings = array_merge($defaultSettings, $settings);
        
        $services = Service::latest()->get();
        $allServices = Service::all();
        
        // Footer sosyal medya ikonları
        $socialfooters = Socialfooter::orderBy('order')->get();
        
        // Sosyal paylaşım ikonları
        $socialshares = Socialshare::where('status', 1)->orderBy('order')->get();
        
        // İletişim bilgilerini al
        $contactInfo = Contact::first();

        $route_name = 'front.service';
        $locale = app()->getLocale();

        return view('front.pages.service', compact(
            'settings', 
            'route_name', 
            'locale', 
            'header', 
            'services',
            'translations',
            'allServices',
            'socialfooters',
            'socialshares',
            'contactInfo'
        ));
    }

    public function show($id)
    {
        // Tüm çevirileri al
        $translations = TranslationManage::where('status', 1)->get();
        
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
            'our_shop' => 'Mağazamız',
            'contact_we' => 'İletişim',
            'all_rights_reserved' => 'Tüm hakları saklıdır.',
            'number_footer' => '+90 123 456 7890'
        ];

        $settings = array_merge($defaultSettings, $settings);
        
        $service = Service::findOrFail($id);
        $services = Service::latest()->take(4)->get();
        $allServices = Service::all();
        
        // Footer sosyal medya ikonları
        $socialfooters = Socialfooter::orderBy('order')->get();
        
        // Sosyal paylaşım ikonları
        $socialshares = Socialshare::where('status', 1)->orderBy('order')->get();
        
        // İletişim bilgilerini al
        $contactInfo = Contact::first();

        $route_name = 'front.service.show';
        $locale = app()->getLocale();

        return view('front.pages.service-details', compact(
            'settings', 
            'route_name', 
            'locale', 
            'header', 
            'service',
            'services',
            'translations',
            'allServices',
            'socialfooters',
            'socialshares',
            'contactInfo'
        ));
    }
} 