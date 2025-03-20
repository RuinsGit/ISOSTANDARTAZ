@extends('front.layouts.master')

@section('content')
    <div class="page-direction p-lr">
        <a href="{{ route('home.' . app()->getLocale()) }}" class="prev-page">{{ $settings['home'] }}</a>
        <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M13.3333 0.166687C13.3333 0.78502 13.9442 1.70835 14.5625 2.48335C15.3575 3.48335 16.3075 4.35585 17.3967 5.02169C18.2133 5.52085 19.2033 6.00002 20 6.00002M20 6.00002C19.2033 6.00002 18.2125 6.47919 17.3967 6.97835C16.3075 7.64502 15.3575 8.51752 14.5625 9.51585C13.9442 10.2917 13.3333 11.2167 13.3333 11.8334M20 6.00002H0"
                stroke="black" stroke-opacity="0.6" stroke-width="1.5" />
        </svg>
        <a href="" class="current-page">Bəyəndiklərim</a>
    </div>
    <div class="myFavs-container p-lr">
        <h1 class="title">Bəyəndiklərim</h1>
        <div class="all-myFavs">
            @foreach ($favorites as $key => $favorite)
                @php
                    $product = \App\Models\Product::find($key);
                @endphp
                <div class="product-cart">
                    <div class="product-cart-top">
                        <a href="{{ route('product-detail.' . app()->getLocale(), ['slug' => $product->slug]) }}"
                            class="cart-img">
                            <img src="{{ asset($product->poster_image) }}" alt="">
                        </a>
                        <button class="cart-fav" type="button">
                            <svg class="noAdded-fav" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.96173 18.9106L9.42605 18.3216L8.96173 18.9106ZM12 5.50039L11.4596 6.02049C11.601 6.16738 11.7961 6.25039 12 6.25039C12.2039 6.25039 12.399 6.16738 12.5404 6.02049L12 5.50039ZM15.0383 18.9106L15.5026 19.4996L15.0383 18.9106ZM9.42605 18.3216C7.91039 17.1268 6.25307 15.96 4.93829 14.4795C3.64922 13.028 2.75 11.3343 2.75 9.13685H1.25C1.25 11.8024 2.3605 13.8358 3.81672 15.4756C5.24723 17.0864 7.07077 18.375 8.49742 19.4996L9.42605 18.3216ZM2.75 9.13685C2.75 6.98599 3.96537 5.18228 5.62436 4.42395C7.23607 3.68723 9.40166 3.88233 11.4596 6.02049L12.5404 4.98029C10.0985 2.44328 7.26409 2.02514 5.00076 3.05972C2.78471 4.07268 1.25 6.42479 1.25 9.13685H2.75ZM8.49742 19.4996C9.00965 19.9034 9.55954 20.334 10.1168 20.6597C10.6739 20.9852 11.3096 21.2498 12 21.2498V19.7498C11.6904 19.7498 11.3261 19.629 10.8736 19.3646C10.4213 19.1003 9.95208 18.7363 9.42605 18.3216L8.49742 19.4996ZM15.5026 19.4996C16.9292 18.375 18.7528 17.0864 20.1833 15.4756C21.6395 13.8358 22.75 11.8024 22.75 9.13685H21.25C21.25 11.3343 20.3508 13.028 19.0617 14.4795C17.7469 15.96 16.0896 17.1268 14.574 18.3216L15.5026 19.4996ZM22.75 9.13685C22.75 6.42479 21.2153 4.07268 18.9992 3.05972C16.7359 2.02514 13.9015 2.44328 11.4596 4.98029L12.5404 6.02049C14.5983 3.88233 16.7639 3.68723 18.3756 4.42395C20.0346 5.18228 21.25 6.98599 21.25 9.13685H22.75ZM14.574 18.3216C14.0479 18.7363 13.5787 19.1003 13.1264 19.3646C12.6739 19.629 12.3096 19.7498 12 19.7498V21.2498C12.6904 21.2498 13.3261 20.9852 13.8832 20.6597C14.4405 20.334 14.9903 19.9034 15.5026 19.4996L14.574 18.3216Z"
                                    fill="black" />
                            </svg>
                            <svg class="added-fav" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2 9.13704C2 14 6.01943 16.5914 8.96173 18.9108C10 19.7293 11 20.4999 12 20.4999C13 20.4999 14 19.7293 15.0383 18.9108C17.9806 16.5914 22 14 22 9.13704C22 4.27411 16.4998 0.825411 12 5.50058C7.50016 0.825411 2 4.27411 2 9.13704Z"
                                    fill="#B72636" />
                            </svg>
                        </button>
                        <button class="showSizeBtn" type="button">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_594_1082)">
                                    <path d="M10 4.1665V15.8332" stroke="black" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M4.16675 10H15.8334" stroke="black" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_594_1082">
                                        <rect width="20" height="20" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </button>
                        <div class="cart-sizes-container">
                            <div class="cart-sizes">
                                @php
                                    $product_color = $product->colors->first();
                                    $product_color_sizes = \App\Models\ProductColorSize::where(
                                        'product_color_id',
                                        $product_color->pivot->id,
                                    )->get();
                                @endphp
                                @foreach ($product_color_sizes as $product_color_size)
                                    <a href="{{ route('product-detail.' . app()->getLocale(), [
                                        'slug' => $product->slug,
                                        'sizeSlug' => $product_color_size->size->slug,
                                    ]) }}"
                                        class="cart-size">{{ $product_color_size->size->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="product-cart-body">
                        @if (count($product->colors) > 0)
                            <div class="cart-colors">
                                <p class="cart-color">{{ $product->colors->first()->name }} rəng</p>
                                <!-- reng dinamik gele biler -->
                                <span style="background: {{ $product->colors->first()->code }};"></span>
                                @if (count($product->colors) > 1)
                                    <p class="cart-color-count">+{{ count($product->colors) - 1 }}</p>
                                @endif

                            </div>
                        @endif
                        <div class="cart-body-main">
                            <h2>{{ $product->title }}</h2>
                            <p><span>{{ $product->price() }}</span> AZN</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="" class="more_all_pro">Daha çox</a>
    </div>
@endsection
