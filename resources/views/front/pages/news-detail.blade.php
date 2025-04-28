@extends('front.layouts.master')

@section('title', isset($blog) ? $blog->{'title_' . app()->getLocale()} : (isset($settings['news']) ? $settings['news'] : 'Haberler'))

@section('content')

<!DOCTYPE html>
<html lang="en">
  <!--<< Header Area >>-->
  
<!-- Mirrored from revauto.baseecom.com/main-files/news-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Mar 2025 20:21:23 GMT -->

  <body>
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
        <p class="text-center">{{ $settings['loading'] }}</p>
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

    <!-- Offcanvas Area Start -->
    <div class="fix-area">
      <div class="offcanvas__info">
        <div class="offcanvas__wrapper">
          <div class="offcanvas__content">
            <div
              class="offcanvas__top mb-5 d-flex justify-content-between align-items-center"
            >
              <div class="offcanvas__logo">
                <a href="index.html">
                  <img src="assets/img/logo/black-logo.svg" alt="logo-img" />
                </a>
              </div>
              <div class="offcanvas__close">
                <button>
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <p class="text d-none d-xl-block">
              Nullam dignissim, ante scelerisque the is euismod fermentum odio
              sem semper the is erat, a feugiat leo urna eget eros. Duis Aenean
              a imperdiet risus.
            </p>
            <div class="mobile-menu fix mb-3"></div>
            <div class="offcanvas__contact">
              <h4>Contact Info</h4>
              <ul>
                <li class="d-flex align-items-center">
                  <div class="offcanvas__contact-icon">
                    <i class="fal fa-map-marker-alt"></i>
                  </div>
                  <div class="offcanvas__contact-text">
                    <a target="_blank" href="#"
                      >Main Street, Melbourne, Australia</a
                    >
                  </div>
                </li>
                <li class="d-flex align-items-center">
                  <div class="offcanvas__contact-icon mr-15">
                    <i class="fal fa-envelope"></i>
                  </div>
                  <div class="offcanvas__contact-text">
                    <a href="mailto:info@example.com"
                      ><span class="mailto:info@example.com"
                        >info@example.com</span
                      ></a
                    >
                  </div>
                </li>
                <li class="d-flex align-items-center">
                  <div class="offcanvas__contact-icon mr-15">
                    <i class="fal fa-clock"></i>
                  </div>
                  <div class="offcanvas__contact-text">
                    <a target="_blank" href="#">Mod-friday, 09am -05pm</a>
                  </div>
                </li>
                <li class="d-flex align-items-center">
                  <div class="offcanvas__contact-icon mr-15">
                    <i class="far fa-phone"></i>
                  </div>
                  <div class="offcanvas__contact-text">
                    <a href="tel:+11002345909">+11002345909</a>
                  </div>
                </li>
              </ul>
              <div class="header-button mt-4">
                <a href="contact.html" class="theme-btn text-center">
                  Get A Quote
                </a>
              </div>
              <div class="social-icon d-flex align-items-center">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="offcanvas__overlay"></div>

   

    <!-- Breadcrumb Section Start -->
    <div
      class="breadcrumb-wrapper section-bg bg-cover position-relative"
      style="background-image: url('{{ isset($blogHero) && $blogHero->image_path ? asset($blogHero->image_path) : (isset($blog) && $blog->bottom_image ? asset($blog->bottom_image) : asset('front/assets/img/breadcrumb-bg.jpg')) }}'); background-position: center;"
    >
      <div class="overlay-dark position-absolute w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5); top: 0; left: 0;"></div>
      <div class="container position-relative">
        <div class="page-heading">
          <div class="breadcrumb-sub-title">
            <h1 class="wow fadeInUp text-white" data-wow-delay=".3s">{{ isset($blog) ? $blog->{'title_' . app()->getLocale()} : (isset($settings['news']) ? $settings['news'] : 'Haberler') }}</h1>
          </div>
          <ul class="breadcrumb-items wow fadeInUp text-white" data-wow-delay=".5s">
            <li>
              <a href="{{ route('front.index') }}" class="text-white"> {{ nav_trans('home', 'Ana Sayfa') }} </a>
            </li>
            <li>
              <i class="fa-regular fa-chevrons-right text-white"></i>
            </li>
            <li>
              <a href="{{ route('front.news.index') }}" class="text-white">{{ isset($settings['news']) ? $settings['news'] : 'Haberler' }}</a>
            </li>
            <li>
              <i class="fa-regular fa-chevrons-right text-white"></i>
            </li>
            <li class="text-white">{{ isset($blog) ? $blog->{'title_' . app()->getLocale()} : 'Haber Detayı' }}</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- News Details Section Start -->
    <section class="news-details-section section-padding">
      <div class="container">
        <div class="news-details-wrapper">
          <div class="row g-4">
            <div class="col-lg-8">
              <div class="news-details-items">
                @if(isset($blog) && $blog->image)
                <div class="details-thumb">
                  <img src="{{ asset($blog->image) }}" alt="{{ $blog->{'title_' . app()->getLocale()} }}" />
                </div>
                @endif
                <div class="details-content">
                  <h2>{{ isset($blog) ? $blog->{'title_' . app()->getLocale()} : 'Haber Başlığı' }}</h2>
                  <div class="blog-meta">
                    <span><i class="far fa-calendar-alt"></i> {{ isset($blog) ? $blog->created_at->format('d.m.Y') : date('d.m.Y') }}</span>
                    @if(isset($blog) && $blog->blogType)
                    <span><i class="far fa-folder"></i> {{ $blog->blogType->text }}</span>
                    @endif
                  </div>
                  
                  <!-- Kısa Açıklama (description) -->
                  <div class="blog-description mb-4">
                    {!! isset($blog) ? $blog->{'description_' . app()->getLocale()} : '' !!}
                  </div>
                  
                  <!-- Ana İçerik -->
                  <div class="blog-content">
                    {!! isset($blog) ? $blog->{'text_' . app()->getLocale()} : 'Haber içeriği burada görüntülenecektir.' !!}
                  </div>
                </div>
                
                <!-- Sosyal Paylaşım Butonları -->
                <div class="social-share mt-4 p-3">
                  <h5>{{ isset($settings['share']) ? $settings['share'] : 'Paylaş' }}</h5>
                  <div class="social-buttons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="facebook">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode(isset($blog) ? $blog->{'title_' . app()->getLocale()} : 'Haber') }}" target="_blank" class="twitter">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}" target="_blank" class="linkedin">
                      <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode(isset($blog) ? $blog->{'title_' . app()->getLocale()} . ' ' . url()->current() : 'Haber ' . url()->current()) }}" target="_blank" class="whatsapp">
                      <i class="fab fa-whatsapp"></i>
                    </a>
                  </div>
                </div>
              </div>
              
              <!-- İlgili Haberler -->
              @if(isset($relatedBlogs) && $relatedBlogs->count() > 0)
                <div class="related-news mt-5">
                  <h3 class="mb-4">{{ isset($settings['related_posts']) ? $settings['related_posts'] : 'İlgili Haberler' }}</h3>
                  <div class="row">
                    @foreach($relatedBlogs as $relatedBlog)
                      <div class="col-md-6">
                        <div class="news-box-items mt-0">
                          <div class="news-image">
                            <img src="{{ asset($relatedBlog->image ?? 'front/assets/img/news/01.jpg') }}" alt="{{ $relatedBlog->{'title_' . app()->getLocale()} ?? 'Haber Başlığı' }}" />
                          </div>
                          <div class="news-content">
                            <h4>
                              <a href="{{ route('front.news.show', $relatedBlog->{'slug_' . app()->getLocale()} ?? $relatedBlog->id) }}">
                                {{ $relatedBlog->{'title_' . app()->getLocale()} ?? 'Haber Başlığı' }}
                              </a>
                            </h4>
                            <div class="blog-meta">
                              <span><i class="far fa-calendar-alt"></i> {{ $relatedBlog->created_at->format('d.m.Y') }}</span>
                            </div>
                            <p>
                              {{ \Illuminate\Support\Str::limit(strip_tags($relatedBlog->{'description_' . app()->getLocale()} ?? ''), 100) }}
                            </p>
                            <a href="{{ route('front.news.show', $relatedBlog->{'slug_' . app()->getLocale()} ?? $relatedBlog->id) }}" class="read-more">
                              {{ isset($settings['read_more']) ? $settings['read_more'] : 'Devamını Oku' }} <i class="fas fa-arrow-right"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              @endif
            </div>
            <div class="col-lg-4">
              <div class="main-sidebar">
                @if(isset($popularBlogs) && $popularBlogs->count() > 0)
                <div class="single-sidebar-widget">
                  <div class="wid-title">
                    <h3>{{ isset($settings['popular_posts']) ? $settings['popular_posts'] : 'Popüler Haberler' }}</h3>
                  </div>
                  <div class="recent-post-area">
                    @foreach($popularBlogs as $popularBlog)
                    <div class="recent-items">
                      <div class="recent-thumb">
                        <img src="{{ asset($popularBlog->image ?? 'front/assets/img/news/pp3.jpg') }}" alt="{{ $popularBlog->{'title_' . app()->getLocale()} }}" />
                      </div>
                      <div class="recent-content">
                        <span>{{ $popularBlog->created_at->format('d.m.Y') }}</span>
                        <h6>
                          <a href="{{ route('front.news.show', $popularBlog->{'slug_' . app()->getLocale()} ?? $popularBlog->id) }}">
                            {{ $popularBlog->{'title_' . app()->getLocale()} }}
                          </a>
                        </h6>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
                @endif

                @if(isset($blogTypes) && $blogTypes->count() > 0)
                <div class="single-sidebar-widget">
                  <div class="wid-title">
                    <h3>{{ isset($settings['categories']) ? $settings['categories'] : 'Kategoriler' }}</h3>
                  </div>
                  <div class="category-list">
                    <ul>
                      @foreach($blogTypes as $type)
                      <li>
                        <a href="{{ route('front.news.category', $type->slug ?? $type->text) }}">
                          {{ $type->text }} <span>({{ $type->blogs->where('status', 1)->count() }})</span>
                        </a>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
                @endif
                
                <!-- Etiketler varsa burada gösterilecek -->
                @if(isset($tags) && $tags->count() > 0)
                  <div class="single-sidebar-widget">
                    <div class="wid-title">
                      <h3>{{ isset($settings['tags']) ? $settings['tags'] : 'Etiketler' }}</h3>
                    </div>
                    <div class="tag-cloud">
                      @foreach($tags as $tag)
                        <a href="{{ route('front.news.tag', $tag->slug) }}">{{ $tag->name }}</a>
                      @endforeach
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    
   
  </body>

