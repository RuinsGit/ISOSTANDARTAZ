@extends('front.layouts.master')

@section('title', isset($settings['projects']) ? $settings['projects'] : 'Projeler')

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
        <p class="text-center">{{ $settings['loading'] ?? 'Yükleniyor...' }}</p>
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
            <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ isset($settings['projects']) ? $settings['projects'] : 'Projeler' }}</h1>
          </div>
          <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
            <li>
              <a href="{{ route('front.index') }}"> {{ nav_trans('home', 'Ana Sayfa') }} </a>
            </li>
            <li>
              <i class="fa-regular fa-chevrons-right"></i>
            </li>
            <li>{{ isset($settings['projects']) ? $settings['projects'] : 'Projeler' }}</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Project Section Start -->
    <section class="project-section fix section-padding">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-6 col-md-8 mx-auto text-center">
            <div class="section-heading">
              <h2 class="wow fadeInUp" data-wow-delay=".3s">{{ isset($settings['our_projects']) ? $settings['our_projects'] : 'Projelerimiz' }}</h2>
              <p class="wow fadeInUp" data-wow-delay=".5s">{{ isset($settings['projects_desc']) ? $settings['projects_desc'] : 'Tamamladığımız ve devam eden en son projelerimizi keşfedin.' }}</p>
            </div>
          </div>
        </div>
        
        @if(count($projects) > 0)
            <div class="row g-5">
                @foreach($projects as $project)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="project-card wow fadeInUp" data-wow-delay=".{{ $loop->iteration }}s">
                        <div class="project-card-image">
                            <img src="{{ asset($project->image) }}" alt="{{ $project->{'image_alt_' . app()->getLocale()} ?? $project->{'name_' . app()->getLocale()} }}" />
                            <div class="project-overlay">
                                <div class="project-overlay-content">
                                    <span class="project-date">{{ $project->created_at->format('d.m.Y') }}</span>
                                    <h3>{{ $project->{'name_' . app()->getLocale()} }}</h3>
                                    <a href="{{ route('front.project.show', $project->{'slug_' . app()->getLocale()} ?? $project->id) }}" class="project-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="project-card-content">
                            <div class="project-meta">
                                <span class="project-date"><i class="far fa-calendar-alt"></i> {{ $project->created_at->format('d.m.Y') }}</span>
                            </div>
                            <h3>
                                <a href="{{ route('front.project.show', $project->{'slug_' . app()->getLocale()} ?? $project->id) }}">{{ $project->{'name_' . app()->getLocale()} }}</a>
                            </h3>
                            <p class="project-excerpt">
                                {{ \Illuminate\Support\Str::limit(strip_tags($project->{'text1_' . app()->getLocale()}), 120) }}
                            </p>
                            <a href="{{ route('front.project.show', $project->{'slug_' . app()->getLocale()} ?? $project->id) }}" class="read-more-btn">
                                {{ isset($settings['view_details']) ? $settings['view_details'] : 'Detayları Gör' }}
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            @if($projects->hasPages())
            <div class="pagination-wrapper mt-5 text-center">
                {{ $projects->links() }}
            </div>
            @endif
        @else
            <div class="row">
                <div class="col-12 text-center">
                    <div class="no-data-found">
                        <i class="fa-regular fa-folder-open fa-3x mb-3"></i>
                        <h3>{{ isset($settings['no_projects']) ? $settings['no_projects'] : 'Henüz proje bulunmamaktadır.' }}</h3>
                        <p>{{ isset($settings['check_later']) ? $settings['check_later'] : 'Lütfen daha sonra tekrar kontrol edin.' }}</p>
                    </div>
                </div>
            </div>
        @endif
      </div>
    </section>

   

   
  </body>

<!-- Mirrored from revauto.baseecom.com/main-files/project.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Mar 2025 20:21:13 GMT -->
</html>
@endsection

@push('css')
<style>
  /* Modern Project Section Styling */
  .section-heading {
    margin-bottom: 40px;
  }
  
  .section-heading h2 {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 15px;
    color: #333;
    position: relative;
    display: inline-block;
  }
  
  .section-heading h2:after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background-color: #ff4747;
  }
  
  .section-heading p {
    font-size: 16px;
    color: #777;
    max-width: 600px;
    margin: 0 auto;
  }
  
  /* Project Card Styling */
  .project-card {
    margin-bottom: 30px;
    background-color: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: all 0.4s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
  }
  
  .project-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
  }
  
  .project-card-image {
    position: relative;
    height: 280px;
    overflow: hidden;
  }
  
  .project-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
  }
  
  .project-card:hover .project-card-image img {
    transform: scale(1.1);
  }
  
  .project-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.8));
    display: flex;
    align-items: flex-end;
    padding: 20px;
    opacity: 0;
    transition: opacity 0.4s ease;
  }
  
  .project-card:hover .project-overlay {
    opacity: 1;
  }
  
  .project-overlay-content {
    width: 100%;
  }
  
  .project-overlay .project-date {
    font-size: 14px;
    color: #fff;
    background-color: #ff4747;
    padding: 5px 10px;
    border-radius: 4px;
    display: inline-block;
    margin-bottom: 10px;
  }
  
  .project-overlay h3 {
    color: #fff;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 10px;
  }
  
  .project-link {
    width: 40px;
    height: 40px;
    background-color: #fff;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #ff4747;
    transition: all 0.3s ease;
  }
  
  .project-link:hover {
    background-color: #ff4747;
    color: #fff;
  }
  
  .project-card-content {
    padding: 25px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
  }
  
  .project-meta {
    margin-bottom: 10px;
  }
  
  .project-meta span {
    font-size: 14px;
    color: #777;
    margin-right: 15px;
  }
  
  .project-meta i {
    color: #ff4747;
    margin-right: 5px;
  }
  
  .project-card-content h3 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 15px;
  }
  
  .project-card-content h3 a {
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
  }
  
  .project-card-content h3 a:hover {
    color: #ff4747;
  }
  
  .project-excerpt {
    color: #666;
    font-size: 15px;
    line-height: 1.6;
    margin-bottom: 20px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    flex-grow: 1;
  }
  
  .read-more-btn {
    display: inline-flex;
    align-items: center;
    color: #ff4747;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    margin-top: auto;
  }
  
  .read-more-btn i {
    margin-left: 8px;
    transition: transform 0.3s ease;
  }
  
  .read-more-btn:hover {
    color: #333;
  }
  
  .read-more-btn:hover i {
    transform: translateX(5px);
  }
  
  /* No Data Found Styling */
  .no-data-found {
    padding: 60px 20px;
    text-align: center;
    color: #777;
  }
  
  .no-data-found i {
    color: #ddd;
  }
  
  .no-data-found h3 {
    margin-bottom: 10px;
    color: #555;
  }
  
  .no-data-found p {
    color: #888;
  }
  
  /* Responsive Styles */
  @media (max-width: 991px) {
    .section-heading h2 {
      font-size: 32px;
    }
    
    .project-card-image {
      height: 240px;
    }
  }
  
  @media (max-width: 767px) {
    .section-heading h2 {
      font-size: 28px;
    }
    
    .section-heading p {
      font-size: 15px;
    }
    
    .project-card-content h3 {
      font-size: 18px;
    }
    
    .project-excerpt {
      font-size: 14px;
    }
  }
</style>
@endpush
