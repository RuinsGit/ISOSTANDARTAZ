<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogType;
use App\Models\TranslationManage;
use App\Models\Service;

class BlogController extends Controller
{
    protected $defaultTranslations = [
        'home' => 'Ana Sayfa',
        'about' => 'Hakkımızda',
        'services' => 'Hizmetler',
        'products' => 'Ürünler',
        'blog' => 'Blog',
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
        $translations = TranslationManage::where('status', 1)->get();
        $settings = $this->defaultTranslations;
        foreach ($translations as $translation) {
            $settings[$translation->key] = $translation->{'value_' . app()->getLocale()};
        }

        $blogs = Blog::where('status', 1)->latest()->paginate(6);
        $popularBlogs = Blog::where('status', 1)->where('is_popular', 1)->latest()->take(3)->get();
        $blogTypes = BlogType::where('status', 1)->get();
        $allServices = Service::all();

        $route_name = 'front.blog.index';
        $locale = app()->getLocale();

        return view('front.pages.blog.index', compact(
            'blogs',
            'popularBlogs',
            'blogTypes',
            'settings',
            'translations',
            'route_name',
            'locale',
            'allServices'
        ));
    }

    public function show($slug)
    {
        $translations = TranslationManage::where('status', 1)->get();
        $settings = $this->defaultTranslations;
        foreach ($translations as $translation) {
            $settings[$translation->key] = $translation->{'value_' . app()->getLocale()};
        }

        $blog = Blog::where('status', 1)
            ->where(function($query) use ($slug) {
                $query->where('slug_az', $slug)
                    ->orWhere('slug_en', $slug)
                    ->orWhere('slug_ru', $slug);
            })
            ->firstOrFail();

        $popularBlogs = Blog::where('status', 1)
            ->where('is_popular', 1)
            ->where('id', '!=', $blog->id)
            ->latest()
            ->take(3)
            ->get();

        $relatedBlogs = Blog::where('status', 1)
            ->where('id', '!=', $blog->id)
            ->where('blog_type_id', $blog->blog_type_id)
            ->latest()
            ->take(2)
            ->get();

        $blogTypes = BlogType::where('status', 1)->get();
        $allServices = Service::all();

        $route_name = 'front.blog.show';
        $locale = app()->getLocale();

        return view('front.pages.blog.show', compact(
            'blog',
            'popularBlogs',
            'relatedBlogs',
            'blogTypes',
            'settings',
            'translations',
            'route_name',
            'locale',
            'allServices'
        ));
    }

    public function category($slug)
    {
        $translations = TranslationManage::where('status', 1)->get();
        $settings = $this->defaultTranslations;
        foreach ($translations as $translation) {
            $settings[$translation->key] = $translation->{'value_' . app()->getLocale()};
        }

        $blogType = BlogType::where('status', 1)
            ->where('text', $slug)
            ->firstOrFail();

        $blogs = Blog::where('status', 1)
            ->where('blog_type_id', $blogType->id)
            ->latest()
            ->paginate(6);

        $popularBlogs = Blog::where('status', 1)->where('is_popular', 1)->latest()->take(3)->get();
        $blogTypes = BlogType::where('status', 1)->get();
        $allServices = Service::all();

        $route_name = 'front.blog.category';
        $locale = app()->getLocale();

        return view('front.pages.blog.category', compact(
            'blogs',
            'blogType',
            'popularBlogs',
            'blogTypes',
            'settings',
            'translations',
            'route_name',
            'locale',
            'allServices'
        ));
    }
} 