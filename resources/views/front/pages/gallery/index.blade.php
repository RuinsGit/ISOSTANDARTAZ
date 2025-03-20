@extends('front.layouts.master')

@section('title', $settings['gallery'])

@section('content')
    <div class="page-direction p-lr">
        <a href="{{ route('home.' . app()->getLocale()) }}" class="prev-page">{{ $settings['home'] }}</a>
        <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M13.3333 0.166687C13.3333 0.78502 13.9442 1.70835 14.5625 2.48335C15.3575 3.48335 16.3075 4.35585 17.3967 5.02169C18.2133 5.52085 19.2033 6.00002 20 6.00002M20 6.00002C19.2033 6.00002 18.2125 6.47919 17.3967 6.97835C16.3075 7.64502 15.3575 8.51752 14.5625 9.51585C13.9442 10.2917 13.3333 11.2167 13.3333 11.8334M20 6.00002H0"
                stroke="black" stroke-opacity="0.6" stroke-width="1.5" />
        </svg>
        <a href="{{ route('gallery.' . app()->getLocale()) }}" class="current-page">{{ $settings['gallery'] }}</a>
    </div>
    <div class="gallery-container p-lr">
        <h1 class="title">{{ $settings['gallery'] }}</h1>
        <div class="gallery-slide swiper">
            <div class="swiper-wrapper">
                @foreach ($gallery_titles as $gallery_title)
                    <div class="gallery-slide-item swiper-slide">
                        <img src="{{ $gallery_title->image }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
        <div class="images_from_races_container mt-100">
            <h2 class="title2">Yarışlardan görüntülər</h2>
            <div class="images_from_races">
                @include('front.pages.section.gallery', ['galleries' => $galleries])
            </div>
            @if (count($all_galleries) > 12)
                <a href="" class="moreLink">{{ $settings['see_more'] }}</a>
            @endif
        </div>
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
            let url = `/${lang}/gallery/more?page=${page}`;
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    if (data.status == 'success') {
                        document.querySelector('.images_from_races').insertAdjacentHTML('beforeend', data.view);
                        if (data.next == 0) more.style.display = 'none';
                    }
                });
        });
    </script>
@endpush