<!-- Mirrored from revauto.baseecom.com/main-files/news-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Mar 2025 20:21:27 GMT -->
</html>
@endsection

@push('css')
<style>
  .news-details-items {
    margin-bottom: 30px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    overflow: hidden;
  }
  
  .details-thumb {
    height: 400px;
    overflow: hidden;
  }
  
  .details-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .details-content {
    padding: 30px;
  }
  
  .details-content h2 {
    margin-bottom: 15px;
    font-size: 28px;
    font-weight: 700;
    color: #333;
  }
  
  .blog-meta {
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
  }
  
  .blog-meta span {
    display: inline-block;
    margin-right: 15px;
    color: #777;
    font-size: 14px;
  }
  
  .blog-meta span i {
    margin-right: 5px;
    color: #ff4747;
  }
  
  .blog-description {
    font-size: 18px;
    line-height: 1.7;
    font-weight: 500;
    color: #444;
    padding-bottom: 20px;
    border-bottom: 1px dashed #eee;
  }
  
  .blog-content {
    line-height: 1.8;
    color: #555;
  }
  
  .blog-content p {
    margin-bottom: 15px;
  }
  
  .social-share {
    border-top: 1px solid #eee;
    margin-top: 30px;
  }
  
  .social-share h5 {
    margin-bottom: 15px;
    font-size: 18px;
  }
  
  .social-buttons {
    display: flex;
    gap: 10px;
  }
  
  .social-buttons a {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    color: #fff;
    transition: all 0.3s ease;
  }
  
  .social-buttons .facebook {
    background-color: #3b5998;
  }
  
  .social-buttons .twitter {
    background-color: #1da1f2;
  }
  
  .social-buttons .linkedin {
    background-color: #0077b5;
  }
  
  .social-buttons .whatsapp {
    background-color: #25d366;
  }
  
  .social-buttons a:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
  }
  
  .single-sidebar-widget {
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    margin-bottom: 30px;
  }
  
  .wid-title {
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 10px;
  }
  
  .wid-title h3 {
    font-size: 20px;
    font-weight: 600;
    color: #333;
  }
  
  .wid-title::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 2px;
    background: #ff4747;
  }
  
  .recent-items {
    display: flex;
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
  }
  
  .recent-thumb {
    width: 80px;
    height: 80px;
    margin-right: 15px;
    border-radius: 5px;
    overflow: hidden;
  }
  
  .recent-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .recent-content span {
    font-size: 12px;
    color: #777;
    display: block;
    margin-bottom: 5px;
  }
  
  .recent-content h6 {
    font-size: 15px;
    line-height: 1.4;
  }
  
  .recent-content h6 a {
    color: #333;
    transition: all 0.3s ease;
  }
  
  .recent-content h6 a:hover {
    color: #ff4747;
  }
  
  .category-list ul {
    padding: 0;
    margin: 0;
    list-style: none;
  }
  
  .category-list ul li {
    margin-bottom: 10px;
    border-bottom: 1px solid #eee;
    padding-bottom: 10px;
  }
  
  .category-list ul li:last-child {
    margin-bottom: 0;
    border-bottom: 0;
  }
  
  .category-list ul li a {
    display: flex;
    justify-content: space-between;
    color: #555;
    transition: all 0.3s ease;
  }
  
  .category-list ul li a:hover {
    color: #ff4747;
  }
  
  .tag-cloud {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
  }
  
  .tag-cloud a {
    display: inline-block;
    padding: 5px 15px;
    background: #f5f5f5;
    color: #555;
    border-radius: 30px;
    font-size: 13px;
    transition: all 0.3s ease;
  }
  
  .tag-cloud a:hover {
    background: #ff4747;
    color: #fff;
  }
  
  .related-news h3 {
    position: relative;
    padding-bottom: 10px;
    margin-bottom: 20px;
    font-size: 22px;
    font-weight: 600;
  }
  
  .related-news h3:after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 2px;
    background: #ff4747;
  }
  
  .news-box-items {
    margin-bottom: 30px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    background: #fff;
  }
  
  .news-image {
    height: 200px;
    overflow: hidden;
  }
  
  .news-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
  }
  
  .news-box-items:hover .news-image img {
    transform: scale(1.05);
  }
  
  .news-content {
    padding: 20px;
  }
  
  .news-content h4 {
    margin-bottom: 10px;
    font-size: 18px;
    font-weight: 600;
  }
  
  .news-content h4 a {
    color: #333;
    transition: color 0.3s ease;
  }
  
  .news-content h4 a:hover {
    color: #ff4747;
  }
  
  .news-content p {
    color: #666;
    margin-bottom: 15px;
    font-size: 14px;
    line-height: 1.6;
  }
  
  .read-more {
    color: #ff4747;
    font-weight: 600;
    font-size: 14px;
    display: inline-block;
    transition: all 0.3s ease;
  }
  
  .read-more i {
    margin-left: 5px;
    transition: transform 0.3s ease;
  }
  
  .read-more:hover {
    color: #333;
  }
  
  .read-more:hover i {
    transform: translateX(5px);
  }
</style>
@endpush