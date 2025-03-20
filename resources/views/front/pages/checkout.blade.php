@extends('front.layouts.master')

@section('title', 'Sifariş et')

@section('content')
    <div class="page-direction p-lr">
        <a href="{{ route('home.' . app()->getLocale()) }}" class="prev-page">Ana səhifə</a>
        <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M13.3333 0.166687C13.3333 0.78502 13.9442 1.70835 14.5625 2.48335C15.3575 3.48335 16.3075 4.35585 17.3967 5.02169C18.2133 5.52085 19.2033 6.00002 20 6.00002M20 6.00002C19.2033 6.00002 18.2125 6.47919 17.3967 6.97835C16.3075 7.64502 15.3575 8.51752 14.5625 9.51585C13.9442 10.2917 13.3333 11.2167 13.3333 11.8334M20 6.00002H0"
                stroke="black" stroke-opacity="0.6" stroke-width="1.5" />
        </svg>
        <a href="{{ route('checkout.' . app()->getLocale()) }}" class="current-page">Sifariş et</a>
    </div>
    <div class="checkout-container p-lr">
        <h1>Sifariş et</h1>
        <div class="checkout">
            <form id="make-order" action="{{ route('make-order') }}" method="POST">
                @csrf
                <div class="form-box">
                    <h2>Şəxsi məlumatlarım</h2>
                    <div class="personal-info">
                        <input type="text" placeholder="Adı Soyadı" name="name"
                            value="{{ auth()->guard('web')->check() ? auth()->guard('web')->user()->name : '' }}">
                        <div class="form-line">
                            <input type="email" placeholder="numune@gmail.com" name="email"
                                value="{{ auth()->guard('web')->check() ? auth()->guard('web')->user()->email : '' }}">
                            <input type="text" placeholder="+994 00 000 00 00" name="phone"
                                value="{{ auth()->guard('web')->check() ? auth()->guard('web')->user()->phone : '' }}">
                        </div>
                    </div>
                </div>
                <div class="form-box">
                    <h2>Çatdırılma növü</h2>
                    <div class="form-delivery">
                        <div class="delivery-type">
                            <div class="icon">
                                <img src="{{ asset('front/assets') }}/icons/scooter.svg" alt="">
                            </div>
                            <p>Ünvana çatdırılma</p>
                        </div>
                        <select name="" id="">
                            <option value="">Yasamal rayonu</option>
                            <option value="">Nizami rayonu</option>
                            <option value="">Pirallahı rayonu</option>
                            <option value="">Nəsimi rayonu</option>
                            <option value="">Sabunçu rayonu</option>
                            <option value="">Qaradağ rayonu</option>
                            <option value="">Binəqədi rayonu</option>
                            <option value="">Nəsimi rayonu</option>
                            <option value="">Sabunçu rayonu</option>
                            <option value="">Qaradağ rayonu</option>
                            <option value="">Binəqədi rayonu</option>
                        </select>
                        <input type="text" placeholder="Ünvan" name="address">
                    </div>
                </div>
                <div class="form-box">
                    <h2>Ödəniş növü</h2>
                    <div class="method-types">
                        <div class="method_type">
                            <div class="check_area">
                                <span class="check_mark">
                                    <i class="bi bi-check"></i>
                                </span>
                                <input type="radio" name="payment_type" value="1">
                            </div>
                            <label for="">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9 19C6.19108 19 4.78661 19 3.77772 18.3259C3.34096 18.034 2.96596 17.659 2.67412 17.2223C2 16.2134 2 14.8089 2 12C2 9.19108 2 7.78661 2.67412 6.77772C2.96596 6.34096 3.34096 5.96596 3.77772 5.67412C4.78661 5 6.19108 5 9 5L15 5C17.8089 5 19.2134 5 20.2223 5.67412C20.659 5.96596 21.034 6.34096 21.3259 6.77772C22 7.78661 22 9.19108 22 12C22 14.8089 22 16.2134 21.3259 17.2223C21.034 17.659 20.659 18.034 20.2223 18.3259C19.2134 19 17.8089 19 15 19H9Z"
                                        stroke="black" stroke-opacity="0.8" stroke-width="1.5" />
                                    <path
                                        d="M12 9C13.6569 9 15 10.3431 15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9Z"
                                        stroke="black" stroke-opacity="0.8" stroke-width="1.5" />
                                    <path d="M5.5 15L5.5 9" stroke="black" stroke-opacity="0.8" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path d="M18.5 15L18.5 9" stroke="black" stroke-opacity="0.8" stroke-width="1.5"
                                        stroke-linecap="round" />
                                </svg>
                                Nağd ödəniş
                            </label>
                        </div>
                        <div class="method_type">
                            <div class="check_area">
                                <span class="check_mark">
                                    <i class="bi bi-check"></i>
                                </span>
                                <input type="radio" name="payment_type" value="2">
                            </div>
                            <label for="">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z"
                                        stroke="black" stroke-opacity="0.8" stroke-width="1.5" />
                                    <path d="M10 16H6" stroke="black" stroke-opacity="0.8" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path d="M14 16H12.5" stroke="black" stroke-opacity="0.8" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path d="M2 10L22 10" stroke="black" stroke-opacity="0.8" stroke-width="1.5"
                                        stroke-linecap="round" />
                                </svg>
                                Onlayn debit kartla ödəniş
                            </label>
                        </div>
                    </div>
                </div>
            </form>
            <div class="checkout-box">
                <h2>Ümumi sifariş</h2>
                <div class="price">
                    <h3>Məbləğ:</h3>
                    <p>
                        <span>{{ collect($baskets)->sum(function ($q) {
                            return $q['product_price'] * $q['count'];
                        }) }}</span>
                        AZN
                    </p>
                </div>
                <div class="delivery">
                    <h3>Çatdırılma:</h3>
                    <p>
                        <span>5</span>
                        AZN
                    </p>
                </div>
                <div class="total-price">
                    <h3>Cəmi məbləğ:</h3>
                    <p>
                        <span>{{ collect($baskets)->sum(function ($q) {
                            return $q['product_price'] * $q['count'];
                        }) + 5 }}</span>
                        AZN
                    </p>
                </div>
                <button form="make-order" class="makePayment" type="submit">Ödəniş et</button>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>
@endpush
