@extends('front.layouts.master')

@section('title', $settings['competitions'])

@section('content')
    <div class="page-direction p-lr">
        <a href="{{ route('home.' . app()->getLocale()) }}" class="prev-page">{{ $settings['home'] }}</a>
        <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M13.3333 0.166687C13.3333 0.78502 13.9442 1.70835 14.5625 2.48335C15.3575 3.48335 16.3075 4.35585 17.3967 5.02169C18.2133 5.52085 19.2033 6.00002 20 6.00002M20 6.00002C19.2033 6.00002 18.2125 6.47919 17.3967 6.97835C16.3075 7.64502 15.3575 8.51752 14.5625 9.51585C13.9442 10.2917 13.3333 11.2167 13.3333 11.8334M20 6.00002H0"
                stroke="black" stroke-opacity="0.6" stroke-width="1.5" />
        </svg>
        <a href="{{ route('competition.' . app()->getLocale()) }}" class="current-page">{{ $settings['competitions'] }}</a>

    </div>
    <div class="racing-banner-container p-lr">
        <div class="racing-banner">
            <h1 class="title">{{ $settings['join_paid_race'] }}</h1>
            <div class="banner-img">
                <img src="{{ asset('front/assets') }}/images/racing-banner.png" alt="">
            </div>
        </div>
    </div>
    <div class="racing-cart-tabs p-lr">
        <button class="racing-cart-tab" type="button" id="held_racing">{{ $settings['held_competition'] }}</button>
        <button class="racing-cart-tab" type="button"
            id="finished_racing">{{ $settings['finished_competitions'] }}</button>
    </div>
    <div class="allracing-container p-lr">
        <div class="allracing-top">
            <h2 class="title2" data-id="held_racing">{{ $settings['held_competition'] }}</h2>
            <h2 class="title2" data-id="finished_racing">{{ $settings['finished_competitions'] }}</h2>
            <div class="allracing-dates">
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1.6665 10.5C1.6665 7.35734 1.6665 5.786 2.64281 4.80968C3.61913 3.83337 5.19047 3.83337 8.33317 3.83337H11.6665C14.8092 3.83337 16.3805 3.83337 17.3569 4.80968C18.3332 5.786 18.3332 7.35734 18.3332 10.5V12.1667C18.3332 15.3094 18.3332 16.8808 17.3569 17.8571C16.3805 18.8334 14.8092 18.8334 11.6665 18.8334H8.33317C5.19047 18.8334 3.61913 18.8334 2.64281 17.8571C1.6665 16.8808 1.6665 15.3094 1.6665 12.1667V10.5Z"
                        stroke="#2D3043" stroke-width="1.5" />
                    <path d="M5.8335 3.83337V2.58337" stroke="#2D3043" stroke-width="1.5" stroke-linecap="round" />
                    <path d="M14.1665 3.83337V2.58337" stroke="#2D3043" stroke-width="1.5" stroke-linecap="round" />
                    <path d="M2.0835 8H17.9168" stroke="#2D3043" stroke-width="1.5" stroke-linecap="round" />
                    <path
                        d="M15.0002 14.6667C15.0002 15.1269 14.6271 15.5 14.1668 15.5C13.7066 15.5 13.3335 15.1269 13.3335 14.6667C13.3335 14.2064 13.7066 13.8333 14.1668 13.8333C14.6271 13.8333 15.0002 14.2064 15.0002 14.6667Z"
                        fill="#2D3043" />
                    <path
                        d="M15.0002 11.3333C15.0002 11.7936 14.6271 12.1667 14.1668 12.1667C13.7066 12.1667 13.3335 11.7936 13.3335 11.3333C13.3335 10.8731 13.7066 10.5 14.1668 10.5C14.6271 10.5 15.0002 10.8731 15.0002 11.3333Z"
                        fill="#2D3043" />
                    <path
                        d="M10.8332 14.6667C10.8332 15.1269 10.4601 15.5 9.99984 15.5C9.5396 15.5 9.1665 15.1269 9.1665 14.6667C9.1665 14.2064 9.5396 13.8333 9.99984 13.8333C10.4601 13.8333 10.8332 14.2064 10.8332 14.6667Z"
                        fill="#2D3043" />
                    <path
                        d="M10.8332 11.3333C10.8332 11.7936 10.4601 12.1667 9.99984 12.1667C9.5396 12.1667 9.1665 11.7936 9.1665 11.3333C9.1665 10.8731 9.5396 10.5 9.99984 10.5C10.4601 10.5 10.8332 10.8731 10.8332 11.3333Z"
                        fill="#2D3043" />
                    <path
                        d="M6.66667 14.6667C6.66667 15.1269 6.29357 15.5 5.83333 15.5C5.3731 15.5 5 15.1269 5 14.6667C5 14.2064 5.3731 13.8333 5.83333 13.8333C6.29357 13.8333 6.66667 14.2064 6.66667 14.6667Z"
                        fill="#2D3043" />
                    <path
                        d="M6.66667 11.3333C6.66667 11.7936 6.29357 12.1667 5.83333 12.1667C5.3731 12.1667 5 11.7936 5 11.3333C5 10.8731 5.3731 10.5 5.83333 10.5C6.29357 10.5 6.66667 10.8731 6.66667 11.3333Z"
                        fill="#2D3043" />
                </svg>
                <p>{{ $settings['select_competition_date'] }}</p>
                <input type="date" name="date">
            </div>
        </div>
        <div class="all-racing-carts">
            @include('front.pages.section.competition', ['competitions' => $competitions])
        </div>
        @if (count($all_competitions) > 18)
            <a href="" class="moreLink">{{ $settings['more'] }}</a>
        @endif
    </div>
@endsection

@push('js')
    <script>
        let lang = document.querySelector('html').getAttribute('lang');
        let more = document.querySelector('.moreLink');
        let date = document.querySelector('[name="date"]');
        let page = 1;
        date.addEventListener('change', function() {
            let date_value = this.value;
            let url = `/${lang}/competition/more?page=${page}&date=${date_value}`;
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    if (data.status == 'success') {
                        console.log(document.querySelector('.all-racing-carts'));
                        document.querySelector('.all-racing-carts').innerHTML = data.view;
                    }
                });
        })
        more?.addEventListener('click', function(e) {
            e.preventDefault();
            let date_value = date.value;
            page++;
            let url = `/${lang}/competition/more?page=${page}&date=${date_value}`;
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    if (data.status == 'success') {
                        document.querySelector('.all-racing-carts').insertAdjacentHTML('beforeend', data.view);
                        if (data.next == 0) more.style.display = 'none';
                    }
                });
        });
    </script>
@endpush
