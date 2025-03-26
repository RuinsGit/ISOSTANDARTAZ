@extends('front.layouts.master')

@section('title', isset($service->{'meta_title_' . app()->getLocale()}) ? $service->{'meta_title_' . app()->getLocale()} : (isset($settings['service_details']) ? $settings['service_details'] : 'Hizmet Detayları'))

@section('meta_description', isset($service->{'meta_description_' . app()->getLocale()}) ? $service->{'meta_description_' . app()->getLocale()} : '')

@section('content')
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
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapper section-bg bg-cover"
         style="background-image: url('{{ asset(isset($service->bottom_image) ? $service->bottom_image : 'front/assets/img/breadcrumb-bg.jpg') }}')">
        <div class="overlay-dark"></div>
      <div class="container">
        <div class="page-heading">
          <div class="breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ isset($service->{'title1_' . app()->getLocale()}) ? $service->{'title1_' . app()->getLocale()} : (isset($settings['service_details']) ? $settings['service_details'] : 'Hizmet Detayları') }}</h1>
          </div>
          <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
            <li>
                        <a href="{{ route('front.index') }}"> {{ nav_trans('home', 'Ana Sayfa') }} </a>
                    </li>
                    <li>
                        <i class="fa-regular fa-chevrons-right"></i>
                    </li>
                    <li>
                        <a href="{{ route('front.service') }}"> {{ isset($settings['services']) ? $settings['services'] : 'Hizmetler' }} </a>
            </li>
            <li>
              <i class="fa-regular fa-chevrons-right"></i>
            </li>
                    <li>{{ isset($service->{'title1_' . app()->getLocale()}) ? $service->{'title1_' . app()->getLocale()} : 'Hizmet Detayı' }}</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Service Details Section Start -->
    <section class="service-details-section fix section-padding">
      <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 mb-md-5 mb-4 mb-xl-0 mb-lg-0">
        <div class="service-details-wrapper">
                        <div class="featured-image mb-5 wow fadeInUp" data-wow-delay=".3s">
                            <img src="{{ asset($service->image) }}" alt="{{ $service->{'image_alt_' . app()->getLocale()} }}" class="img-fluid" />
                            <div class="image-overlay">
                                <div class="overlay-content">
                                    <h4>{{ isset($service->{'title1_' . app()->getLocale()}) ? $service->{'title1_' . app()->getLocale()} : 'Hizmet Detayı' }}</h4>
                      </div>
                    </div>
                  </div>

                        <div class="service-intro mb-5 wow fadeInUp" data-wow-delay=".4s">
                            <h2>{{ $service->{'title1_' . app()->getLocale()} }}</h2>
                            <div class="service-highlights">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="highlight-item">
                                            <div class="icon">
                                                <i class="fa-regular fa-check-circle"></i>
                                            </div>
                                            <h5>{{ isset($settings['quality']) ? $settings['quality'] : 'Kalite' }}</h5>
                </div>
              </div>
                                    <div class="col-md-4">
                                        <div class="highlight-item">
                                            <div class="icon">
                                                <i class="fa-regular fa-clock"></i>
            </div>
                                            <h5>{{ isset($settings['fast_service']) ? $settings['fast_service'] : 'Hızlı Hizmet' }}</h5>
                  </div>
                </div>
                                    <div class="col-md-4">
                                        <div class="highlight-item">
                                            <div class="icon">
                                                <i class="fa-regular fa-thumbs-up"></i>
                  </div>
                                            <h5>{{ isset($settings['satisfaction']) ? $settings['satisfaction'] : 'Müşteri Memnuniyeti' }}</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
                        
                        <div class="service-content mb-5 wow fadeInUp" data-wow-delay=".5s">
                            <div class="content-block">
                                {!! $service->{'text1_' . app()->getLocale()} !!}
        </div>
      </div>
                        
                        <div class="service-features mb-5 wow fadeInUp" data-wow-delay=".6s">
                            <h3>{{ $service->{'title2_' . app()->getLocale()} }}</h3>
        <div class="row">
                                <div class="col-md-12">
                                    <div class="content-block with-icon">
                                        {!! $service->{'text2_' . app()->getLocale()} !!}
              </div>
              </div>
            </div>
          </div>
                        
                        <div class="additional-image mb-5 wow fadeInUp" data-wow-delay=".7s">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="image-wrapper">
                                        <img src="{{ asset($service->bottom_image) }}" alt="{{ $service->{'bottom_image_alt_' . app()->getLocale()} }}" class="img-fluid" />
              </div>
              </div>
            </div>
          </div>
                        
                        <!-- İletişim CTA -->
                        <div class="service-cta mt-5 wow fadeInUp" data-wow-delay=".8s">
                            <div class="cta-box">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h4>{{ isset($settings['need_more_info']) ? $settings['need_more_info'] : 'Daha fazla bilgiye mi ihtiyacınız var?' }}</h4>
                                        <p>{{ isset($settings['contact_for_more']) ? $settings['contact_for_more'] : 'Bu hizmet hakkında daha detaylı bilgi için bizimle iletişime geçin.' }}</p>
              </div>
                                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                        <a href="{{ route('front.contact') }}" class="theme-btn">{{ isset($settings['contact_us']) ? $settings['contact_us'] : 'Bize Ulaşın' }}</a>
              </div>
            </div>
              </div>
            </div>
          </div>
        </div>

                <div class="col-xl-4 col-lg-5">
                    <div class="service-sidebar">
                        <div class="widget service-widget mb-4 wow fadeInUp" data-wow-delay=".5s">
                            <h3 class="widget-title">{{ isset($settings['all_services']) ? $settings['all_services'] : 'Tüm Hizmetler' }}</h3>
                            <ul class="service-list">
                                @if(isset($allServices) && $allServices->count() > 0)
                                    @foreach($allServices as $serviceItem)
                                        <li class="{{ $serviceItem->id == $service->id ? 'active' : '' }}">
                                            <a href="{{ route('front.service.show', $serviceItem->id) }}">
                                                {{ $serviceItem->{'title1_' . app()->getLocale()} }}
                                                <i class="fa-regular fa-arrow-right"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
      </div>

                        <div class="widget contact-widget wow fadeInUp" data-wow-delay=".7s">
                            <h3 class="widget-title">{{ isset($settings['need_help']) ? $settings['need_help'] : 'Yardıma mı ihtiyacınız var?' }}</h3>
                            <div class="contact-info">
                                <div class="contact-item">
                                    <div class="icon">
                                        <i class="fa-regular fa-phone"></i>
                                    </div>
                                    <div class="text">
                                        <span>{{ isset($settings['phone']) ? $settings['phone'] : 'Telefon' }}</span>
                                        <h5>{{ isset($settings['phone_number']) ? $settings['phone_number'] : '+90 123 456 7890' }}</h5>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <div class="icon">
                                        <i class="fa-regular fa-envelope"></i>
                                    </div>
                                    <div class="text">
                                        <span>{{ isset($settings['email']) ? $settings['email'] : 'E-posta' }}</span>
                                        <h5>{{ isset($settings['email_address']) ? $settings['email_address'] : 'info@example.com' }}</h5>
                                    </div>
                                </div>
                                <div class="contact-btn">
                                    <a href="{{ route('front.contact') }}" class="theme-btn">{{ isset($settings['contact_us']) ? $settings['contact_us'] : 'Bize Ulaşın' }}</a>
                </div>
              </div>
            </div>
                        
                        <!-- Hızlı Bilgi Formu Widget -->
                        <div class="widget inquiry-widget wow fadeInUp" data-wow-delay=".9s">
                            <h3 class="widget-title">{{ isset($settings['quick_inquiry']) ? $settings['quick_inquiry'] : 'Hızlı Bilgi Formu' }}</h3>
                            <form action="#" class="quick-contact-form">
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" placeholder="{{ isset($settings['your_name']) ? $settings['your_name'] : 'Adınız' }}" required>
                </div>
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control" placeholder="{{ isset($settings['your_email']) ? $settings['your_email'] : 'E-posta Adresiniz' }}" required>
              </div>
                                <div class="form-group mb-3">
                                    <input type="tel" class="form-control" placeholder="{{ isset($settings['your_phone']) ? $settings['your_phone'] : 'Telefon Numaranız' }}">
            </div>
                                <div class="form-group mb-3">
                                    <textarea class="form-control" rows="4" placeholder="{{ isset($settings['your_message']) ? $settings['your_message'] : 'Mesajınız' }}" required></textarea>
                </div>
                                <button type="submit" class="theme-btn w-100">{{ isset($settings['send_inquiry']) ? $settings['send_inquiry'] : 'Gönder' }}</button>
                            </form>
              </div>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection

