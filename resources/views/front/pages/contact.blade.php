@extends('front.layouts.master')

@section('title', $settings['contact'])

@section('content')

<!DOCTYPE html>
<html lang="en">
  <!--<< Header Area >>-->
  
<!-- Mirrored from revauto.baseecom.com/main-files/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Mar 2025 20:20:37 GMT -->

  <body>
    <!-- Preloader Start -->
    <div id="preloader" class="preloader">
      <div class="animation-preloader">
        <div class="spinner"></div>
        <div class="txt-loading">
          <span data-text-preloader="R" class="letters-loading"> R </span>
          <span data-text-preloader="E" class="letters-loading"> E </span>
          <span data-text-preloader="V" class="letters-loading"> V </span>
          <span data-text-preloader="A" class="letters-loading"> A </span>
          <span data-text-preloader="U" class="letters-loading"> U </span>
          <span data-text-preloader="T" class="letters-loading"> T </span>
          <span data-text-preloader="0" class="letters-loading"> O </span>
        </div>
        <p class="text-center">Loading</p>
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
                <a href="{{ route('front.index') }}">
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
                <a href="{{ route('front.contact') }}" class="theme-btn text-center">
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
      style="background-image: url('{{ $blogHero && $blogHero->image_path ? asset($blogHero->image_path) : asset('front/assets/img/breadcrumb-bg.jpg') }}')"
    >
      <div class="container">
        <div class="page-heading">
          <div class="breadcrumb-sub-title">
            <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ $settings['contact'] }}</h1>
          </div>
          <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
            <li>
              <a href="{{ route('front.index') }}"> {{ $settings['home'] }} </a>
            </li>
            <li>
              <i class="fa-regular fa-chevrons-right"></i>
            </li>
            <li>{{ $settings['contact'] }}</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Contact Sction Start -->
    <section class="contact-section fix section-padding">
      <div class="container">
        <div class="contact-wrapper">
          <div class="row g-4">
            <div class="col-lg-4">
              <div class="contact-left">
                @if($contactInfo)
                <div class="contact-box">
                  <div class="icon">
                    @if($contactInfo->number_image)
                      <img src="{{ asset($contactInfo->number_image) }}" alt="phone icon" style="max-width: 40px; max-height: 40px;">
                    @else
                      <i class="fa-regular fa-phone-volume"></i>
                    @endif
                  </div>
                  <div class="content">
                    <h4>{{ $contactInfo->numberTitle ?: $settings['phone'] }}</h4>
                    <p><a href="tel:{{ $contactInfo->number }}">{{ $contactInfo->number }}</a></p>
                  </div>
                </div>
                <div class="contact-box">
                  <div class="icon">
                    @if($contactInfo->mail_image)
                      <img src="{{ asset($contactInfo->mail_image) }}" alt="mail icon" style="max-width: 40px; max-height: 40px;">
                    @else
                      <i class="fa-regular fa-envelope"></i>
                    @endif
                  </div>
                  <div class="content">
                    <h4>{{ $contactInfo->mailTitle ?: $settings['email'] }}</h4>
                    <p>
                      <a href="mailto:{{ $contactInfo->mail }}">{{ $contactInfo->mail }}</a>
                    </p>
                  </div>
                </div>
                <div class="contact-box">
                  <div class="icon">
                    @if($contactInfo->address_image)
                      <img src="{{ asset($contactInfo->address_image) }}" alt="address icon" style="max-width: 40px; max-height: 40px;">
                    @else
                      <i class="fa-regular fa-location-dot"></i>
                    @endif
                  </div>
                  <div class="content">
                    <h4>{{ $contactInfo->addressTitle ?: $settings['address'] }}</h4>
                    <p>{{ $contactInfo->address }}</p>
                  </div>
                </div>
                @else
                <div class="contact-box">
                        <div class="icon">
                    <i class="fa-regular fa-phone-volume"></i>
                  </div>
                  <div class="content">
                    <h4>{{ $settings['phone'] }}</h4>
                    <p><a href="tel:+123456789">+123 456 789</a></p>
                  </div>
                        </div>
                <div class="contact-box">
                        <div class="icon">
                    <i class="fa-regular fa-envelope"></i>
                  </div>
                  <div class="content">
                    <h4>{{ $settings['email'] }}</h4>
                    <p>
                      <a href="mailto:info@example.com">info@example.com</a>
                    </p>
                  </div>
                        </div>
                <div class="contact-box">
                        <div class="icon">
                    <i class="fa-regular fa-location-dot"></i>
                  </div>
                  <div class="content">
                    <h4>{{ $settings['address'] }}</h4>
                    <p>Adres bilgisi burada yer alacak</p>
                        </div>
                </div>
                @endif

                @if(isset($contactData) && $contactData)
                <div class="contact-info-text mt-4">
                  <h4>{{ $contactData->{'title_'.app()->getLocale()} }}</h4>
                  <div class="contact-description">
                    {!! $contactData->{'text_'.app()->getLocale()} !!}
                  </div>
                  @if($contactData->image_path)
                  <div class="contact-image mt-3">
                    <img src="{{ asset('storage/'.$contactData->image_path) }}" alt="{{ $contactData->{'title_'.app()->getLocale()} }}" class="img-fluid rounded">
                  </div>
                  @endif
                </div>
                @endif
                </div>
            </div>
            <div class="col-lg-8">
              <div class="contact-right-box">
                <div class="section-title text-center">
                  <h6 class="wow fadeInUp">{{ $settings['contact_us'] }}</h6>
                  <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    {{ isset($contactData) ? $contactData->{'contact_title_'.app()->getLocale()} : (isset($settings['get_in_touch']) ? $settings['get_in_touch'] : 'Bizimle İletişime Geçin') }}
                  </h2>
                </div>
                <form
                  action="{{ route('front.storeMessage') }}"
                  id="contact-form"
                  method="POST"
                  class="contact-form-items mt-3 mt-md-0"
                >
                  @csrf
                  @if(session('success'))
                  <div class="alert alert-success mb-3">
                    {{ session('success') }}
                  </div>
                  @endif
                  
                  @if(session('error'))
                  <div class="alert alert-danger mb-3">
                    {{ session('error') }}
                  </div>
                  @endif
                  
                  <div class="row g-4">
                    <div class="col-lg-6">
                      <div class="form-clt">
                        <span>{{ $settings['your_name'] ?? 'Adınız*' }}</span>
                        <input
                          type="text"
                          name="name"
                          id="name"
                          placeholder="{{ $settings['your_name'] ?? 'Adınız' }}"
                          value="{{ old('name') }}"
                          required
                        />
                        @error('name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-clt">
                        <span>{{ $settings['your_email'] ?? 'E-posta Adresiniz*' }}</span>
                        <input
                          type="email"
                          name="email"
                          id="email"
                          placeholder="{{ $settings['your_email'] ?? 'E-posta Adresiniz' }}"
                          value="{{ old('email') }}"
                          required
                        />
                        @error('email')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-clt">
                        <span>{{ $settings['website'] ?? 'Web Siteniz' }}</span>
                        <input
                          type="text"
                          name="website"
                          id="website"
                          placeholder="{{ $settings['website'] ?? 'Web Siteniz' }}"
                          value="{{ old('website') }}"
                        />
                        @error('website')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-clt">
                        <span>{{ $settings['your_message'] ?? 'Mesajınız*' }}</span>
                        <textarea
                          name="comment"
                          id="comment"
                          placeholder="{{ $settings['your_message'] ?? 'Mesajınız' }}"
                          required
                        >{{ old('comment') }}</textarea>
                        @error('comment')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <button type="submit" class="theme-btn">{{ $settings['send'] ?? 'Gönder' }}</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Map Section Start -->
    <div class="map-section section-padding fix pt-0">
      <div class="container">
        <div class="google-map wow fadeInUp" data-wow-delay=".3s">
          @if($contactInfo && $contactInfo->filial_description)
            {!! $contactInfo->filial_description !!}
          @else
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.0775891151265!2d49.870439999999995!3d40.3825777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d9bdc74118b%3A0xc8377414faa8f86b!2sBaku%2C%20Azerbaijan!5e0!3m2!1sen!2saz!4v1657281258362!5m2!1sen!2saz"
              style="border: 0; width: 100%; height: 450px;"
              allowfullscreen=""
              loading="lazy"
            ></iframe>
          @endif
        </div>
        </div>
    </div>

    <!-- Faq Section Start -->



   
  </body>

<!-- Mirrored from revauto.baseecom.com/main-files/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Mar 2025 20:20:38 GMT -->
</html>
@endsection