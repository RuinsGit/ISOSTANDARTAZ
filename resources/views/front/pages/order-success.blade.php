@extends('front.layouts.master')

@section('title', 'Uğurlu ödəniş!')

@section('content')
    <div class="payment-success">
        <div class="paymentSuccess-img">
            @if (request('STATUS') == 'FullyPaid')
                <img src="{{ asset('front/assets/') }}/images/paymentSuccess.svg" alt="">
            @else
                <img src="{{ asset('front/assets/images/paymentCancel.svg') }}" alt="">
            @endif
        </div>
        @if (request('STATUS') == 'FullyPaid')
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
        @if (request('STATUS') == 'FullyPaid')
            <div class="ticket-item">
                <div class="ticket-body">
                    <div class="body-item">
                        <span>Sifariş ID</span>
                        <p>{{ $order->order_id }}</p>
                    </div>
                    <div class="body-item">
                        <span>Tarix:</span>
                        <p>{{ $order->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