@push('css')
<style>
  /* Genel Stiller */
  .service-details-section {
    position: relative;
  }
  
  /* Breadcrumb Stili */
  .breadcrumb-wrapper {
    position: relative;
    padding: 100px 0;
  }
  
  .overlay-dark {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
    z-index: 1;
  }
  
  .breadcrumb-wrapper .container {
    position: relative;
    z-index: 2;
  }
  
  .breadcrumb-sub-title h1 {
    color: #fff;
    font-size: 42px;
    font-weight: 700;
    margin-bottom: 15px;
  }
  
  .breadcrumb-items {
    display: flex;
    align-items: center;
    padding: 0;
    margin: 0;
    list-style: none;
  }
  
  .breadcrumb-items li {
    font-size: 16px;
    color: #fff;
    margin-right: 10px;
  }
  
  .breadcrumb-items li a {
    color: #fff;
    text-decoration: none;
  }
  
  .breadcrumb-items li i {
    font-size: 12px;
  }
  
  /* Servis Detay Wrapper */
  .service-details-wrapper {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    padding: 0 0 20px;
  }
  
  /* Ana Görsel Stili */
  .featured-image {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 30px;
  }
  
  .featured-image img {
    width: 100%;
    height: auto;
    transition: all 0.5s ease;
    transform: scale(1);
  }
  
  .featured-image:hover img {
    transform: scale(1.05);
  }
  
  .image-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
    padding: 20px;
    opacity: 0;
    transition: all 0.3s ease;
  }
  
  .featured-image:hover .image-overlay {
    opacity: 1;
  }
  
  .overlay-content h4 {
    color: #fff;
    font-size: 24px;
    font-weight: 600;
    margin: 0;
  }
  
  /* Servis Intro Stili */
  .service-intro {
    margin-bottom: 30px;
  }
  
  .service-intro h2 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 20px;
    color: #222;
    position: relative;
    padding-bottom: 15px;
  }
  
  .service-intro h2:after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 70px;
    height: 3px;
    background: #ff4747;
  }
  
  .service-highlights {
    margin-top: 30px;
    background: #f9f9f9;
    border-radius: 10px;
    padding: 30px;
  }
  
  .highlight-item {
    text-align: center;
    padding: 15px;
    transition: all 0.3s ease;
    border-radius: 10px;
  }
  
  .highlight-item:hover {
    background: #fff;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    transform: translateY(-5px);
  }
  
  .highlight-item .icon {
    font-size: 40px;
    color: #ff4747;
    margin-bottom: 15px;
  }
  
  .highlight-item h5 {
    font-size: 18px;
    margin: 0;
    font-weight: 600;
    color: #333;
  }
  
  /* İçerik Bloğu Stili */
  .content-block {
    color: #666;
    line-height: 1.8;
    margin-bottom: 30px;
  }
  
  .content-block p {
    margin-bottom: 15px;
  }
  
  .content-block.with-icon p {
    position: relative;
    padding-left: 30px;
  }
  
  .content-block.with-icon p:before {
    content: '\f00c';
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    position: absolute;
    left: 0;
    top: 5px;
    color: #ff4747;
  }
  
  /* Servis Özellikleri Stili */
  .service-features {
    margin: 40px 0;
  }
  
  .service-features h3 {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 20px;
    color: #222;
    position: relative;
    padding-bottom: 15px;
  }
  
  .service-features h3:after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 2px;
    background: #ff4747;
  }
  
  /* Ek Görsel Stili */
  .additional-image {
    margin: 30px 0;
  }
  
  .image-wrapper {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
  }
  
  .image-wrapper img {
    width: 100%;
    height: auto;
    transition: all 0.5s ease;
  }
  
  .image-wrapper:hover img {
    transform: scale(1.02);
  }
  
  /* CTA Bölümü */
  .service-cta {
    margin-top: 40px;
  }
  
  .cta-box {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 30px;
    border-left: 5px solid #ff4747;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
  }
  
  .cta-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
  }
  
  .cta-box h4 {
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 10px;
    color: #222;
  }
  
  .cta-box p {
    margin-bottom: 0;
    color: #666;
  }
  
  /* Sidebar Stilleri */
  .service-sidebar .widget {
    background-color: #f8f9fa;
    padding: 30px;
    border-radius: 10px;
    margin-bottom: 30px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
  }
  
  .service-sidebar .widget:hover {
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
  }
  
  .service-sidebar .widget-title {
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #e9e9e9;
    color: #222;
    position: relative;
  }
  
  .service-sidebar .widget-title:after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -1px;
    width: 50px;
    height: 2px;
    background: #ff4747;
  }
  
  /* Servis Listesi */
  .service-sidebar .service-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  
  .service-sidebar .service-list li {
    margin-bottom: 10px;
    border-bottom: 1px solid #e9e9e9;
    padding-bottom: 10px;
    transition: all 0.3s ease;
  }
  
  .service-sidebar .service-list li:last-child {
    margin-bottom: 0;
    border-bottom: none;
  }
  
  .service-sidebar .service-list li a {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #666;
    transition: all 0.3s ease;
    text-decoration: none;
    padding: 8px 0;
  }
  
  .service-sidebar .service-list li a:hover,
  .service-sidebar .service-list li.active a {
    color: #ff4747;
  }
  
  .service-sidebar .service-list li a i {
    transition: all 0.3s ease;
  }
  
  .service-sidebar .service-list li a:hover i,
  .service-sidebar .service-list li.active a i {
    transform: translateX(5px);
  }
  
  .service-sidebar .service-list li:hover {
    padding-left: 5px;
  }
  
  /* İletişim Widget */
  .contact-widget {
    background-color: #ff4747 !important;
    color: #fff;
  }
  
  .contact-widget .widget-title {
    color: #fff;
    border-bottom-color: rgba(255, 255, 255, 0.2);
  }
  
  .contact-widget .widget-title:after {
    background: #fff;
  }
  
  .contact-item {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
  }
  
  .contact-item .icon {
    font-size: 24px;
    margin-right: 15px;
    color: #fff;
  }
  
  .contact-item .text span {
    display: block;
    font-size: 14px;
    margin-bottom: 5px;
    opacity: 0.8;
  }
  
  .contact-item .text h5 {
    font-size: 18px;
    font-weight: 600;
    margin: 0;
  }
  
  .contact-btn {
    margin-top: 25px;
  }
  
  .contact-btn .theme-btn {
    background-color: #fff;
    color: #ff4747;
    border: none;
    display: block;
    text-align: center;
    transition: all 0.3s ease;
  }
  
  .contact-btn .theme-btn:hover {
    background-color: #222;
    color: #fff;
    transform: translateY(-3px);
  }
  
  /* Hızlı Bilgi Formu Widget */
  .inquiry-widget {
    background: #fff !important;
    border: 1px solid #eee;
  }
  
  .quick-contact-form .form-control {
    border: 1px solid #e9e9e9;
    border-radius: 5px;
    padding: 12px 15px;
    font-size: 14px;
    color: #555;
    transition: all 0.3s ease;
  }
  
  .quick-contact-form .form-control:focus {
    border-color: #ff4747;
    box-shadow: none;
  }
  
  .quick-contact-form .theme-btn {
    background: #ff4747;
    color: #fff;
    border: none;
    padding: 12px 20px;
    border-radius: 5px;
    font-weight: 600;
    transition: all 0.3s ease;
  }
  
  .quick-contact-form .theme-btn:hover {
    background: #222;
    transform: translateY(-3px);
  }
  
  /* Responsive Stiller */
  @media (max-width: 991px) {
    .breadcrumb-sub-title h1 {
      font-size: 36px;
    }
    
    .service-intro h2 {
      font-size: 28px;
    }
    
    .service-sidebar {
      margin-top: 50px;
    }
  }
  
  @media (max-width: 767px) {
    .breadcrumb-wrapper {
      padding: 70px 0;
    }
    
    .breadcrumb-sub-title h1 {
      font-size: 30px;
    }
    
    .highlight-item {
      margin-bottom: 20px;
    }
    
    .service-highlights .row > div:last-child .highlight-item {
      margin-bottom: 0;
    }
    
    .cta-box {
      text-align: center;
    }
  }
</style>
@endpush