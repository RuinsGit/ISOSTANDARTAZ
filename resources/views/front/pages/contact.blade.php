@extends('front.layouts.master')

@section('title', $settings['contact'])

@section('content')
    <div class="page-direction p-lr">
        <a href="{{ route('home.' . app()->getLocale()) }}" class="prev-page">{{ $settings['home'] }}</a>
        <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M13.3333 0.166687C13.3333 0.78502 13.9442 1.70835 14.5625 2.48335C15.3575 3.48335 16.3075 4.35585 17.3967 5.02169C18.2133 5.52085 19.2033 6.00002 20 6.00002M20 6.00002C19.2033 6.00002 18.2125 6.47919 17.3967 6.97835C16.3075 7.64502 15.3575 8.51752 14.5625 9.51585C13.9442 10.2917 13.3333 11.2167 13.3333 11.8334M20 6.00002H0"
                stroke="black" stroke-opacity="0.6" stroke-width="1.5" />
        </svg>
        <a href="{{ route('contact.' . app()->getLocale()) }}" class="current-page">{{ $settings['contact'] }}</a>

    </div>
    <div class="contact-container p-lr">
        <div class="contact">
            <div class="contact-info-box">
                <h1>{{ $settings['contact_info'] }}</h1>
                <div class="contact-info-list">
                    <a href="tel:{{ $contact?->phone }}" class="contact-info-item">
                        <div class="icon">
                            <img src="{{ asset('front/assets') }}/icons/phone_white.svg" alt="">
                        </div>
                        <p>{{ $contact?->phone }}</p>
                    </a>
                    <a href="#" class="contact-info-item">
                        <div class="icon">
                            <img src="{{ asset('front/assets') }}/icons/loc_white.svg" alt="">
                        </div>
                        <p>{{ $contact?->address }}</p>
                    </a>
                    <a href="mailto:{{ $contact?->email }}" class="contact-info-item">
                        <div class="icon">
                            <img src="{{ asset('front/assets') }}/icons/mail_wite.svg" alt="">
                        </div>
                        <p>{{ $contact?->email }}</p>
                    </a>
                </div>
                <div class="contact-socials">
                    <a href="{{ $contact?->facebook }}" class="contact-social-item">
                        <img src="{{ asset('front/assets') }}/icons/fb-white.svg" alt="">
                    </a>
                    <a href="{{ $contact?->instagram }}" class="contact-social-item">
                        <img src="{{ asset('front/assets') }}/icons/insta-white.svg" alt="">
                    </a>
                    <a href="https://wa.me/{{ $contact?->wp_phone }}" class="contact-social-item">
                        <img src="{{ asset('front/assets') }}/icons/whatsapp-white.svg" alt="">
                    </a>
                </div>
            </div>
            <form action="{{ route('send-message') }}" method="POST" class="contact-form">
                @csrf
                <h2>{{ $settings['have_you_question'] }}</h2>
                <p>{{ $settings['contact_text'] }}</p>
                <div class="form-main">
                    <div class="form-line">
                        <input type="text" name="firstname" placeholder="{{ $settings['firstname'] }}" required>
                        <input type="text" name="lastname" placeholder="{{ $settings['lastname'] }}" required>
                    </div>
                    <div class="form-line">
                        <input type="text" name="phone" placeholder="+994 00 000 00 00" required>
                        <input type="email" name="email" placeholder="{{ $settings['email'] }}" required>
                    </div>
                    <textarea name="message" id="" placeholder="{{ $settings['your_note'] }}" required></textarea>
                </div>
                <button class="send_contact_form" type="submit">
                    {{ $settings['send'] }}
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.00013 13.9999L5 5.00003L7 5L7.0001 11.9999H14.5861V6.58581L21.0003 13L14.5861 19.4142V13.9999H5.00013Z"
                            fill="white" />
                    </svg>

                </button>
            </form>
        </div>
        <div class="contact-map">
            {!! $contact?->map !!}
        </div>
    </div>
@endsection
