@extends('front.layouts.master')

@section('title', $comp->title)

@section('content')
    <div class="raceDetail-hero">
        <img src="{{ asset($comp->image) }}" alt="{{ $comp->image_alt }}" title="{{ $comp->image_title }}" class="hero-img">
        <div class="gradient"></div>
        <div class="raceDetail-hero-content p-lr">
            <div class="content-left">
                <div class="page-direction">
                    <a href="{{ route('home.' . app()->getLocale()) }}" class="prev-page">{{ $settings['home'] }}</a>
                    <svg width="20" height="12" viewBox="0 0 20 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.3333 0.166687C13.3333 0.78502 13.9442 1.70835 14.5625 2.48335C15.3575 3.48335 16.3075 4.35585 17.3967 5.02169C18.2133 5.52085 19.2033 6.00002 20 6.00002M20 6.00002C19.2033 6.00002 18.2125 6.47919 17.3967 6.97835C16.3075 7.64502 15.3575 8.51752 14.5625 9.51585C13.9442 10.2917 13.3333 11.2167 13.3333 11.8334M20 6.00002H0"
                            stroke="white" stroke-width="1.5" />
                    </svg>
                    <a href="{{ route('competition.' . app()->getLocale()) }}"
                        class="prev-page">{{ $settings['competitions'] }}</a>
                    <svg width="20" height="12" viewBox="0 0 20 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.3333 0.166687C13.3333 0.78502 13.9442 1.70835 14.5625 2.48335C15.3575 3.48335 16.3075 4.35585 17.3967 5.02169C18.2133 5.52085 19.2033 6.00002 20 6.00002M20 6.00002C19.2033 6.00002 18.2125 6.47919 17.3967 6.97835C16.3075 7.64502 15.3575 8.51752 14.5625 9.51585C13.9442 10.2917 13.3333 11.2167 13.3333 11.8334M20 6.00002H0"
                            stroke="white" stroke-opacity="0.6" stroke-width="1.5" />
                    </svg>
                    <a href="race-detail.html" class="current-page">{{ $comp->title }}</a>
                </div>
                <h1>{{ $comp->title }}</h1>
                <p class="run-date">{{ $comp->datetime->format('d F Y') }}</p>
                <div class="countdown" data-countdown-date="{{ $comp->datetime->format('Y-m-d\TH:i:s') }}">
                    <div class="countdown-box">
                        <p class="days"></p>
                        <span>Gün</span>
                    </div>
                    <div class="countdown-box">
                        <p class="hours"></p>
                        <span>Saat</span>
                    </div>
                    <div class="countdown-box">
                        <p class="minutes"></p>
                        <span>Dəqiqə</span>
                    </div>
                    <div class="countdown-box">
                        <p class="seconds"></p>
                        <span>Saniyə</span>
                    </div>
                </div>
            </div>
            @if ($comp->datetime?->format('YmdHis') > now()->format('YmdHis'))
                <div class="raceDetail-box">
                    <h2>Yarışın detalları</h2>
                    <div class="raceDetail-list">
                        <div class="raceDetail-list-item">
                            <div class="icon">
                                <img src="{{ asset('front/assets') }}/icons/calendar_gif.gif" alt="">
                            </div>
                            <p>{{ $comp->datetime->format('d F Y-H:i') }}</p>
                        </div>
                        <div class="raceDetail-list-item">
                            <div class="icon">
                                <img src="{{ asset('front/assets') }}/icons/location_gif.gif" alt="">
                            </div>
                            <p>{{ $comp->address }}</p>
                        </div>
                        <div class="raceDetail-list-item">
                            <div class="icon">
                                <img src="{{ asset('front/assets') }}/icons/ticket_gif.gif" alt="">
                            </div>
                            <p>{{ !is_null($comp->price) ? $comp->price . ' AZN' : 'Ödənişsiz' }}</p>
                        </div>
                    </div>
                    <a href="{{ route('buy-ticket.' . app()->getLocale(), ['slug' => $comp->slug]) }}" class="join-race">
                        Yarışa qatıl
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.50013 13.9999L5.5 5.00003L7.5 5L7.5001 11.9999H15.0861V6.58581L21.5003 13L15.0861 19.4142V13.9999H5.50013Z"
                                fill="black" />
                        </svg>
                    </a>
                </div>
            @endif

        </div>
    </div>
    <div class="mobile-raceDetail mt-100 p-lr">
        <div class="raceDetail-box">
            <h2>{{ $settings['competition_detail'] }}</h2>
            <div class="raceDetail-list">
                <div class="raceDetail-list-item">
                    <div class="icon">
                        <img src="{{ asset('front/assets') }}/icons/calendar_gif.gif" alt="">
                    </div>
                    <p>{{ $comp->datetime->format('d F Y-H:i') }}</p>
                </div>
                <div class="raceDetail-list-item">
                    <div class="icon">
                        <img src="{{ asset('front/assets') }}/icons/location_gif.gif" alt="">
                    </div>
                    <p>{{ $comp->address }}</p>
                </div>
                <div class="raceDetail-list-item">
                    <div class="icon">
                        <img src="{{ asset('front/assets') }}/icons/ticket_gif.gif" alt="">
                    </div>
                    <p>{{ !is_null($comp->price) ? $comp->price . ' AZN' : 'Ödənişsiz' }}</p>
                </div>
            </div>
            <a href="{{ route('buy-ticket.' . app()->getLocale(), ['slug' => $comp->slug]) }}" class="join-race">
                {{ $settings['join_race'] }}
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.50013 13.9999L5.5 5.00003L7.5 5L7.5001 11.9999H15.0861V6.58581L21.5003 13L15.0861 19.4142V13.9999H5.50013Z"
                        fill="black" />
                </svg>
            </a>
        </div>
    </div>
    <div class="raceDetail-text p-lr mt-100">
        {!! $comp->description !!}
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
    <div class="list-participants-container">
        <div class="list-participants p-lr">
            <h2 class="title">İştirakçılar siyahısı</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Ad və soyad</th>
                            <th>Təvəllüd</th>
                            <th>Cins</th>
                            <th>Komanda</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ticket->name }}</td>
                                <td>{{ $ticket->birthday?->format('d.m.Y') }}</td>
                                <td>{{ $ticket->gender }}</td>
                                <td>{{ $ticket->team }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="race-contact-container mt-100 p-lr">
        <div class="race-contact">
            {!! $comp->map !!}
            <div class="race-contact-box">
                <h2>{{ $settings['contact_info'] }}</h2>
                <div class="race-contact-list">
                    <a href="tel:{{ $comp->phone }}" class="contact-item">
                        <div class="icon">
                            <img src="{{ asset('front/assets') }}/icons/phone_black.svg" alt="">
                        </div>
                        {{ $comp->phone }}
                    </a>
                    <a href="#" class="contact-item">
                        <div class="icon">
                            <img src="{{ asset('front/assets') }}/icons/loc_black.svg" alt="">
                        </div>
                        {{ $comp->address }}
                    </a>
                    <a href="mailto:{{ $comp->email }}" class="contact-item">
                        <div class="icon">
                            <img src="{{ asset('front/assets') }}/icons/mail_black.svg" alt="">
                        </div>
                        {{ $comp->email }}
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="competition-held mt-100 p-lr">
        <div class="competition-held-top">
            <h2 class="title">{{ $settings['held_competition'] }}</h2>
            <a href="{{ route('competition.' . app()->getLocale()) }}" class="competition-held-link">
                {{ $settings['all_competitions'] }}
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.99989 13.9999L4.99976 5.00003L6.99976 5L6.99986 11.9999H14.5859V6.58581L21.0001 13L14.5859 19.4142V13.9999H4.99989Z"
                        fill="white" />
                </svg>

            </a>
        </div>
        <div class="competition-held-swiper swiper">
            <div class="swiper-wrapper">
                @foreach ($other_competitions as $competition)
                    <a href="{{ route('competition-detail.' . app()->getLocale(), ['slug' => $competition->slug]) }}"
                        class="competition-cart swiper-slide">
                        <div class="cart-img">
                            <img src="{{ asset($competition->poster_image) }}" alt="{{ $competition->image_alt }}"
                                title="{{ $competition->image_title }}">
                        </div>
                        <!-- Əgər yarış ödənişsiz olarsa qiymət yerinə "Ödənişsiz" yazılacaq
                                                                                                                                                        <p class="cart-price">Ödənişsiz</p> belə olacaq məsələn
                                                                                                                                                    -->
                        <p class="cart-price">
                            {{ !is_null($competition->price) ? $competition->price . ' AZN' : 'Ödənişsiz' }}</p>
                        <div class="cart-body">
                            <span class="cart-date">{{ $competition->datetime->format('d F Y') }}</span>
                            <h3>{{ $competition->title }}</h3>
                            <p>{{ Str::limit($competition->content, 150, '...') }}</p>
                            <span class="more">
                                {{ $settings['see_more'] }}
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.99989 13.9999L4.99976 5.00003L6.99976 5L6.99986 11.9999H14.5859V6.58581L21.0001 13L14.5859 19.4142V13.9999H4.99989Z"
                                        fill="#B72636" />
                                </svg>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
