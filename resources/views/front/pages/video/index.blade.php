@extends('front.layouts.master')

@section('title', $settings['videos'])

@section('content')
    <div class="page-direction p-lr">
        <a href="{{ route('home.' . app()->getLocale()) }}" class="prev-page">{{ $settings['home'] }}</a>
        <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M13.3333 0.166687C13.3333 0.78502 13.9442 1.70835 14.5625 2.48335C15.3575 3.48335 16.3075 4.35585 17.3967 5.02169C18.2133 5.52085 19.2033 6.00002 20 6.00002M20 6.00002C19.2033 6.00002 18.2125 6.47919 17.3967 6.97835C16.3075 7.64502 15.3575 8.51752 14.5625 9.51585C13.9442 10.2917 13.3333 11.2167 13.3333 11.8334M20 6.00002H0"
                stroke="black" stroke-opacity="0.6" stroke-width="1.5" />
        </svg>
        <a href="" class="current-page">{{ $settings['videos'] }}</a>
    </div>
    <div class="videos-container p-lr">
        <h1 class="title">{{ $settings['videos'] }}</h1>
        <div class="last-video">
            @if (count($videos) > 0)
                {!! $videos->last()->url !!}
            @endif
        </div>
        <div class="all-videos">
            @include('front.pages.section.video', ['videos' => $videos])
        </div>
        @if (count($next) > 0)
            <a href="#" class="moreLink">{{ $settings['more'] }}</a>
        @endif
    </div>
@endsection

@push('css')
    <style>
        .video-item p,
        .last-video p {
            height: 100%;
        }
    </style>
@endpush


@push('js')
    <script>
        let more = document.querySelector('.moreLink');
        let all_videos = document.querySelector('.all-videos');
        let page = 1;
        more?.addEventListener('click', function(e) {
            e.preventDefault();
            page++;
            let lang = document.querySelector('html').getAttribute('lang');
            let url = `/${lang}/video/more?page=${page}`;
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    if (data.status == 'success') {
                        all_videos.insertAdjacentHTML('beforeend', data.view);
                        if (!data.next) more.style.display = 'none';
                    }
                });
        })
    </script>
@endpush
