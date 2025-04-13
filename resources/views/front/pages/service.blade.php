@extends('front.layouts.master')

@section('title', isset($settings['services']) ? $settings['services'] : 'Hizmetler')

@section('content')







<!DOCTYPE html>
<html lang="en">
  <!--<< Header Area >>-->
  
<!-- Mirrored from revauto.baseecom.com/main-files/service.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Mar 2025 20:21:12 GMT -->

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
      style="background-image: url('{{ $blogHero && $blogHero->image_path ? asset('storage/' . $blogHero->image_path) : asset('front/assets/img/breadcrumb-bg.jpg') }}')"
    >
      <div class="container">
        <div class="page-heading">
          <div class="breadcrumb-sub-title">
            <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ isset($settings['services']) ? $settings['services'] : 'Hizmetler' }}</h1>
          </div>
          <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
            <li>
              <a href="{{ route('front.index') }}"> {{ nav_trans('home', 'Ana Sayfa') }} </a>
            </li>
            <li>
              <i class="fa-regular fa-chevrons-right"></i>
            </li>
            <li>{{ isset($settings['services']) ? $settings['services'] : 'Hizmetler' }}</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Service Intro Section -->
    <section class="service-intro-section fix section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay=".3s">
                    <div class="service-intro-content">
                        <h6 class="subtitle">{{ isset($settings['what_we_do']) ? $settings['what_we_do'] : 'Ne Yapıyoruz' }}</h6>
                        <h2 class="title">{{ isset($settings['services_we_offer']) ? $settings['services_we_offer'] : 'Sunduğumuz Hizmetler' }}</h2>
                        <p class="description">
                            {{ isset($settings['service_description']) ? $settings['service_description'] : 'Otomotiv ihtiyaçlarınız ne olursa olsun, size yardımcı olmak için buradayız. Uzman ekibimiz ve profesyonel ekipmanlarımızla en kaliteli hizmeti sunmaktayız.' }}
                        </p>
                        <div class="service-features">
                            <div class="feature-item">
                                <div class="icon">
                                    <i class="fa-regular fa-check"></i>
                                </div>
                                <div class="text">
                                    {{ isset($settings['feature_1']) ? $settings['feature_1'] : 'Profesyonel Ekip' }}
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="icon">
                                    <i class="fa-regular fa-check"></i>
                                </div>
                                <div class="text">
                                    {{ isset($settings['feature_2']) ? $settings['feature_2'] : 'Kaliteli Yedek Parçalar' }}
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="icon">
                                    <i class="fa-regular fa-check"></i>
                                </div>
                                <div class="text">
                                    {{ isset($settings['feature_3']) ? $settings['feature_3'] : 'Hızlı Servis' }}
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="icon">
                                    <i class="fa-regular fa-check"></i>
                                </div>
                                <div class="text">
                                    {{ isset($settings['feature_4']) ? $settings['feature_4'] : 'Uygun Fiyatlar' }}
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('front.contact') }}" class="theme-btn mt-4">
                            {{ isset($settings['contact_us']) ? $settings['contact_us'] : 'Bize Ulaşın' }}
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay=".5s">
                    <div class="service-intro-image">
                        <div class="service-slider">
                            @foreach($services as $service)
                                <div class="service-slide">
                                    <img src="{{ asset($service->image) }}" alt="{{ $service->{'image_alt_' . app()->getLocale()} }}" class="img-fluid">
                                    <div class="service-overlay">
                                        <a href="{{ route('front.service.show', $service->id) }}" class="service-link">
                                            <i class="fa-regular fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="experience-box">
                            <div class="years">{{ isset($settings['experience_years']) ? $settings['experience_years'] : '10+' }}</div>
                            <div class="text">{{ isset($settings['years_experience']) ? $settings['years_experience'] : 'Yıllık Tecrübe' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Section Start -->
    <section class="service-section fix section-padding section-bg">
        <div class="container">
            <div class="section-title text-center">
                <h6 class="wow fadeInUp">{{ isset($settings['what_we_do']) ? $settings['what_we_do'] : 'Ne Yapıyoruz' }}</h6>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">{{ isset($settings['services_list']) ? $settings['services_list'] : 'Hizmet Listemiz' }}</h2>
                <p class="mt-3 wow fadeInUp" data-wow-delay=".5s">
                    {{ isset($settings['services_list_description']) ? $settings['services_list_description'] : 'İhtiyacınız olan tüm otomotiv hizmetlerini tek bir çatı altında sunuyoruz.' }}
                </p>
            </div>
            <div class="row">
                @if(isset($services) && $services->count() > 0)
                    @foreach($services as $index => $service)
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".{{ ($index % 3) * 2 + 3 }}s">
                            <div class="service-card">
                                <div class="service-image">
                                    <img src="{{ asset($service->image) }}" alt="{{ $service->{'image_alt_' . app()->getLocale()} }}" class="img-fluid">
                                    <div class="service-overlay">
                                        <a href="{{ route('front.service.show', $service->id) }}" class="service-link">
                                            <i class="fa-regular fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="service-content">
                                    <div class="service-number">{{ sprintf('%02d', $index + 1) }}</div>
                                    <h4><a href="{{ route('front.service.show', $service->id) }}">{{ $service->{'title1_' . app()->getLocale()} }}</a></h4>
                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($service->{'text1_' . app()->getLocale()}), 100) }}</p>
                                    <a href="{{ route('front.service.show', $service->id) }}" class="read-more">
                                        {{ isset($settings['read_more']) ? $settings['read_more'] : 'Devamını Oku' }} <i class="fa-regular fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <p>{{ isset($settings['no_service']) ? $settings['no_service'] : 'Henüz hizmet bulunmamaktadır.' }}</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-section fix section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay=".3s">
                    <div class="why-choose-image" style="height: 400px; width: 600px;">
                        <div class="service-image" style="height: 400px; width: 600px;">
                            <img src="{{ asset('front/assets/img/service/why-choose.jpg') }}" alt="Neden Bizi Seçmelisiniz" class="img-fluid">
                            <div class="service-overlay">
                                <a href="{{ route('front.contact') }}" class="service-link">
                                    <i class="fa-regular fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="why-choose-badge">
                            <div class="icon">
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="text">
                                <div class="rating">4.9</div>
                                <div class="rating-text">{{ isset($settings['customer_rating']) ? $settings['customer_rating'] : 'Müşteri Memnuniyeti' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay=".5s">
                    <div class="why-choose-content">
                        <h6 class="subtitle">{{ isset($settings['why_choose_us']) ? $settings['why_choose_us'] : 'Neden Bizi Seçmelisiniz' }}</h6>
                        <h2 class="title">{{ isset($settings['why_choose_title']) ? $settings['why_choose_title'] : 'Kalite ve Güvenilirlikte Öncüyüz' }}</h2>
                        <p class="description">
                            {{ isset($settings['why_choose_description']) ? $settings['why_choose_description'] : 'Size en iyi hizmeti sunmak için uzman ekibimiz ve modern ekipmanlarımızla çalışıyoruz. Müşteri memnuniyeti bizim önceliğimizdir.' }}
                        </p>
                        
                        <div class="why-choose-list">
                            <div class="why-choose-item">
                                <div class="icon">
                                    <i class="fa-regular fa-users"></i>
                                </div>
                                <div class="content">
                                    <h5>{{ isset($settings['expert_team']) ? $settings['expert_team'] : 'Uzman Ekip' }}</h5>
                                    <p>{{ isset($settings['expert_team_desc']) ? $settings['expert_team_desc'] : 'Deneyimli ve profesyonel ekibimizle en kaliteli hizmeti sunuyoruz.' }}</p>
                                </div>
                            </div>
                            <div class="why-choose-item">
                                <div class="icon">
                                    <i class="fa-regular fa-gear"></i>
                                </div>
                                <div class="content">
                                    <h5>{{ isset($settings['modern_equipment']) ? $settings['modern_equipment'] : 'Modern Ekipmanlar' }}</h5>
                                    <p>{{ isset($settings['modern_equipment_desc']) ? $settings['modern_equipment_desc'] : 'En son teknoloji ekipmanlarla araç bakım ve onarımlarını gerçekleştiriyoruz.' }}</p>
                                </div>
                            </div>
                            <div class="why-choose-item">
                                <div class="icon">
                                    <i class="fa-regular fa-clock"></i>
                                </div>
                                <div class="content">
                                    <h5>{{ isset($settings['quick_service']) ? $settings['quick_service'] : 'Hızlı Servis' }}</h5>
                                    <p>{{ isset($settings['quick_service_desc']) ? $settings['quick_service_desc'] : 'Araç bakım ve onarımlarınızı hızlı bir şekilde tamamlıyoruz.' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
 
  </body>

<!-- Mirrored from revauto.baseecom.com/main-files/service.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Mar 2025 20:21:12 GMT -->
</html>









@endsection

@push('css')
<style>
    /* Service Intro Section */
    .service-intro-section {
        position: relative;
    }
    
    .service-intro-content .subtitle {
        color: #ff4747;
        font-weight: 600;
        margin-bottom: 15px;
    }
    
    .service-intro-content .title {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 20px;
        color: #222;
    }
    
    .service-intro-content .description {
        margin-bottom: 30px;
        color: #666;
    }
    
    .service-features {
        margin-bottom: 30px;
    }
    
    .feature-item {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }
    
    .feature-item .icon {
        width: 30px;
        height: 30px;
        background-color: rgba(255, 71, 71, 0.1);
        color: #ff4747;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin-right: 15px;
    }
    
    .feature-item .text {
        font-weight: 500;
        color: #333;
    }
    
    .service-intro-image {
        position: relative;
    }
    
    /* Slider stillemeleri */
    .service-slider {
        border-radius: 10px;
        overflow: hidden;
        height: 450px;
    }
    
    .service-slide {
        position: relative;
        height: 450px;
        width: 100%;
        overflow: hidden;
        display: none;
    }
    
    .service-slide.active {
        display: block;
    }
    
    .service-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .service-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .service-slide:hover .service-overlay {
        opacity: 1;
    }
    
    .service-link {
        width: 50px;
        height: 50px;
        background-color: #ff4747;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: #fff;
        font-size: 18px;
        transition: all 0.3s ease;
        transform: translateY(20px);
        opacity: 0;
    }
    
    .service-slide:hover .service-link {
        transform: translateY(0);
        opacity: 1;
    }
    
    .service-link:hover {
        background-color: #fff;
        color: #ff4747;
    }
    
    .experience-box {
        position: absolute;
        bottom: 30px;
        left: -20px;
        background-color: #ff4747;
        color: #fff;
        padding: 20px;
        border-radius: 10px;
        width: 150px;
        text-align: center;
        z-index: 10;
    }
    
    .experience-box .years {
        font-size: 36px;
        font-weight: 700;
        line-height: 1;
    }
    
    .experience-box .text {
        font-size: 16px;
        margin-top: 5px;
    }
    
    /* Service Cards */
    .service-card {
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 30px rgba(0,0,0,0.05);
        margin-bottom: 30px;
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .service-card:hover {
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        transform: translateY(-5px);
    }
    
    .service-image {
        position: relative;
        height: 250px;
        overflow: hidden;
    }
    
    .service-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.5s ease;
    }
    
    .service-card:hover .service-image img {
        transform: scale(1.1);
    }
    
    .service-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .service-card:hover .service-overlay {
        opacity: 1;
    }
    
    .service-link {
        width: 50px;
        height: 50px;
        background-color: #ff4747;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: #fff;
        font-size: 18px;
        transition: all 0.3s ease;
    }
    
    .service-link:hover {
        background-color: #fff;
        color: #ff4747;
    }
    
    .service-content {
        position: relative;
        padding: 25px;
    }
    
    .service-number {
        position: absolute;
        top: -20px;
        right: 20px;
        width: 40px;
        height: 40px;
        background-color: #ff4747;
        color: #fff;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }
    
    .service-content h4 {
        margin-bottom: 15px;
        font-size: 20px;
        font-weight: 600;
    }
    
    .service-content h4 a {
        color: #222;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .service-content h4 a:hover {
        color: #ff4747;
    }
    
    .service-content p {
        margin-bottom: 20px;
        color: #666;
    }
    
    .read-more {
        color: #ff4747;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
    }
    
    .read-more i {
        margin-left: 5px;
        transition: all 0.3s ease;
    }
    
    .read-more:hover {
        color: #222;
    }
    
    .read-more:hover i {
        transform: translateX(5px);
    }
    
    /* Why Choose Us Section */
    .why-choose-image {
        position: relative;
    }
    
    .why-choose-image img {
        border-radius: 10px;
        width: 100%;
        height: 500px;
        object-fit: cover;
    }
    
    .why-choose-badge {
        position: absolute;
        top: 30px;
        right: -20px;
        background-color: #fff;
        border-radius: 10px;
        padding: 15px;
        display: flex;
        align-items: center;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    .why-choose-badge .icon {
        width: 40px;
        height: 40px;
        background-color: #ff4747;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin-right: 15px;
    }
    
    .why-choose-badge .rating {
        font-size: 24px;
        font-weight: 700;
        color: #222;
        line-height: 1;
    }
    
    .why-choose-badge .rating-text {
        font-size: 14px;
        color: #666;
    }
    
    .why-choose-content .subtitle {
        color: #ff4747;
        font-weight: 600;
        margin-bottom: 15px;
    }
    
    .why-choose-content .title {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 20px;
        color: #222;
    }
    
    .why-choose-content .description {
        margin-bottom: 30px;
        color: #666;
    }
    
    .why-choose-list {
        margin-top: 30px;
    }
    
    .why-choose-item {
        display: flex;
        margin-bottom: 25px;
    }
    
    .why-choose-item .icon {
        width: 60px;
        height: 60px;
        background-color: rgba(255, 71, 71, 0.1);
        color: #ff4747;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        margin-right: 20px;
        font-size: 24px;
    }
    
    .why-choose-item .content h5 {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 10px;
        color: #222;
    }
    
    .why-choose-item .content p {
        color: #666;
        margin: 0;
    }
    
    /* CTA Section */
    .section-bg-2 {
        position: relative;
        background-size: cover;
        background-position: center;
        color: #fff;
        z-index: 1;
    }
    
    .section-bg-2:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.7);
        z-index: -1;
    }
    
    .cta-content h2 {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 20px;
    }
    
    .cta-content p {
        font-size: 18px;
        margin-bottom: 30px;
        opacity: 0.8;
    }
    
    .theme-btn {
        display: inline-block;
        background-color: #ff4747;
        color: #fff;
        padding: 15px 30px;
        border-radius: 5px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .theme-btn:hover {
        background-color: #fff;
        color: #ff4747;
        transform: translateY(-3px);
    }
    
    @media (max-width: 991px) {
        .service-intro-image .service-slider {
            height: 350px;
        }
        
        .service-slide {
            height: 350px;
        }
        
        .experience-box {
            bottom: 20px;
            left: 20px;
        }
        
        .why-choose-image img {
            height: 400px;
        }
        
        .why-choose-badge {
            top: 20px;
            right: 20px;
        }
    }
    
    @media (max-width: 767px) {
        .service-intro-section {
            text-align: center;
        }
        
        .feature-item {
            justify-content: center;
        }
        
        .service-intro-image {
            margin-top: 40px;
        }
        
        .why-choose-image {
            margin-bottom: 40px;
        }
    }
</style>
@endpush

@push('js')
<script>
    $(document).ready(function() {
        // Slider fonksiyonu
        function initServiceSlider() {
            let currentSlide = 0;
            const slides = $('.service-slide');
            const slideCount = slides.length;
            
            // İlk slaytı aktif yap
            slides.eq(currentSlide).addClass('active');
            
            // Otomatik geçiş
            setInterval(function() {
                slides.eq(currentSlide).fadeOut(500).removeClass('active');
                currentSlide = (currentSlide + 1) % slideCount;
                slides.eq(currentSlide).fadeIn(500).addClass('active');
            }, 5000);
        }
        
        // Slider'ı başlat
        initServiceSlider();
    });
</script>
@endpush