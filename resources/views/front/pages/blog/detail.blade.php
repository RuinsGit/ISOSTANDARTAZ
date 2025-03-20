@extends('front.layouts.master')

@section('title', $blg->title)

@section('content')
    <div class="page-direction p-lr">
        <a href="{{ route('home.' . app()->getLocale()) }}" class="prev-page">Ana səhifə</a>
        <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M13.3333 0.166687C13.3333 0.78502 13.9442 1.70835 14.5625 2.48335C15.3575 3.48335 16.3075 4.35585 17.3967 5.02169C18.2133 5.52085 19.2033 6.00002 20 6.00002M20 6.00002C19.2033 6.00002 18.2125 6.47919 17.3967 6.97835C16.3075 7.64502 15.3575 8.51752 14.5625 9.51585C13.9442 10.2917 13.3333 11.2167 13.3333 11.8334M20 6.00002H0"
                stroke="black" stroke-opacity="0.6" stroke-width="1.5" />
        </svg>
        <a href="{{ route('blog.' . app()->getLocale()) }}" class="prev-page">Xəbərlər</a>
        <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M13.3333 0.166687C13.3333 0.78502 13.9442 1.70835 14.5625 2.48335C15.3575 3.48335 16.3075 4.35585 17.3967 5.02169C18.2133 5.52085 19.2033 6.00002 20 6.00002M20 6.00002C19.2033 6.00002 18.2125 6.47919 17.3967 6.97835C16.3075 7.64502 15.3575 8.51752 14.5625 9.51585C13.9442 10.2917 13.3333 11.2167 13.3333 11.8334M20 6.00002H0"
                stroke="black" stroke-opacity="0.6" stroke-width="1.5" />
        </svg>
        <a href="{{ route('blog.' . app()->getLocale()) }}" class="current-page">{{ $blg->title }}</a>

    </div>
    <div class="news-detail-head-container p-lr">
        <div class="news-detail-head">
            <div class="head-img">
                <img src="{{ asset($blg->image) }}" alt="{{ $blg->image_alt }}" title="{{ $blg->image_title }}">
            </div>
            <h1 class="title2">{{ $blg->title }}</h1>
            <div class="head-details">
                <div class="detail-time">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12Z"
                            stroke="#050B20" stroke-opacity="0.8" stroke-width="1.5" />
                        <path d="M7 4V2.5" stroke="#050B20" stroke-opacity="0.8" stroke-width="1.5"
                            stroke-linecap="round" />
                        <path d="M17 4V2.5" stroke="#050B20" stroke-opacity="0.8" stroke-width="1.5"
                            stroke-linecap="round" />
                        <path d="M2.5 9H21.5" stroke="#050B20" stroke-opacity="0.8" stroke-width="1.5"
                            stroke-linecap="round" />
                    </svg>
                    <p>{{ $blg->date->format('F d, Y') }}</p>
                </div>
                <div class="detail-view">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                            stroke="#050B20" stroke-opacity="0.8" stroke-width="1.5" />
                        <path
                            d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                            stroke="#050B20" stroke-opacity="0.8" stroke-width="1.5" />
                    </svg>
                    <p>{{ $blg->view }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="news-detail-text p-lr">
        {!! $blg->description !!}
    </div>
    <div class="general-share p-lr">
        <span>{{ $settings['share'] }}:</span>

        <div class="share-links">
            <a href="" class="share-link tg">
                <img src="{{ asset('front/assets') }}/icons/tg_colored.svg" alt="">
            </a>
            <a href="" class="share-link wp">
                <img src="{{ asset('front/assets') }}/icons/wp_colored.svg" alt="">
            </a>
            <button class="share-link simply_link" type="button">
                <img src="{{ asset('front/assets') }}/icons/link_icon.svg" alt="">
                <span class="copied_text">{{ $settings['copied'] }}</span>
            </button>
        </div>
    </div>
    <div class="news-slide-container mt-100">
        <div class="news-slide-main p-lr">
            <div class="news-slide-title">
                <h2 class="title">{{ $settings['other_blogs'] }}</h2>
                <a href="{{ route('blog.' . app()->getLocale()) }}" class="news-slide-link">
                    {{ $settings['all_blogs'] }}
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.99989 13.9999L4.99976 5.00003L6.99976 5L6.99986 11.9999H14.5859V6.58581L21.0001 13L14.5859 19.4142V13.9999H4.99989Z"
                            fill="#B72636" />
                    </svg>
                </a>
            </div>
            <div class="news-slide swiper">
                <div class="swiper-wrapper">
                    @foreach ($otherBlogs as $blog)
                        <a href="{{ route('blog-detail.' . app()->getLocale(), ['slug' => $blog->slug]) }}"
                            class="news-cart swiper-slide">
                            <div class="cart-img">
                                <img src="{{ asset($blog->poster_image) }}" alt="{{ $blog->image_alt }}"
                                    title="{{ $blog->image_title }}">
                            </div>
                            <p class="news-cart-time">{{ $blog->date->format('d F Y') }}</p>
                            <div class="cart-body">
                                <h3>{{ $blog->title }}</h3>
                                <span class="more">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.99989 13.9999L4.99976 5.00003L6.99976 5L6.99986 11.9999H14.5859V6.58581L21.0001 13L14.5859 19.4142V13.9999H4.99989Z"
                                            fill="#B72636" />
                                    </svg>
                                    {{ $settings['see_more'] }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
