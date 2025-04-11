<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\TranslationManage;
use App\Models\Service;

class ProjectController extends Controller
{
    protected $defaultTranslations = [
        'home' => 'Ana Sayfa',
        'about' => 'Hakkımızda',
        'services' => 'Hizmetler',
        'products' => 'Ürünler',
        'blog' => 'Blog',
        'contact' => 'İletişim',
        'projects' => 'Projeler',
        'project' => 'Proje',
        'search' => 'Ara',
        'loading' => 'Yükleniyor...',
        'view_details' => 'Detayları Gör',
        'all_projects' => 'Tüm Projeler',
        'related_projects' => 'İlgili Projeler',
        
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

        $projects = Project::where('status', 1)->latest()->paginate(9);
        $allServices = Service::all();
        
        // Footer sosyal medya ikonları
        $socialfooters = \App\Models\Socialfooter::orderBy('order')->get();
        
        // İletişim bilgilerini al
        $contactInfo = \App\Models\Contact::first();

        $route_name = 'front.project.index';
        $locale = app()->getLocale();

        return view('front.pages.project', compact(
            'projects',
            'settings',
            'translations',
            'route_name',
            'locale',
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

        $project = Project::where('status', 1)
            ->where(function($query) use ($slug) {
                $query->where('slug_az', $slug)
                    ->orWhere('slug_en', $slug)
                    ->orWhere('slug_ru', $slug)
                    ->orWhere('id', $slug);
            })
            ->firstOrFail();
            
        // bottom_images alanının doğru şekilde işlenmesi
        if (isset($project->bottom_images)) {
            if (is_string($project->bottom_images)) {
                $project->bottom_images = json_decode($project->bottom_images, true);
            }
        }

        $relatedProjects = Project::where('status', 1)
            ->where('id', '!=', $project->id)
            ->latest()
            ->take(3)
            ->get();

        $allServices = Service::all();
        
        // Footer sosyal medya ikonları
        $socialfooters = \App\Models\Socialfooter::orderBy('order')->get();
        
        // İletişim bilgilerini al
        $contactInfo = \App\Models\Contact::first();

        $route_name = 'front.project.show';
        $locale = app()->getLocale();

        return view('front.pages.project-details', compact(
            'project',
            'relatedProjects',
            'settings',
            'translations',
            'route_name',
            'locale',
            'allServices',
            'socialfooters',
            'contactInfo'
        ));
    }
}
