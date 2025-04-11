<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogType;
use App\Models\TranslationManage;
use App\Models\Service;
use App\Models\Socialfooter;
use App\Models\Contact;

class NewsController extends Controller
{
    protected $defaultTranslations = [
        'home' => 'Ana Sayfa',
        'about' => 'Hakkımızda',
        'services' => 'Hizmetler',
        'products' => 'Ürünler',
        'blog' => 'Blog',
        'news' => 'Haberler',
        'contact' => 'İletişim',
        'search' => 'Ara',
        'loading' => 'Yükleniyor...',
        'recent_posts' => 'Son Yazılar',
        'categories' => 'Kategoriler',
        'popular_posts' => 'Popüler Yazılar',
        'read_more' => 'Devamını Oku',
        'posted_on' => 'Tarih',
        'by' => 'Yazar',
        'share' => 'Paylaş',
        'comments' => 'Yorumlar',
        
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
            'latest_news' => 'Son Haberler',
            'older_posts' => 'Önceki Yazılar',
            'newer_posts' => 'Sonraki Yazılar',
            'categories' => 'Kategoriler',
            'all' => 'Tümü',
            'recent_posts' => 'Son Yazılar',
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
        
        // Blog verilerini getir - Sayfalama ile
        $blogs = Blog::orderBy('created_at', 'desc')
                  ->paginate(6);
        
        // Blog kategorilerini getir
        $categories = BlogType::orderBy('text')->get();
        
        // Son eklenen blogları getir
        $recentNews = Blog::orderBy('created_at', 'desc')
                      ->take(3)
                      ->get();
        
        // Footer sosyal medya ikonları
        $socialfooters = Socialfooter::orderBy('order')->get();
        
        // İletişim bilgilerini al
        $contactInfo = Contact::first();
        
        // Hizmetleri çek (navbar için)
        $allServices = Service::all();

        $route_name = 'front.news.index';
        $locale = app()->getLocale();

        return view('front.pages.news', compact(
            'settings', 
            'route_name', 
            'locale', 
            'header', 
            'blogs',
            'categories',
            'recentNews',
            'translations',
            'allServices',
            'socialfooters',
            'contactInfo'
        ));
    }

    public function show($slug)
    {
        $translations = TranslationManage::where('status', 1)->get();
        $settings = $this->defaultTranslations;
        foreach ($translations as $translation) {
            $settings[$translation->key] = $translation->{'value_' . app()->getLocale()};
        }
        
        // Header için çevirileri hazırla
        $header = new \stdClass();
        foreach ($translations as $translation) {
            $field = $translation->key . '_' . app()->getLocale();
            $header->$field = $translation->{'value_' . app()->getLocale()};
        }

        $blog = Blog::where(function($query) use ($slug) {
                $query->where('slug_az', $slug)
                    ->orWhere('slug_en', $slug)
                    ->orWhere('slug_ru', $slug)
                    ->orWhere('id', $slug);
            })
            ->firstOrFail();

        $popularBlogs = Blog::where('is_popular', 1)
            ->where('id', '!=', $blog->id)
            ->latest()
            ->take(3)
            ->get();

        $relatedBlogs = Blog::where('id', '!=', $blog->id)
            ->where('blog_type_id', $blog->blog_type_id)
            ->latest()
            ->take(2)
            ->get();

        $blogTypes = BlogType::all();
        $allServices = Service::all();
        
        // Footer sosyal medya ikonları
        $socialfooters = Socialfooter::orderBy('order')->get();
        
        // İletişim bilgilerini al
        $contactInfo = Contact::first();

        $route_name = 'front.news.show';
        $locale = app()->getLocale();

        // Haber detay sayfasını kullanıyoruz
        return view('front.pages.news-detail', compact(
            'blog',
            'popularBlogs',
            'relatedBlogs',
            'blogTypes',
            'settings',
            'translations',
            'route_name',
            'locale',
            'header',
            'allServices',
            'socialfooters',
            'contactInfo'
        ));
    }

    public function category($slug)
    {
        $translations = TranslationManage::where('status', 1)->get();
        $settings = $this->defaultTranslations;
        foreach ($translations as $translation) {
            $settings[$translation->key] = $translation->{'value_' . app()->getLocale()};
        }
        
        // Header için çevirileri hazırla
        $header = new \stdClass();
        foreach ($translations as $translation) {
            $field = $translation->key . '_' . app()->getLocale();
            $header->$field = $translation->{'value_' . app()->getLocale()};
        }

        $blogType = BlogType::where(function($query) use ($slug) {
                $query->where('slug', $slug)
                    ->orWhere('text', $slug);
            })
            ->firstOrFail();

        $blogs = Blog::where('blog_type_id', $blogType->id)
            ->latest()
            ->paginate(6);

        $popularBlogs = Blog::where('is_popular', 1)->latest()->take(3)->get();
        $blogTypes = BlogType::all();
        $allServices = Service::all();
        
        // Footer sosyal medya ikonları
        $socialfooters = Socialfooter::orderBy('order')->get();
        
        // İletişim bilgilerini al
        $contactInfo = Contact::first();

        $route_name = 'front.news.category';
        $locale = app()->getLocale();

        return view('front.pages.news', compact(
            'blogs',
            'blogType',
            'popularBlogs',
            'blogTypes',
            'settings',
            'translations',
            'route_name',
            'locale',
            'header',
            'allServices',
            'socialfooters',
            'contactInfo'
        ));
    }
} 