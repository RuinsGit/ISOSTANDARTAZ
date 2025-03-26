@extends('front.layouts.master')

@section('title', isset($settings['news']) ? $settings['news'] : 'Haberler')

@section('content')


<!DOCTYPE html>
<html lang="en">
  <!--<< Header Area >>-->
  
<!-- Mirrored from revauto.baseecom.com/main-files/news.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Mar 2025 20:21:12 GMT -->

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
      class="breadcrumb-wrapper section-bg bg-cover"
      style="background-image: url('{{ asset('front/assets/img/breadcrumb-bg.jpg') }}')"
    >
      <div class="container">
        <div class="page-heading">
          <div class="breadcrumb-sub-title">
            <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ isset($settings['news']) ? $settings['news'] : 'Haberler' }}</h1>
          </div>
          <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
            <li>
              <a href="{{ route('front.index') }}"> {{ nav_trans('home', 'Ana Sayfa') }} </a>
            </li>
            <li>
              <i class="fa-regular fa-chevrons-right"></i>
            </li>
            <li>{{ isset($settings['news']) ? $settings['news'] : 'Haberler' }}</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- News Section Start -->
    <section class="news-section section-padding fix">
      <div class="container">
        @if(isset($blogTypes) && $blogTypes->count() > 0)
        <div class="blog-type-tabs mb-4">
          <ul class="nav nav-pills justify-content-center wow fadeInUp" data-wow-delay=".3s">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('front.news.index') && !request()->has('type') ? 'active' : '' }}" 
                 href="{{ route('front.news.index') }}">{{ __('Tümü') }}</a>
            </li>
            @foreach($blogTypes as $type)
            <li class="nav-item">
              <a class="nav-link {{ request('type') == $type->id ? 'active' : '' }}" 
                 href="{{ route('front.news.category', $type->text) }}">{{ $type->text }}</a>
            </li>
            @endforeach
          </ul>
        </div>
        @endif

            <div class="row g-4">
          @forelse($blogs as $blog)
          <div class="col-xl-4 col-lg-6 col-md-6 img-custom-anim-top wow fadeInUp" data-wow-delay=".{{ $loop->iteration * 2 }}s">
                <div class="news-box-items mt-0">
                  <div class="news-image">
                <img src="{{ asset($blog->image ?? 'front/assets/img/news/01.jpg') }}" alt="{{ $blog->{'title_' . app()->getLocale()} ?? 'Haber Başlığı' }}" />
                  </div>
                  <div class="news-content">
                    <h3>
                  <a href="{{ route('front.news.show', $blog->{'slug_' . app()->getLocale()} ?? $blog->id) }}">
                    {{ $blog->{'title_' . app()->getLocale()} ?? 'Haber Başlığı' }}
                  </a>
                    </h3>
                    <p>
                  {{ \Illuminate\Support\Str::limit(strip_tags($blog->{'text_' . app()->getLocale()} ?? ''), 100) }}
                    </p>
                    <div class="link-btn-area">
                  <a href="{{ route('front.news.show', $blog->{'slug_' . app()->getLocale()} ?? $blog->id) }}" class="link">
                    {{ isset($settings['read_more']) ? $settings['read_more'] : 'Devamını Oku' }}
                  </a>
                  <a href="{{ route('front.news.show', $blog->{'slug_' . app()->getLocale()} ?? $blog->id) }}" class="arrow-icon">
                        <i class="fa-sharp fa-regular fa-arrow-up-right"></i>
                      </a>
                </div>
              </div>
            </div>
          </div>
          @empty
          <div class="col-12 text-center">
            <p>{{ __('Henüz haber gönderisi bulunmamaktadır.') }}</p>
          </div>
          @endforelse
                  </div>
        
        <!-- Pagination -->
        <div class="page-nav-wrap pt-5 text-center wow fadeInUp" data-wow-delay=".3s">
          {{ $blogs->links() }}
                    </div>
                  </div>
    </section>

    @if(isset($popularBlogs) && $popularBlogs->count() > 0)
    <!-- Popular Blogs Section -->
    <section class="car-section fix section-padding section-bg">
      <div class="container">
        <div class="section-title-area">
          <div class="section-title">
            <h2 class="wow fadeInUp" data-wow-delay=".3s">
              {{ isset($settings['popular_posts']) ? $settings['popular_posts'] : 'Popüler Haberler' }}
            </h2>
          </div>
                  </div>
        <div class="row">
          @foreach($popularBlogs as $popularBlog)
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="news-box-items">
                  <div class="news-image">
                <img src="{{ asset($popularBlog->image ?? 'front/assets/img/news/01.jpg') }}" alt="{{ $popularBlog->{'title_' . app()->getLocale()} ?? 'Haber Başlığı' }}" />
                  </div>
                  <div class="news-content">
                    <h3>
                  <a href="{{ route('front.news.show', $popularBlog->{'slug_' . app()->getLocale()} ?? $popularBlog->id) }}">
                    {{ $popularBlog->{'title_' . app()->getLocale()} ?? 'Haber Başlığı' }}
                  </a>
                    </h3>
                    <p>
                  {{ \Illuminate\Support\Str::limit(strip_tags($popularBlog->{'text_' . app()->getLocale()} ?? ''), 100) }}
                    </p>
                    <div class="link-btn-area">
                  <a href="{{ route('front.news.show', $popularBlog->{'slug_' . app()->getLocale()} ?? $popularBlog->id) }}" class="link">
                    {{ isset($settings['read_more']) ? $settings['read_more'] : 'Devamını Oku' }}
                  </a>
                  <a href="{{ route('front.news.show', $popularBlog->{'slug_' . app()->getLocale()} ?? $popularBlog->id) }}" class="arrow-icon">
                        <i class="fa-sharp fa-regular fa-arrow-up-right"></i>
                      </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    @endif
  </body>

<!-- Mirrored from revauto.baseecom.com/main-files/news.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Mar 2025 20:21:12 GMT -->
</html>
@endsection

@push('css')
<style>
  .news-box-items {
    margin-bottom: 30px;
    transition: all 0.3s ease;
  }
  
  .news-image {
    position: relative;
    height: 250px;
    overflow: hidden;
    border-radius: 8px 8px 0 0;
    background-color: #f7f7f7;
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
    background-color: #fff;
    border-radius: 0 0 8px 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
  }
  
  .news-content h3 {
    margin-bottom: 15px;
    font-size: 20px;
    font-weight: 600;
  }
  
  .news-content h3 a {
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
  }
  
  .news-content h3 a:hover {
    color: #ff4747;
  }
  
  .news-content p {
    color: #666;
    margin-bottom: 20px;
    line-height: 1.6;
  }
  
  .link-btn-area {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  
  .link-btn-area .link {
    color: #ff4747;
    font-weight: 600;
    text-decoration: none;
    transition: color 0.3s ease;
  }
  
  .link-btn-area .link:hover {
    color: #333;
  }
  
  .arrow-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #ff4747;
    color: #fff;
    border-radius: 50%;
    transition: all 0.3s ease;
  }
  
  .arrow-icon:hover {
    background-color: #333;
    color: #fff;
  }
  
  .blog-type-tabs .nav-pills .nav-link {
    color: #333;
    background-color: #f5f5f5;
    border-radius: 30px;
    padding: 8px 20px;
    margin: 0 5px;
    transition: all 0.3s ease;
  }
  
  .blog-type-tabs .nav-pills .nav-link.active,
  .blog-type-tabs .nav-pills .nav-link:hover {
    color: #fff;
    background-color: #ff4747;
  }
</style>
@endpush
