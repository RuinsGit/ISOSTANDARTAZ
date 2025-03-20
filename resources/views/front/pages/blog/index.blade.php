@extends('front.layouts.master')

@section('title', $settings['blogs'])

@section('content')
    <div class="page-direction p-lr">
        <a href="{{ route('home.' . app()->getLocale()) }}" class="prev-page">{{ $settings['home'] }}</a>
        <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M13.3333 0.166687C13.3333 0.78502 13.9442 1.70835 14.5625 2.48335C15.3575 3.48335 16.3075 4.35585 17.3967 5.02169C18.2133 5.52085 19.2033 6.00002 20 6.00002M20 6.00002C19.2033 6.00002 18.2125 6.47919 17.3967 6.97835C16.3075 7.64502 15.3575 8.51752 14.5625 9.51585C13.9442 10.2917 13.3333 11.2167 13.3333 11.8334M20 6.00002H0"
                stroke="black" stroke-opacity="0.6" stroke-width="1.5" />
        </svg>
        <a href="{{ route('blog.' . app()->getLocale()) }}" class="current-page">{{ $settings['blogs'] }}</a>

    </div>
    <div class="lasted-news p-lr">
        <h1 class="title2">{{ $settings['latest_blogs'] }}</h1>
        <div class="lasted-news-carts">
            @if (count($latest_blogs) > 0)
                <a href="{{ route('blog-detail.' . app()->getLocale(), ['slug' => $latest_blogs->first()->slug]) }}"
                    class="large-cart">
                    <div class="cart-img">
                        <img src="{{ $latest_blogs->first()->poster_image }}" alt="{{ $latest_blogs->first()->image_alt }}"
                            title="{{ $latest_blogs->first()->image_title }}">
                    </div>
                    <div class="cart-body">
                        <h2>{{ $latest_blogs->first()->title }}</h2>
                        <p>{{ Str::limit(strip_tags($latest_blogs->first()->description), 100, '...') }}</p>
                        <div class="cart-body-bottom">
                            <span class="cart-time">{{ $latest_blogs->first()->date->format('F d Y') }}</span>
                            <span class="cart-more">
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.99989 14.4999L4.99976 5.50003L6.99976 5.5L6.99986 12.4999H14.5859V7.08581L21.0001 13.5L14.5859 19.9142V14.4999H4.99989Z"
                                        fill="#B72636" />
                                </svg>
                                {{ $settings['see_more'] }}
                            </span>
                        </div>
                    </div>
                </a>
            @endif
            <div class="large-small-carts">
                @for ($i = 1; $i < count($latest_blogs); $i++)
                    <a href="{{ route('blog-detail.' . app()->getLocale(), ['slug' => $latest_blogs[$i]->slug]) }}"
                        class="large-small-cart">
                        <div class="cart-img">
                            <img src="{{ asset($latest_blogs[$i]->poster_image) }}"
                                alt="{{ $latest_blogs[$i]->image_alt }}" title="{{ $latest_blogs[$i]->image_title }}">
                        </div>
                        <div class="cart-body">
                            <h2>{{ $latest_blogs[$i]->title }}</h2>
                            <div class="cart-body-bottom">
                                <span class="cart-time">{{ $latest_blogs[$i]->date->format('F d Y') }}</span>
                                <span class="cart-more">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.99989 14.4999L4.99976 5.50003L6.99976 5.5L6.99986 12.4999H14.5859V7.08581L21.0001 13.5L14.5859 19.9142V14.4999H4.99989Z"
                                            fill="#B72636" />
                                    </svg>
                                    {{ $settings['see_more'] }}
                                </span>
                            </div>
                        </div>
                    </a>
                @endfor
            </div>
        </div>
    </div>
    <div class="all-news-container p-lr mt-100">
        <h2 class="title2">{{ $settings['other_blogs'] }}</h2>
        <div class="all-news">
            @include('front.pages.section.blog', ['blogs' => $blogs])
        </div>
        @if (count($all_blogs) > 8)
            <a href="" class="moreLink">{{ $settings['more'] }}</a>
        @endif
    </div>
@endsection

@push('js')
    <script>
        let lang = document.querySelector('html').getAttribute('lang');
        let more = document.querySelector('.moreLink');
        let page = 1;
        more.addEventListener('click', function(e) {
            e.preventDefault();
            page++;
            let url = `/${lang}/blog/more?page=${page}`;
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    if (data.status == 'success') {
                        document.querySelector('.all-news').insertAdjacentHTML('beforeend', data.view);
                        if (data.next == 0) more.style.display = 'none';
                    }
                });
        });
    </script>
@endpush
