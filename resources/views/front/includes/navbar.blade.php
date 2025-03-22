 <!-- header  section start -->
 <header id="header-sticky" class="navbar-2">

@php
if (!function_exists('nav_trans')) {
    function nav_trans($key, $default = '') {
        $lang = app()->getLocale();
        $trans = \App\Models\TranslationManage::where('key', $key)
                ->where('status', 1)
                ->where('group', 'navbar')
                ->first();
                
        if ($trans) {
            $field = "value_" . $lang;
            return $trans->$field ?: $default;
        }
        
        return $default;
    }
}
@endphp

<div class="container">
  <div class="row justify-content-between align-items-center">
    <div class="col-5 col-md-3">
      <div class="navbar-2-left">
        <div class="navbar-2-logo">
          <a href="{{ url('/') }}">
            @if(isset($logo) && $logo)
              <img src="{{ asset($logo->logo_1_image) }}" alt="{{ $logo->logo_alt1 }}" title="{{ $logo->logo_title1 }}" class="logo-img" style="height: 60px; width: 100px; object-fit: cover;" />
            @else
              <img src="{{ asset('front/assets/img/logo/black-logo.svg') }}" alt="RevAuto" class="logo-img" style="height: 60px; width: 100px; object-fit: cover;" />
            @endif
          </a>
        </div>
      </div>
    </div>
    <div class="col-8 col-md-9">
      <div class="navbar-2-right">
        <!-- right -->
        <!-- general menu -->
        <div class="mean__menu-wrapper">
          <div class="main-menu">
            <nav id="mobile-menu">
              <ul>
                <li class="has-dropdown active menu-thumb">
                    <a href="{{ route('front.index') }}"> {{ isset($header) ? $header->{"home_" . app()->getLocale()} : nav_trans('home', 'Home') }} </a>
                </li>
                <li class="has-dropdown active d-xl-none">
                  <a href="team.html" class="border-none"> {{ isset($header) ? $header->{"home_" . app()->getLocale()} : nav_trans('home', 'Home') }} </a>
                  <ul class="submenu">
                    <li><a href="{{ route('front.index') }}">{{ nav_trans('home_page_01', 'Home Page 01') }}</a></li>
                    <li><a href="{{ route('front.index') }}">{{ nav_trans('home_page_02', 'Home Page 02') }}</a></li>
                    <li>
                      <a href="{{ route('front.index') }}">{{ nav_trans('car_accessories_01', 'Car Accessories 01') }}</a>
                    </li>
                    <li>
                      <a href="{{ route('front.index') }}">{{ nav_trans('car_accessories_02', 'Car Accessories 02') }}</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="{{ route('front.about') }}"> {{ isset($header) ? $header->{"about_" . app()->getLocale()} : nav_trans('about', 'About') }} </a>
                </li>
                <li>
                  <a href="{{ route('front.service') }}"> {{ isset($header) ? $header->{"services_" . app()->getLocale()} : nav_trans('services', 'Services') }} </a>
                  <ul class="submenu">
                    <li><a href="{{ route('front.service') }}"> {{ isset($header) ? $header->{"services_" . app()->getLocale()} : nav_trans('services', 'Services') }} </a></li>
                    @if(isset($allServices) && $allServices->count() > 0)
                      @foreach($allServices->take(5) as $serviceItem)
                        <li>
                          <a href="{{ route('front.service.show', $serviceItem->id) }}">{{ $serviceItem->{'title1_' . app()->getLocale()} }}</a>
                        </li>
                      @endforeach
                    @endif
                  </ul>
                </li>
                <li class="has-dropdown">
                  <a href="news.html"> {{ isset($header) ? $header->{"pages_" . app()->getLocale()} : nav_trans('pages', 'Pages') }} </a>
                  <ul class="submenu">
                    <li class="has-dropdown">
                      <a href="{{ route('front.project.index') }}"> {{ isset($header) ? $header->{"portfolio_" . app()->getLocale()} : nav_trans('portfolio', 'Portfolio') }} </a>
                      <ul class="submenu">
                        <li><a href="{{ route('front.project.index') }}"> {{ isset($header) ? $header->{"portfolio_" . app()->getLocale()} : nav_trans('portfolio', 'Projeler') }} </a></li>
                      </ul>
                    </li>

                    <li><a href="{{ route('front.contact') }}"> {{ isset($header) ? $header->{"contact_us_" . app()->getLocale()} : nav_trans('contact_us', 'Contact Us') }} </a></li>

                  </ul>
                </li>
                <li>
                  <a href="{{ route('front.products.index') }}"> {{ isset($header) ? $header->{"shop_" . app()->getLocale()} : nav_trans('shop', 'Mağaza') }} </a>
                  <ul class="submenu">
                    <li><a href="{{ route('front.products.index') }}"> {{ isset($header) ? $header->{"shop_" . app()->getLocale()} : nav_trans('shop', 'Mağaza') }} </a></li>
                    <li><a href="{{ route('front.products.cart') }}"> {{ isset($header) ? $header->{"cart_" . app()->getLocale()} : nav_trans('cart', 'Sepet') }} </a></li>
                  </ul>
                </li>
                <li>
                  <a href="{{ route('front.news.index') }}"> {{ isset($header) ? $header->{"blog" . app()->getLocale()} : nav_trans('blog', 'Haberler') }} </a>
                  <ul class="submenu">
                   
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>

        <!-- user options -->
        <div class="navbar-2-user-options">
          <div class="search-wrapper d-none d-md-block">
            <form>
              <div class="position-relative">
                <input
                  type="search"
                  class="form-control search-input"
                  placeholder="{{ nav_trans('search', 'Search...') }}"
                  aria-label="Search"
                />
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="currentColor"
                  class="bi bi-search search-icon"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
                  />
                </svg>
              </div>
            </form>
          </div>

          <div class="buttons">
            <a href="{{ route('front.products.cart') }}" class="cart-button">
              <i class="fa-sharp fa-regular fa-bag-shopping"></i>
              <span id="cart-count">{{ count(Session::get('cart', [])) }}</span>
            </a>
            <div class="header-lang">
            <a href="{{ route('lang.switch', 'az') }}" class="lang-item {{ app()->getLocale() == 'az' ? 'active' : '' }}">| AZ |</a>
            <a href="{{ route('lang.switch', 'en') }}" class="lang-item {{ app()->getLocale() == 'en' ? 'active' : '' }}">| EN |</a>
            <a href="{{ route('lang.switch', 'ru') }}" class="lang-item {{ app()->getLocale() == 'ru' ? 'active' : '' }}">RU |</a>
        </div>

            <div class="header__hamburger d-xl-none my-auto">
              <div class="sidebar__toggle">
                <i class="fas fa-bars"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</header>