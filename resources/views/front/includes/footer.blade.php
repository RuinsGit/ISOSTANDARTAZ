<!-- Footer section started -->
<footer class="footer-3">
      <!-- contact info -->
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <div class="footer-3-contact">
              <div class="icon">
                <i class="fa-solid fa-envelope"></i>
              </div>
              <div class="content">
                <span>{{ $settings['contact_us'] }}</span>
                <p>{{ isset($contactInfo) ? $contactInfo->mail : 'contact@revauto.com' }}</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="footer-3-contact">
              <div class="icon">
                <i class="fa-solid fa-phone"></i>
              </div>
              <div class="content">
                <span>{{ $settings['call_us'] }}</span>
                <p>{{ isset($contactInfo) ? $contactInfo->number : $settings['number_footer'] }}</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="footer-3-contact">
              <div class="icon">
                <i class="fa-solid fa-comments"></i>
              </div>
              <div class="content">
                <span>{{ $settings['our_projects'] }}</span>
                <p>{{ $settings['working_hours'] }}</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="footer-3-contact">
              <div class="icon">
                <i class="fa-solid fa-location-crosshairs"></i>
              </div>
              <div class="content">
                <span>{{ $settings['location'] }}</span>
                <p>{{ isset($contactInfo) ? $contactInfo->{'address_' . app()->getLocale()} : $settings['store_location'] }}</p>
              </div>
            </div>
          </div>
        </div>

        <hr />
      </div>

      <div class="container">
        <div class="footer-widgets-wrapper">
          <div class="row">
            <div
              class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp"
              data-wow-delay=".2s"
            >
              <div class="single-footer-widget">
                <div class="footer-3-logo">
                  @if(isset($logo) && $logo)
                    <img src="{{ asset($logo->logo_2_image) }}" alt="{{ $logo->logo_alt2 }}" title="{{ $logo->logo_title2 }}" class="logo-img" style="max-height: 60px; width: auto; object-fit: contain;" />
                  @else
                    <img src="{{ asset('front/assets/img/logo/white-logo.svg') }}" alt="RevAuto" class="logo-img" style="max-height: 60px; width: auto; object-fit: contain;" />
                  @endif
                </div>
                <p class="my-3 fs-6">{{ $settings['footer_about'] }}</p>

                <style>
                  .footer-3-social-wrapper {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 12px;
                    margin-top: 15px;
                  }
                  .social-icon {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 36px;
                    height: 36px;
                    border-radius: 50%;
                    background-color: rgba(255,255,255,0.1);
                    transition: all 0.3s ease;
                  }
                  .social-icon:hover {
                    background-color: #f5a623;
                    transform: translateY(-3px);
                  }
                  .social-icon img {
                    transition: all 0.3s ease;
                  }
                  .social-icon:hover img {
                    filter: brightness(1.2);
                  }
                  .social-icon i {
                    color: #fff;
                    font-size: 16px;
                  }
                </style>

                <div class="footer-3-social-wrapper">
                  @if(isset($socialfooters) && $socialfooters->count() > 0)
                    @foreach($socialfooters->where('status', 1) as $social)
                      <a href="{{ $social->link }}" target="_blank" class="social-icon">
                        <img src="{{ asset($social->image) }}" alt="Social Icon" style="width: 20px; height: 20px; object-fit: contain;">
                      </a>
                    @endforeach
                  @endif
                  
                  @if(isset($socialshares) && $socialshares->count() > 0)
                    @foreach($socialshares as $share)
                      <a href="{{ $share->link }}" target="_blank" class="social-icon" title="{{ $share->name }}">
                        <img src="{{ asset($share->image) }}" alt="{{ $share->name }}" style="width: 20px; height: 20px; object-fit: contain;">
                      </a>
                    @endforeach
                  @endif
                  
                  @if((!isset($socialfooters) || $socialfooters->count() == 0) && (!isset($socialshares) || $socialshares->count() == 0))
                    <a href="#" class="social-icon">
                      <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                      <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                      <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="social-icon">
                      <i class="fa-brands fa-youtube"></i>
                    </a>
                  @endif
                </div>
              </div>
            </div>
            <div
              class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp"
              data-wow-delay=".4s"
            >
              <div class="single-footer-widget">
                <div class="widget-head">
                  <h3>{{ $settings['pages'] }}</h3>
                </div>
                <ul class="list-items">

                  <li>
                    <a href="{{ route('front.project.index') }}"> {{ $settings['portfolio'] }} </a>
                  </li>
                  <li>
                    <a href="{{ route('front.contact') }}"> {{ $settings['contact_us'] }} </a>
                  </li>
                  <li>
                    <a href="{{ route('front.news.index') }}"> {{ $settings['our_blog'] }} </a>
                  </li>
                </ul>
              </div>
            </div>
            <div
              class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp"
              data-wow-delay=".6s"
            >
              <div class="single-footer-widget">
                <div class="widget-head">
                  <h3>{{ $settings['services'] }}</h3>
                </div>
                <ul class="list-items">
                  <li>
                    <a href="{{ route('front.products.index') }}"> {{ $settings['our_shop'] }} </a>
                  </li>
                  <li>
                    <a href="{{ route('front.service') }}"> {{ $settings['services'] }} </a>
                  </li>

                </ul>
              </div>
            </div>
            <div
              class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp"
              data-wow-delay=".8s"
            >
              <div class="single-footer-widget">
                <div class="widget-head">
                  <h3>{{ $settings['contact_we'] }}</h3>
                </div>
                <ul class="contact-list">
                  <li>{{ isset($contactInfo) ? $contactInfo->{'address_' . app()->getLocale()} : 'Mestaga' }}</li>
                  <li>
                    <a href="tel:{{ isset($contactInfo) ? $contactInfo->number : '2395550108' }}">{{ isset($contactInfo) ? $contactInfo->number : $settings['number_footer'] }}</a>
                  </li>
                  <li>
                    <a href="mailto:{{ isset($contactInfo) ? $contactInfo->mail : 'info@example.com' }}">{{ isset($contactInfo) ? $contactInfo->mail : 'Museyibli.ruhin@gmail.com' }}</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom-wrapper">
          <p class="wow fadeInUp" data-wow-delay=".5s">
            © 2024 RuinsJinx. {{ $settings['all_rights_reserved'] }}
          </p>



        </div>
      </div>
    </footer>