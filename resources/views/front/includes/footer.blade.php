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
                <p>contact@revauto.com</p>
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
                <p>{{ $settings['number_footer'] }}</p>
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
                <p>{{ $settings['store_location'] }}</p>
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
                    <img src="{{ asset($logo->logo_1_image) }}" alt="{{ $logo->logo_alt1 }}" title="{{ $logo->logo_title1 }}" class="logo-img" style="max-height: 60px; width: auto; object-fit: contain;" />
                  @else
                    <img src="{{ asset('front/assets/img/logo/white-logo.svg') }}" alt="RevAuto" class="logo-img" style="max-height: 60px; width: auto; object-fit: contain;" />
                  @endif
                </div>
                <p class="my-3 fs-6">{{ $settings['footer_about'] }}</p>

                <div class="footer-3-social-wrapper">
                  <a href="#">
                    <i class="fa-brands fa-facebook-f"></i>
                  </a>

                  <a href="#">
                    <i class="fa-brands fa-twitter"></i>
                  </a>

                  <a href="#">
                    <i class="fa-brands fa-linkedin-in"></i>
                  </a>
                  <a href="#">
                    <i class="fa-brands fa-youtube"></i>
                  </a>
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
                    <a href="project.html"> {{ $settings['portfolio'] }} </a>
                  </li>
                  <li>
                    <a href="contact.html"> {{ $settings['contact_us'] }} </a>
                  </li>
                  <li>
                    <a href="news.html"> {{ $settings['our_blog'] }} </a>
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
                    <a href="shop.html"> {{ $settings['our_shop'] }} </a>
                  </li>
                  <li>
                    <a href="service.html"> {{ $settings['services'] }} </a>
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
                  <li>Mestaga</li>
                  <li>
                    <a href="tel:2395550108">{{ $settings['number_footer'] }}</a>
                  </li>
                  <li>
                    <a href="mailto:info@example.com">Museyibli.ruhin@gmail.com</a>
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