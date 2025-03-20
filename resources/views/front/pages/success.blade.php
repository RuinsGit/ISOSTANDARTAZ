@extends('front.layouts.master')

@section('title', $ticket->status == 1 ? 'Uğurlu ödəniş!' : 'Uğursuz ödəniş!')

@section('content')
    <div class="payment-success">
        <div class="paymentSuccess-img">
            @if ($ticket->status == 1)
                <img src="{{ asset('front/assets/') }}/images/paymentSuccess.svg" alt="">
            @else
                <img src="{{ asset('front/assets/images/paymentCancel.svg') }}" alt="">
            @endif
        </div>
        @if ($ticket->status == 1)
            <h1>Uğurlu ödəniş!</h1>
            <p class="desc">Ödənişiniz uğurla başa çatdı</p>
        @else
            <h1>Ödəniş uğursuzdur!</h1>
            <p class="desc">Ödənişiniz uğursuzdur</p>
        @endif
        <a href="{{ route('home.' . app()->getLocale()) }}" class="back_home">
            Ana səhifəyə qayıt
            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M5.00013 14.8205L5 5.82059L7 5.82056L7.0001 12.8205H14.5861V7.40637L21.0003 13.8206L14.5861 20.2348V14.8205H5.00013Z"
                    fill="#2D3043" />
            </svg>

        </a>
        @if ($ticket->status == 1)
            <div class="ticket-item">
                <div class="ticket-item-head">
                    <h3>{{ $ticket->competition->title }}</h3>
                    <p class="ticket-status">
                        <span class="active_status">Aktiv</span>
                    </p>
                </div>
                <div class="ticket-body">
                    <div class="body-item">
                        <span>Ünvan:</span>
                        <p>{{ $ticket->competition->address }}</p>
                    </div>
                    <div class="body-item">
                        <span>Bilet nömrəsi</span>
                        <p>{{ $ticket->code }}</p>
                    </div>
                    <div class="body-item">
                        <span>Tarix:</span>
                        <p>{{ $ticket->competition->datetime->format('d/m/Y H:i') }}</p>
                    </div>
                    <div class="ticket-qr">
                        <img src="{{ asset($ticket->qr_image) }}" alt="">
                        <p>Daxil olmaq üçün skan et!</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
