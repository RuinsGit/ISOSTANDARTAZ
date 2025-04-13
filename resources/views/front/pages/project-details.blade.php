@extends('front.layouts.master')

@section('title', isset($project->{'meta_title_' . app()->getLocale()}) ? $project->{'meta_title_' . app()->getLocale()} : $project->{'name_' . app()->getLocale()})

@section('meta_description', isset($project->{'meta_description_' . app()->getLocale()}) ? $project->{'meta_description_' . app()->getLocale()} : '')

@section('content')
    <!-- Preloader Start -->
    <div id="preloader" class="preloader">
      <div class="animation-preloader">
        <div class="spinner"></div>
        <div class="txt-loading">
          <span data-text-preloader="I" class="letters-loading"> I</span>
          <span data-text-preloader="S" class="letters-loading"> S </span>
          <span data-text-preloader="O" class="letters-loading"> O </span>
          <span data-text-preloader="S" class="letters-loading"> S </span>
          <span data-text-preloader="T" class="letters-loading"> T </span>
          <span data-text-preloader="A" class="letters-loading"> A </span>
          <span data-text-preloader="D" class="letters-loading"> D</span>
          
          <span data-text-preloader="A" class="letters-loading"> A </span>
          <span data-text-preloader="R" class="letters-loading"> R </span>
          <span data-text-preloader="T" class="letters-loading"> T </span>
          <span data-text-preloader="." class="letters-loading"> . </span>
          <span data-text-preloader="A" class="letters-loading"> A </span>
          <span data-text-preloader="Z" class="letters-loading"> Z </span>
         
        </div>
        <p class="text-center">{{ isset($settings['loading']) ? $settings['loading'] : 'Yükleniyor...' }}</p>
      </div>
      <div class="loader">
        <div class="row">
          <div class="col-3 loader-section section-left">
            <div class="bg"></div>
          </div>
          <div class="col-3 loader-section section-left">
            <div class="bg"></div>
          </div>
          <div class="col-3 loader-section section-right">
            <div class="bg"></div>
          </div>
          <div class="col-3 loader-section section-right">
            <div class="bg"></div>
          </div>
        </div>
      </div>
    </div>

    <!--<< Mouse Cursor Start >>-->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    <!-- Back To Top Start -->
    <button id="back-top" class="back-to-top">
      <i class="fa-regular fa-arrow-up"></i>
    </button>

    <!-- Breadcrumb Section Start -->

    <div
      class="breadcrumb-wrapper section-bg bg-cover position-relative"  
      style="background-image: url('{{ $blogHero && $blogHero->image_path ? asset('storage/' . $blogHero->image_path) : asset('front/assets/img/breadcrumb-bg.jpg') }}'); background-position: center;"
    >
      <div class="overlay-dark position-absolute w-100 h-100" style="background-color: rgba(0, 0, 0, 0.6); top: 0; left: 0;"></div>
      <div class="container position-relative">
        <div class="page-heading">
          <div class="breadcrumb-sub-title">
            <h1 class="wow fadeInUp text-white" data-wow-delay=".3s">{{ $project->{'name_' . app()->getLocale()} }}</h1>
          </div>
          <ul class="breadcrumb-items wow fadeInUp text-white" data-wow-delay=".5s">
            <li>
              <a href="{{ route('front.index') }}" class="text-white"> {{ nav_trans('home', 'Ana Sayfa') }} </a>
            </li>
            <li>
              <i class="fa-regular fa-chevrons-right text-white"></i>
            </li>
            <li>
              <a href="{{ route('front.project.index') }}" class="text-white">{{ isset($settings['projects']) ? $settings['projects'] : 'Projeler' }}</a>
            </li>
            <li>
              <i class="fa-regular fa-chevrons-right text-white"></i>
            </li>
            <li class="text-white">{{ $project->{'name_' . app()->getLocale()} }}</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Project Details Section Start -->
    <section class="project-details-section fix section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="project-details-content">
              <div class="project-title-area">
                <div class="project-meta mb-3">
                  <span><i class="far fa-calendar-alt"></i> {{ $project->created_at->format('d.m.Y') }}</span>
                </div>
                <h2 class="project-title mb-4">{{ $project->{'name_' . app()->getLocale()} }}</h2>
              </div>
              
              <div class="project-details-image mb-4">
                <img src="{{ asset($project->image) }}" alt="{{ $project->{'image_alt_' . app()->getLocale()} ?? $project->{'name_' . app()->getLocale()} }}" class="img-fluid w-100 rounded">
              </div>

              <div class="project-main-description">
                <div class="content-block mb-5">
                  {!! $project->{'text1_' . app()->getLocale()} !!}
                </div>
                
                @if($project->{'text2_' . app()->getLocale()})
                <div class="content-block mb-5">
                  {!! $project->{'text2_' . app()->getLocale()} !!}
                </div>
                @endif
                
                @if($project->{'description1_' . app()->getLocale()})
                <div class="content-block mb-5">
                  <h4 class="section-subheading">{{ isset($settings['project_details']) ? $settings['project_details'] : 'Proje Detayları' }}</h4>
                  {!! $project->{'description1_' . app()->getLocale()} !!}
                </div>
                @endif
                
                @if($project->{'description2_' . app()->getLocale()})
                <div class="content-block mb-5">
                  {!! $project->{'description2_' . app()->getLocale()} !!}
                </div>
                @endif
              </div>

              @if(isset($project->bottom_images) && !empty($project->bottom_images))
              <div class="project-gallery mt-5">
                <h4 class="section-subheading mb-4">{{ isset($settings['project_gallery']) ? $settings['project_gallery'] : 'Proje Galerisi' }}</h4>
                <div class="row g-4">
                  @php
                    // Array türünü kesin olarak kontrol ediyoruz
                    if (is_string($project->bottom_images)) {
                        $bottomImages = json_decode($project->bottom_images, true);
                    } else {
                        $bottomImages = $project->bottom_images;
                    }
                  @endphp
                  
                  @if(is_array($bottomImages) && count($bottomImages) > 0)
                    @foreach($bottomImages as $key => $image)
                    <div class="col-md-4 col-sm-6">
                      <div class="gallery-item">
                        <div class="gallery-image-wrapper">
                          <img src="{{ asset($image) }}" alt="{{ isset($project->bottom_images_alt) && isset($project->bottom_images_alt[app()->getLocale()]) && isset($project->bottom_images_alt[app()->getLocale()][$key]) ? $project->bottom_images_alt[app()->getLocale()][$key] : $project->{'name_' . app()->getLocale()} }}" class="img-fluid">
                        </div>
                      </div>
                    </div>
                    @endforeach
                  @else
                    <div class="col-12">
                      <div class="alert alert-info">{{ isset($settings['no_images']) ? $settings['no_images'] : 'Bu proje için galeri görüntüleri bulunmamaktadır.' }}</div>
                    </div>
                  @endif
                </div>
              </div>
              @endif
              
              <!-- Proje Paylaşım Linkleri -->
              <div class="project-share mt-5 p-4 bg-light rounded">
                <h5 class="mb-3"><i class="fas fa-share-alt me-2"></i> {{ isset($settings['share_project']) ? $settings['share_project'] : 'Bu Projeyi Paylaş' }}</h5>
                <ul class="social-share-links">
                  <li>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="facebook">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($project->{'name_' . app()->getLocale()}) }}" target="_blank" class="twitter">
                      <i class="fab fa-twitter"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}" target="_blank" class="linkedin">
                      <i class="fab fa-linkedin-in"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://wa.me/?text={{ urlencode($project->{'name_' . app()->getLocale()} . ' ' . url()->current()) }}" target="_blank" class="whatsapp">
                      <i class="fab fa-whatsapp"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4">
            <div class="project-sidebar">
              <div class="project-info-card">
                <h4 class="sidebar-title">{{ isset($settings['project_info']) ? $settings['project_info'] : 'Proje Bilgileri' }}</h4>
                
                <ul class="project-info-list">
                  <li>
                    <span class="info-label"><i class="fas fa-tag"></i> {{ isset($settings['project_name']) ? $settings['project_name'] : 'Proje Adı' }}</span>
                    <span class="info-value">{{ $project->{'name_' . app()->getLocale()} }}</span>
                  </li>
                  <li>
                    <span class="info-label"><i class="far fa-calendar-alt"></i> {{ isset($settings['date']) ? $settings['date'] : 'Tarih' }}</span>
                    <span class="info-value">{{ $project->created_at->format('d.m.Y') }}</span>
                  </li>
                </ul>
              </div>

              @if($relatedProjects->isNotEmpty())
              <div class="related-projects-card mt-4">
                <h4 class="sidebar-title">{{ isset($settings['related_projects']) ? $settings['related_projects'] : 'İlgili Projeler' }}</h4>
                
                <div class="related-projects-list">
                  @foreach($relatedProjects as $relProj)
                  <div class="related-project-item">
                    <a href="{{ route('front.project.show', $relProj->{'slug_' . app()->getLocale()} ?? $relProj->id) }}" class="related-project-link">
                      <div class="related-project-img">
                        <img src="{{ asset($relProj->image) }}" alt="{{ $relProj->{'image_alt_' . app()->getLocale()} ?? $relProj->{'name_' . app()->getLocale()} }}">
                      </div>
                      <div class="related-project-info">
                        <h5>{{ $relProj->{'name_' . app()->getLocale()} }}</h5>
                        <span class="related-project-date">{{ $relProj->created_at->format('d.m.Y') }}</span>
                      </div>
                    </a>
                  </div>
                  @endforeach
                </div>
              </div>
              @endif
              
              <!-- Etiketler veya kategoriler burada eklenebilir -->
              
              <!-- CTA Card (İletişim veya Teklif Alma için) -->
              <div class="cta-card mt-4">
                <h4>{{ isset($settings['need_help']) ? $settings['need_help'] : 'Yardıma mı ihtiyacınız var?' }}</h4>
                <p>{{ isset($settings['contact_for_more']) ? $settings['contact_for_more'] : 'Benzer bir proje için bizimle iletişime geçin.' }}</p>
                <a href="{{ route('front.contact') }}" class="cta-btn">
                  <i class="fas fa-envelope me-2"></i> {{ isset($settings['contact_us']) ? $settings['contact_us'] : 'Bize Ulaşın' }}
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@push('css')
<style>
  /* Project Details Styling */
  .breadcrumb-wrapper {
    background-size: cover;
    background-position: center;
  }
  
  .project-details-section {
    background-color: #fff;
  }
  
  .project-details-content {
    margin-bottom: 30px;
  }
  
  .project-title-area {
    margin-bottom: 20px;
  }
  
  .project-meta {
    margin-bottom: 15px;
  }
  
  .project-meta span {
    font-size: 14px;
    color: #777;
    display: inline-block;
    margin-right: 15px;
  }
  
  .project-meta i {
    color: #ff4747;
    margin-right: 5px;
  }
  
  .project-title {
    font-size: 32px;
    font-weight: 700;
    color: #333;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 15px;
  }
  
  .project-title:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 70px;
    height: 3px;
    background-color: #ff4747;
  }
  
  .project-details-image {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    margin-bottom: 30px;
  }
  
  .project-details-image img {
    width: 100%;
    height: auto;
    object-fit: cover;
  }
  
  .content-block {
    margin-bottom: 30px;
    color: #555;
    line-height: 1.8;
  }
  
  .content-block p {
    margin-bottom: 15px;
  }
  
  .section-subheading {
    font-size: 24px;
    font-weight: 600;
    color: #333;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 12px;
  }
  
  .section-subheading:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 2px;
    background-color: #ff4747;
  }
  
  /* Güncellenmiş Galeri Stilleri */
  .gallery-item {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    margin-bottom: 25px;
    transition: all 0.3s ease;
    height: 100%;
  }
  
  .gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
  }
  
  .gallery-image-wrapper {
    position: relative;
    width: 100%;
    padding-top: 100%; /* 1:1 en-boy oranı (kare) */
    overflow: hidden;
  }
  
  .gallery-image-wrapper img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.5s ease, filter 0.5s ease;
  }
  
  .gallery-item:hover .gallery-image-wrapper img {
    transform: scale(1.05);
    filter: brightness(1.05);
  }
  
  /* Masonry görünümünü kaldırıp tüm resimleri aynı boyutta gösteriyoruz */
  .project-gallery .row {
    display: flex;
    flex-wrap: wrap;
  }
  
  /* Resimlerin etrafında eşit boşluk bırakıyoruz */
  .project-gallery [class*="col-"] {
    padding: 10px;
  }
  
  /* Galeri animasyonları */
  .gallery-item {
    position: relative;
    overflow: hidden;
  }
  
  .gallery-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.2);
    opacity: 0;
    z-index: 1;
    transition: opacity 0.3s ease;
    border-radius: 10px;
  }
  
  .gallery-item:hover::before {
    opacity: 1;
  }
  
  .project-share {
    padding: 20px;
    background-color: #f7f7f7;
    border-radius: 10px;
    margin-top: 30px;
  }
  
  .project-share h5 {
    font-size: 18px;
    margin-bottom: 15px;
    color: #333;
  }
  
  .social-share-links {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 10px;
  }
  
  .social-share-links li a {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    color: #fff;
    transition: all 0.3s ease;
  }
  
  .social-share-links .facebook {
    background-color: #3b5998;
  }
  
  .social-share-links .twitter {
    background-color: #1da1f2;
  }
  
  .social-share-links .linkedin {
    background-color: #0077b5;
  }
  
  .social-share-links .whatsapp {
    background-color: #25d366;
  }
  
  .social-share-links li a:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
  }
  
  /* Sidebar Styling */
  .project-sidebar {
    position: sticky;
    top: 100px;
  }
  
  .project-info-card,
  .related-projects-card,
  .cta-card {
    background-color: #fff;
    border-radius: 10px;
    padding: 25px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    margin-bottom: 30px;
  }
  
  .sidebar-title {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 20px;
    padding-bottom: 12px;
    position: relative;
    color: #333;
  }
  
  .sidebar-title:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 2px;
    background-color: #ff4747;
  }
  
  .project-info-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  
  .project-info-list li {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px dashed #eee;
  }
  
  .project-info-list li:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
  }
  
  .info-label {
    font-size: 14px;
    color: #777;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
  }
  
  .info-label i {
    margin-right: 8px;
    color: #ff4747;
  }
  
  .info-value {
    font-size: 16px;
    font-weight: 600;
    color: #333;
  }
  
  .related-projects-list {
    margin-top: 20px;
  }
  
  .related-project-item {
    margin-bottom: 15px;
    border-bottom: 1px solid #eee;
    padding-bottom: 15px;
  }
  
  .related-project-item:last-child {
    margin-bottom: 0;
    border-bottom: none;
    padding-bottom: 0;
  }
  
  .related-project-link {
    display: flex;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
  }
  
  .related-project-link:hover {
    color: #ff4747;
  }
  
  .related-project-img {
    width: 80px;
    height: 80px;
    border-radius: 5px;
    overflow: hidden;
    margin-right: 15px;
    flex-shrink: 0;
  }
  
  .related-project-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .related-project-info {
    flex-grow: 1;
  }
  
  .related-project-info h5 {
    font-size: 16px;
    margin-bottom: 5px;
    font-weight: 600;
    transition: color 0.3s ease;
  }
  
  .related-project-date {
    font-size: 12px;
    color: #777;
  }
  
  .cta-card {
    text-align: center;
    background-color: #f8f9fa;
    padding: 30px 20px;
  }
  
  .cta-card h4 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #333;
  }
  
  .cta-card p {
    font-size: 14px;
    color: #777;
    margin-bottom: 20px;
  }
  
  .cta-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 25px;
    background-color: #ff4747;
    color: #fff;
    border-radius: 5px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
  }
  
  .cta-btn:hover {
    background-color: #333;
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
  }
  
  /* Responsive Styles */
  @media (max-width: 991px) {
    .project-title {
      font-size: 28px;
    }
    
    .project-sidebar {
      margin-top: 40px;
      position: static;
    }
  }
  
  @media (max-width: 767px) {
    .project-title {
      font-size: 24px;
    }
    
    .section-subheading {
      font-size: 20px;
    }
    
    .social-share-links {
      flex-wrap: wrap;
    }
  }
</style>
@endpush 