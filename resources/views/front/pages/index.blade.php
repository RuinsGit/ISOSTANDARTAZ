@extends('front.layouts.master')

@section('title', $settings['home'])

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

   

    <!-- Hero Section Start -->
    <section
      class="hero-section hero-1 bg-cover"
      style="background-image: url('{{ asset('front/assets/img/hero/hero-bg.jpg') }}')"
    >
      <div class="swiper-dot">
        <div class="dot"></div>
      </div>
      <div class="container">
        <div class="swiper hero-slider">
          <div class="swiper-wrapper">
            @php
              $homeCartSections = \App\Models\HomeCartSection::active()->ordered()->get();
            @endphp
            
            @forelse($homeCartSections as $slide)
            <div class="swiper-slide">
              <div class="row g-4 align-items-center">
                <div class="col-lg-5">
                  <div class="hero-content">
                    <span>{{ $settings['new_in_stock'] }}</span>
                    <h1>
                      {{ $slide->title }}
                    </h1>
                    <p>
                      {{ $slide->description }}
                    </p>
                    <div class="hero-button">
                      <a href="car-details.html" class="theme-btn hover-white"
                        >{{ $settings['buy_this_car'] }}
                        <i class="fa-sharp fa-regular fa-arrow-right"></i
                      ></a>
                      <a href="about.html" class="link-btn">{{ $settings['explore_more'] }}</a>
                    </div>

                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="hero-image-items">
                    <div class="hero-image">
                        <img src="{{ asset($slide->image) }}" alt="{{ $slide->title }}" />
                    </div>
                    <div class="bg-shape">
                      <img src="{{ asset('front/assets/img/hero/car-shape.png') }}" alt="img" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @empty
            <div class="swiper-slide">
              <div class="row g-4 align-items-center">
                <div class="col-lg-5">
                  <div class="hero-content">
                    <span>{{ $settings['new_in_stock'] }}</span>
                    <h1>
                      {{ $settings['next_gen_cars'] }}
                    </h1>
                    <p>
                      {{ $settings['discover_innovation'] }}
                    </p>
                    <div class="hero-button">
                      <a href="car-details.html" class="theme-btn hover-white"
                        >{{ $settings['buy_this_car'] }}
                        <i class="fa-sharp fa-regular fa-arrow-right"></i
                      ></a>
                      <a href="about.html" class="link-btn">{{ $settings['explore_more'] }}</a>
                    </div>

                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="hero-image-items">
                    <div class="hero-image">
                        <img src="{{ asset('front/assets/img/hero/hero-car-1.png') }}" alt="img" />
                    </div>
                    <div class="bg-shape">
                      <img src="{{ asset('front/assets/img/hero/car-shape.png') }}" alt="img" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="row g-4 align-items-center">
                <div class="col-lg-5">
                  <div class="hero-content">
                    <span>{{ $settings['new_in_stock'] }}</span>
                    <h1>
                      {{ $settings['next_gen_cars_2'] }}
                    </h1>
                    <p>
                      {{ $settings['discover_innovation_2'] }}
                    </p>
                    <div class="hero-button">
                      <a href="car-details.html" class="theme-btn hover-white"
                        >{{ $settings['buy_this_car_2'] }}
                        <i class="fa-sharp fa-regular fa-arrow-right"></i
                      ></a>
                      <a href="about.html" class="link-btn">{{ $settings['explore_more_2'] }}</a>
                    </div>

                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="hero-image-items">
                    <div class="hero-image">
                      <img src="{{ asset('front/assets/img/hero/hero-car-1.png') }}" alt="img" />
                    </div>
                    <div class="bg-shape">
                      <img src="{{ asset('front/assets/img/hero/car-shape.png') }}" alt="img" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="row g-4 align-items-center">
                <div class="col-lg-5">
                  <div class="hero-content">
                    <span>{{ $settings['new_in_stock'] }}</span>
                    <h1>
                      {{ $settings['next_gen_cars_3'] }}
                    </h1>
                    <p>
                      {{ $settings['discover_innovation_3'] }}
                    </p>
                    <div class="hero-button">
                      <a href="car-details.html" class="theme-btn hover-white"
                        >{{ $settings['buy_this_car_3'] }}
                        <i class="fa-sharp fa-regular fa-arrow-right"></i
                      ></a>
                      <a href="about.html" class="link-btn">{{ $settings['explore_more_3'] }}</a>
                    </div>

                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="hero-image-items">
                    <div class="hero-image">
                      <img src="{{ asset('front/assets/img/hero/hero-car-1.png') }}" alt="img" />
                    </div>
                    <div class="bg-shape">
                      <img src="{{ asset('front/assets/img/hero/car-shape.png') }}" alt="img" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforelse
          </div>
        </div>
      </div>
    </section>
   
    

     <!-- Feature Section Start --> 
     <section class="feature-section fix section-padding">
      <div class="container">
        <div class="row g-4">
          @php
            $homeFollows = \App\Models\HomeFollow::active()->ordered()->take(3)->get();
          @endphp
          
          @forelse($homeFollows as $key => $homeFollow)
          <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".{{ ($key + 3) }}s">
            <div class="feature-box-items">
              <div class="number">0{{ $key + 1 }}</div>
              <div class="content">
                <h3>{{ $homeFollow->title }}</h3>
                <p>{{ $homeFollow->description }}</p>
                <div class="mt-3">
                  <a href="{{ $homeFollow->link }}" class="theme-btn">{{ $settings['follow'] }}</a>
                </div>
              </div>
            </div>
          </div>
          @empty
          <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
            <div class="feature-box-items">
              <div class="number">01</div>
              <div class="content">
                <h3>{{ $settings['variety_of_cars'] }}</h3>
                <p>
                  {{ $settings['variety_desc'] }}
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
            <div class="feature-box-items">
              <div class="number">02</div>
              <div class="content">
                <h3>{{ $settings['competitive_pricing'] }}</h3>
                <p>
                  {{ $settings['competitive_pricing_desc'] }}
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
            <div class="feature-box-items">
              <div class="number">03</div>
              <div class="content">
                <h3>{{ $settings['support'] }}</h3>
                <p>
                  {{ $settings['support_desc'] }}
                </p>
              </div>
            </div>
          </div>
          @endforelse
        </div>
      </div>
    </section>

    <!-- Feature Car Section Start -->
    <section class="feature-car-section fix section-padding section-bg-black">
      <div class="car-shape float-bob-x">
        <img src="{{ asset('front/assets/img/car-shape.png') }}" alt="img" />
      </div>
      <div class="container">
        <div class="feature-car-wrapper">
          <div class="row g-4 align-items-center">
            <div class="col-lg-6">
              <div class="feature-car-content">
                <div class="section-title">
                  <h6 class="wow fadeInUp">Features Car</h6>
                  <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
                    {{ $settings['sign_up_never_miss_a_deal'] }}
                  </h2>
                </div>

                <div class="feature-button">


                </div>
              </div>
            </div>
            <div class="col-lg-5 wow fadeInUp" data-wow-delay=".3s">
              <div class="car-list-box">
                <h3>Find Your Car</h3>
                <div class="row g-4">
                  <div class="col-md-12">
                    <div class="form-clt">
                      <span>Branch</span>
                      <div class="nice-select" tabindex="0">
                        <span class="current"> All Branch </span>
                        <ul class="list">
                          <li data-value="1" class="option selected focus">
                            All Branch
                          </li>
                          <li data-value="1" class="option">Branch 01</li>
                          <li data-value="1" class="option">Branch 02</li>
                          <li data-value="1" class="option">Branch 03</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-clt">
                      <span>Make</span>
                      <div class="nice-select" tabindex="0">
                        <span class="current"> All Make </span>
                        <ul class="list">
                          <li data-value="1" class="option selected focus">
                            All Make
                          </li>
                          <li data-value="1" class="option">Style 01</li>
                          <li data-value="1" class="option">Style 02</li>
                          <li data-value="1" class="option">Style 03</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-clt">
                      <span>Model</span>
                      <div class="nice-select" tabindex="0">
                        <span class="current"> All Model </span>
                        <ul class="list">
                          <li data-value="1" class="option selected focus">
                            All Model
                          </li>
                          <li data-value="1" class="option">Model 01</li>
                          <li data-value="1" class="option">Model 02</li>
                          <li data-value="1" class="option">Model 03</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="theme-btn">SEARCH</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Counter Section Start -->
    <section class="counter-section fix section-padding" style="display: flex; justify-content: space-between; align-items: center">
      <div class="container">
        <div class="counter-wrapper" style="display: flex; justify-content: space-between; align-items: center">
          @php
              $keyfiyet = \App\Models\Keyfiyet::first();
          @endphp
          
          @if($keyfiyet)
          <div class="counter-box wow fadeInUp" data-wow-delay=".2s">
            <div class="content">
              <h2><span class="count">{{ $keyfiyet->number_filial }}</span>+</h2>
              <p>{{ $keyfiyet->filialTitle }}</p>
            </div>
          </div>
          <div class="counter-box active wow fadeInUp" data-wow-delay=".4s">
            <div class="content">
              <h2><span class="count">{{ $keyfiyet->number_customer }}</span>+</h2>
              <p>{{ $keyfiyet->customerTitle }}</p>
            </div>
          </div>
         
          <div class="counter-box wow fadeInUp" data-wow-delay=".8s">
            <div class="content">
              <h2><span class="count">{{ $keyfiyet->number_keyfiyet }}</span>+</h2>
              <p>{{ $keyfiyet->keyfiyetTitle }}</p>
            </div>
          </div>
          @else
          <div class="counter-box wow fadeInUp" data-wow-delay=".2s">
            <div class="content">
              <h2><span class="count">25</span>+</h2>
              <p>Şube Sayısı</p>
            </div>
          </div>
          <div class="counter-box active wow fadeInUp" data-wow-delay=".4s">
            <div class="content">
              <h2><span class="count">155</span>+</h2>
              <p>Müşteri Sayısı</p>
            </div>
          </div>
         
          <div class="counter-box wow fadeInUp" data-wow-delay=".8s">
            <div class="content">
              <h2><span class="count">25</span>+</h2>
              <p>Keyfiyet Sayısı</p>
            </div>
          </div>
          @endif
        </div>
      </div>
    </section>

    <!-- Testimonial Section Start -->


    <!-- News Section Start -->
    <section class="news-section section-padding fix">
      <div class="container">
        <div class="section-title-area">
          <div class="section-title">
            <h6 class="wow fadeInUp">{{ $settings['lastest_news'] }}</h6>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">
            {{ $settings['Chek-blog-news'] }}<br />
              posts
            </h2>
          </div>
          <a
            href="news.html"
            class="theme-btn wow fadeInUp"
            data-wow-delay=".5s"
            >{{ $settings['view_more'] }}<i class="fa-regular fa-car"></i
          ></a>
        </div>
        <div class="row">
          <div
            class="col-xl-4 col-lg-6 col-md-6 img-custom-anim-top wow"
            data-wow-delay=".3s"
          >
            <div class="news-box-items">
              <div class="news-image">
                <img src="{{ asset('front/assets/img/news/01.jpg') }}" alt="img" />
              </div>
              <div class="news-content">
                <h3>
                  <a href="news-details.html"
                    >What to Look for When Buying a Pre-Owned Car</a
                  >
                </h3>
                <p>
                  From luxury and economy cars and find out which best suits
                  your lifestyle.
                </p>
                <div class="link-btn-area">
                  <a href="news-details.html" class="link">{{ $settings['read_more'] }}</a>
                  <a href="news-details.html" class="arrow-icon">
                    <i class="fa-sharp fa-regular fa-arrow-up-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="col-xl-4 col-lg-6 col-md-6 img-custom-anim-top wow"
            data-wow-delay=".5s"
          >
            <div class="news-box-items">
              <div class="news-image">
                <img src="{{ asset('front/assets/img/news/02.jpg') }}" alt="img" />
              </div>
              <div class="news-content">
                <h3>
                  <a href="news-details.html"
                    >Luxury Cars Economy Cars Which is Right for You</a
                  >
                </h3>
                <p>
                  From luxury and economy cars and find out which best suits
                  your lifestyle.
                </p>
                <div class="link-btn-area">
                  <a href="news-details.html" class="link">{{ $settings['read_more'] }}</a>
                  <a href="news-details.html" class="arrow-icon">
                    <i class="fa-sharp fa-regular fa-arrow-up-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="col-xl-4 col-lg-6 col-md-6 img-custom-anim-top wow"
            data-wow-delay=".7s"
          >
            <div class="news-box-items">
              <div class="news-image">
                <img src="{{ asset('front/assets/img/news/03.jpg') }}" alt="img" />
              </div>
              <div class="news-content">
                <h3>
                  <a href="news-details.html"
                    >Understanding Car Financing: What You Need to Know</a
                  >
                </h3>
                <p> 
                  From luxury and economy cars and find out which best suits
                  your lifestyle.
                </p>
                <div class="link-btn-area">
                  <a href="news-details.html" class="link">{{ $settings['read_more'] }}</a>
                  <a href="news-details.html" class="arrow-icon">
                    <i class="fa-sharp fa-regular fa-arrow-up-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
