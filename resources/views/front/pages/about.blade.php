@extends('front.layouts.master')

@section('title', isset($settings['about_us']) ? $settings['about_us'] : 'Hakkımızda')

@section('content')

  <!--<< Header Area >>-->
  
<!-- Mirrored from revauto.baseecom.com/main-files/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Mar 2025 20:21:08 GMT -->


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
                  <img src="{{ asset('front/assets/img/logo/black-logo.svg') }}" alt="logo-img" />
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

    <!-- header  section start -->


    <!-- Breadcrumb Section Start -->
    <div
      class="breadcrumb-wrapper section-bg bg-cover"
      style="background-image: url('{{ asset('front/assets/img/about/about-banner.jpg') }}')"
    >
      <div class="container">
        <div class="page-heading">
          <div class="breadcrumb-sub-title">
            <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ isset($settings['about_us']) ? $settings['about_us'] : 'Hakkımızda' }}</h1>
          </div>
          <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
            <li>
              <a href="{{ route('front.index') }}"> {{ nav_trans('home', 'Ana Sayfa') }} </a>
            </li>
            <li>
              <i class="fa-regular fa-chevrons-right"></i>
            </li>
            <li>{{ isset($settings['about_us']) ? $settings['about_us'] : 'Hakkımızda' }}</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Counter Section Start -->


    <!-- Testimonial Section Start -->
    <section class="team-section fix section-padding">
      <div class="container">
        <div class="section-title text-center">
          <h6 class="wow fadeInUp">{{ isset($settings['team']) ? $settings['team'] : 'Ekibimiz' }}</h6>
          <h2 class="wow fadeInUp" data-wow-delay=".3s">
            {{ isset($settings['car_sales_experts']) ? $settings['car_sales_experts'] : 'Otomobil Satış Uzmanları' }}
          </h2>
        </div>
        <div class="swiper team-slider">
          <div class="swiper-wrapper">
            @if(isset($teams) && $teams->count() > 0)
              @foreach($teams as $team)
                <div class="swiper-slide">
                  <div class="team-box-items">
                    <div class="team-image">
                      <img src="{{ asset('storage/'.$team->image_path) }}" alt="{{ $team->name }}" />
                    </div>
                    <div class="team-content">
                      <div class="team-info">
                        <h3>{{ $team->name }}</h3>
                        <span>{{ $team->position }}</span>
                      </div>
                      <p>
                        {{ $team->description ?? 'Ekip üyemiz hakkında bilgi bulunmamaktadır.' }}
                      </p>
                      <div class="social-icon d-flex align-items-center">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            @else
              <div class="swiper-slide">
                <div class="team-box-items">
                  <div class="team-image">
                    <img src="{{ asset('front/assets/img/team/01.jpg') }}" alt="img" />
                  </div>
                  <div class="team-content">
                    <div class="team-info">
                      <h3>Savannah Nguyen</h3>
                      <span>Marketing Manager</span>
                    </div>
                    <p>
                      With over 10 years of experience in the automotive industry,
                      John is passionate about helping customers find their
                      perfect vehicle.
                    </p>
                    <div class="social-icon d-flex align-items-center">
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="team-box-items">
                  <div class="team-image">
                    <img src="{{ asset('front/assets/img/team/02.jpg') }}" alt="img" />
                  </div>
                  <div class="team-content">
                    <div class="team-info">
                      <h3>Darrell Steward</h3>
                      <span>Customer Support </span>
                    </div>
                    <p>
                      With over 10 years of experience in the automotive industry,
                      John is passionate about helping customers find their
                      perfect vehicle.
                    </p>
                    <div class="social-icon d-flex align-items-center">
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          </div>
          <div class="swiper-dot-2 text-center pt-5">
            <div class="dots"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- Brand Section Start -->
    <div class="brand-section section-padding section-bg">
      <div class="container">
        <div
          class="section-title text-center wow fadeInUp"
          data-wow-delay=".3s"
        >
          <h2>{{ isset($settings['our_brands']) ? $settings['our_brands'] : 'Markalarımız' }}</h2>
        </div>
        <div class="brand-wrapper">
          <div class="swiper brand-slider">
            <div class="swiper-wrapper">
              @if(isset($partners) && $partners->count() > 0)
                @foreach($partners as $partner)
                  <div class="swiper-slide">
                    <div class="brand-image">
                      <img src="{{ asset($partner->image) }}" alt="{{ $partner->title }}" />
                      @if($partner->title)
                        <div class="brand-title">{{ $partner->title }}</div>
                      @endif
                    </div>
                  </div>
                @endforeach
              @else
                <div class="swiper-slide">
                  <div class="brand-image">
                    <img src="{{ asset('front/assets/img/brand/01.png') }}" alt="img" />
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="brand-image">
                    <img src="{{ asset('front/assets/img/brand/02.png') }}" alt="img" />
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="brand-image">
                    <img src="{{ asset('front/assets/img/brand/03.png') }}" alt="img" />
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="brand-image">
                    <img src="{{ asset('front/assets/img/brand/04.png') }}" alt="img" />
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="brand-image">
                    <img src="{{ asset('front/assets/img/brand/05.png') }}" alt="img" />
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="brand-image">
                    <img src="{{ asset('front/assets/img/brand/06.png') }}" alt="img" />
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Faq Section Start -->







   
 


@endsection

@push('css')
<style>
  .brand-image {
    text-align: center;
    padding: 20px;
    transition: all 0.3s ease;
    position: relative;
  }
  
  .brand-image img {
    max-width: 100%;
    height: auto;
    max-height: 80px;
    object-fit: contain;
    filter: grayscale(100%);
    transition: all 0.3s ease;
  }
  
  .brand-image:hover img {
    filter: grayscale(0%);
    transform: scale(1.05);
  }
  
  .brand-title {
    font-size: 14px;
    color: #666;
    margin-top: 10px;
    font-weight: 500;
    transition: all 0.3s ease;
  }
  
  .brand-image:hover .brand-title {
    color: #ff4747;
  }
  
  .swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>
@endpush
