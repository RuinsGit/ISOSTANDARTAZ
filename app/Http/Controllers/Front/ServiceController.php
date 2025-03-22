<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TranslationManage;
use App\Models\Service;

class ServiceController extends Controller
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
            'about_us' => 'Hakkımızda',
            'services' => 'Hizmetler',
            'service' => 'Hizmet',
            'service_details' => 'Hizmet Detayları',
            'products' => 'Ürünler',
            'blog' => 'Blog',
            'contact' => 'İletişim',
            'search' => 'Ara',
            'what_we_do' => 'Ne Yapıyoruz',
            'services_we_offer' => 'Sunduğumuz Hizmetler',
            'read_more' => 'Devamını Oku',
            
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

        // Service verilerini getir
        $services = Service::all();

        $route_name = 'front.service';
        $locale = app()->getLocale();

        return view('front.pages.service', compact(
            'settings', 
            'services',
            'route_name', 
            'locale',
            'translations'
        ));
    }

    public function show($id)
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
            'about_us' => 'Hakkımızda',
            'services' => 'Hizmetler',
            'service' => 'Hizmet',
            'service_details' => 'Hizmet Detayları',
            'products' => 'Ürünler',
            'blog' => 'Blog',
            'contact' => 'İletişim',
            'search' => 'Ara',
            'what_we_do' => 'Ne Yapıyoruz',
            'services_we_offer' => 'Sunduğumuz Hizmetler',
            'read_more' => 'Devamını Oku',
            
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

        // Service detayını getir
        $service = Service::findOrFail($id);
        
        // Tüm servisleri getir
        $allServices = Service::all();

        $route_name = 'front.service.show';
        $locale = app()->getLocale();

        return view('front.pages.service-details', compact(
            'settings', 
            'service',
            'route_name', 
            'locale',
            'translations',
            'allServices'
        ));
    }
} 