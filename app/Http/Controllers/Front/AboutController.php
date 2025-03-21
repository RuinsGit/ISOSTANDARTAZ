<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TranslationManage;
use App\Models\About;

class AboutController extends Controller
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
            'products' => 'Ürünler',
            'blog' => 'Blog',
            'contact' => 'İletişim',
            'search' => 'Ara',
            'team' => 'Ekibimiz',
            'car_sales_experts' => 'Otomobil Satış Uzmanları',
            'our_brands' => 'Markalarımız',
            
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

        // About verilerini getir
        $about = About::first();

        $route_name = 'front.about';
        $locale = app()->getLocale();

        return view('front.pages.about', compact(
            'settings', 
            'about',
            'route_name', 
            'locale',
            'translations'
        ));
    }
} 