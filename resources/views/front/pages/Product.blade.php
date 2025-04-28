@extends('front.layouts.master')

@section('title', isset($settings['products']) ? $settings['products'] : 'Ürünler')

@section('content')<div id="preloader" class="preloader">
      <div class="animation-preloader">
        <div class="spinner"></div>
        <div class="txt-loading">
          <span data-text-preloader="I" class="letters-loading"> I</span>
          <span data-text-preloader="S" class="letters-loading"> S </span>
          <span data-text-preloader="O" class="letters-loading"> O </span>
          <span data-text-preloader="S" class="letters-loading"> S </span>
          <span data-text-preloader="T" class="letters-loading"> T </span>
          <span data-text-preloader="A" class="letters-loading"> A </span>
          <span data-text-preloader="D" class="letters-loading"> D</span>
          
          <span data-text-preloader="A" class="letters-loading"> A </span>
          <span data-text-preloader="R" class="letters-loading"> R </span>
          <span data-text-preloader="T" class="letters-loading"> T </span>
          <span data-text-preloader="." class="letters-loading"> . </span>
          <span data-text-preloader="A" class="letters-loading"> A </span>
          <span data-text-preloader="Z" class="letters-loading"> Z </span>
         
        </div>
        <p class="text-center">{{ $settings['loading'] }}</p>
      </div>
      <div class="loader">
        <div class="row">
          <div class="col-3 loader-section section-left">
            <div class="bg"></div>
          </div>
          <div class="col-3 loader-section section-left">
            <div class="bg"></div>
          </div>
          <div class="col-3 loader-section section-right">
            <div class="bg"></div>
          </div>
          <div class="col-3 loader-section section-right">
            <div class="bg"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapper section-bg bg-cover"
         style="background-image: url('{{ $blogHero && $blogHero->image_path ? asset($blogHero->image_path) : asset('front/assets/img/breadcrumb-bg.jpg') }}')">
      <div class="container">
        <div class="page-heading">
          <div class="breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ isset($settings['products']) ? $settings['products'] : 'Ürünler' }}</h1>
          </div>
          <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
            <li>
                        <a href="{{ route('front.index') }}"> {{ nav_trans('home', 'Ana Sayfa') }} </a>
            </li>
            <li>
              <i class="fa-regular fa-chevrons-right"></i>
            </li>
                    <li>{{ isset($settings['products']) ? $settings['products'] : 'Ürünler' }}</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Product Section Start -->
    <section class="products-section fix section-padding">
      <div class="container">
            <div class="woocommerce-notices-wrapper wow fadeInUp" data-wow-delay=".3s">
                {{ $products->firstItem() }}-{{ $products->lastItem() }} / {{ $products->total() }} {{ isset($settings['result']) ? $settings['result'] : 'Ürünler' }}</p>
                <div class="form-clt">
                    <div class="nice-select" tabindex="0">
                        <span class="current"> {{ isset($settings['default_sorting']) ? $settings['default_sorting'] : 'Ürünler' }} </span>
                        <ul class="list">
                            <li data-value="1" class="option selected focus">
                            {{ isset($settings['default_general']) ? $settings['default_general'] : 'Ürünler' }}
                            </li>
                            <li data-value="1" class="option">{{ isset($settings['default_sorting1']) ? $settings['default_sorting1'] : 'Ürünler' }}</li>
                            <li data-value="1" class="option">{{ isset($settings['default_sorting2']) ? $settings['default_sorting2'] : 'Ürünler' }}</li>
                            <li data-value="1" class="option">{{ isset($settings['default_sorting3']) ? $settings['default_sorting3'] : 'Ürünler' }}</li>
                        </ul>
                    </div>
                    <div class="icon">
                        <a href="#"><i class="fas fa-list"></i></a>
                    </div>
                    <div class="icon-2 active">
                        <a href="#"><i class="fa-sharp fa-regular fa-grid-2"></i></a>
                  </div>
                </div>
                    </div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="shop-box-items">
                        <div class="shop-image">
                            <img src="{{ asset($product->main_image ?? 'front/assets/img/shop/01.jpg') }}" alt="{{ $product->name ?? 'Product Image' }}" />
                            @if($product->discount_price)
                            <div class="post-sale">{{ nav_trans('sale', 'İndirim') }}</div>
                            <div class="post-dis">-{{ round((($product->price - $product->discount_price) / $product->price) * 100) }}%</div>
                            @endif
                    </div>
                        <div class="shop-content">
                            <div class="car-titile">
                                <h4><a href="{{ route('front.products.show', $product->slug) }}">{{ $product->name }}</a></h4>
                                <p>{{ optional($product->categories)->first() ? optional($product->categories->first())->name : '' }}</p>
                  </div>
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                </div>
                            <ul class="price-list">
                                <li>{{ number_format($product->discount_price ?? $product->price, 2) }} ₺</li>
                                @if($product->discount_price)
                                <li><s>{{ number_format($product->price, 2) }} ₺</s> <span class="discount-badge-sm">-%{{ round((($product->price - $product->discount_price) / $product->price) * 100) }}</span></li>
                                @endif
                  </ul>
                            <a href="javascript:void(0)" class="theme-btn add-to-cart {{ ($product->stocks && $product->stocks->sum('quantity') > 0) ? '' : 'disabled' }}" data-id="{{ $product->id }}">
                                <i class="fa-sharp fa-regular fa-cart-shopping"></i> {{ isset($settings['add_to_cart']) ? $settings['add_to_cart'] : 'Sepete Ekle' }}
                    </a>
                  </div>
                </div>
              </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="page-nav-wrap pt-5 text-center wow fadeInUp" data-wow-delay=".3s">
                {{ $products->links() }}
        </div>
      </div>
    </section>

    <!-- Suggested Products Section Start -->
    <section class="car-section fix section-padding section-bg">
      <div class="container">
        <div class="section-title-area">
          <div class="section-title">
            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        {{ isset($settings['suggested_products']) ? $settings['suggested_products'] : 'Önerilen Ürünler' }}
            </h2>
          </div>
        </div>
            <div class="row">
                @foreach($suggestedProducts as $sugProduct)
              <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="shop-box-items">
                        <div class="shop-image">
                            <img src="{{ asset($sugProduct->main_image ?? 'front/assets/img/shop/01.jpg') }}" alt="{{ $sugProduct->name ?? 'Product Image' }}" />
                            @if($sugProduct->discount_price)
                            <div class="post-sale">{{ nav_trans('sale', 'İndirim') }}</div>
                            <div class="post-dis">-{{ round((($sugProduct->price - $sugProduct->discount_price) / $sugProduct->price) * 100) }}%</div>
                            @endif
                  </div>
                        <div class="shop-content">
                  <div class="car-titile">
                                <h4><a href="{{ route('front.products.show', $sugProduct->slug) }}">{{ $sugProduct->name }}</a></h4>
                                <p>{{ optional($sugProduct->categories)->first() ? optional($sugProduct->categories->first())->name : '' }}</p>
                  </div>
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                  </div>
                            <ul class="price-list">
                                <li>{{ number_format($sugProduct->discount_price ?? $sugProduct->price, 2) }} ₺</li>
                                @if($sugProduct->discount_price)
                                <li><s>{{ number_format($sugProduct->price, 2) }} ₺</s> <span class="discount-badge-sm">-%{{ round((($sugProduct->price - $sugProduct->discount_price) / $sugProduct->price) * 100) }}</span></li>
                                @endif
                    </ul>
                            <a href="javascript:void(0)" class="theme-btn add-to-cart {{ ($sugProduct->stocks && $sugProduct->stocks->sum('quantity') > 0) ? '' : 'disabled' }}" data-id="{{ $sugProduct->id }}">
                                <i class="fa-sharp fa-regular fa-cart-shopping"></i> {{ isset($settings['add_to_cart']) ? $settings['add_to_cart'] : 'Sepete Ekle' }}
                            </a>
                    </div>
                  </div>
                </div>
                @endforeach
        </div>
      </div>
    </section>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        // Sepete ekleme işlemi
        $('.add-to-cart').click(function(e) {
            e.preventDefault();
            
            var productId = $(this).data('id');
            var quantity = 1;
            
            $.ajax({
                url: '{{ route("front.products.add-to-cart") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: quantity
                },
                success: function(response) {
                    if (response.success) {
                        alert('{{ nav_trans("product_added_to_cart", "Ürün sepete eklendi") }}');
                        $('#cart-count').text(response.cart_count);
                    } else {
                        alert(response.message || '{{ nav_trans("error_adding_product", "Ürün eklenirken bir hata oluştu") }}');
                    }
                },
                error: function() {
                    alert('{{ nav_trans("error_adding_product", "Ürün eklenirken bir hata oluştu") }}');
                }
            });
        });
    });
</script>
@endpush

@push('css')
<style>
    .shop-box-items {
        margin-bottom: 30px;
        transition: all 0.3s ease;
    }
    
    .shop-image {
        position: relative;
        height: 250px;
        overflow: hidden;
        border-radius: 8px 8px 0 0;
        background-color: #f7f7f7;
    }
    
    .shop-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .shop-box-items:hover .shop-image img {
        transform: scale(1.05);
    }
    
    .post-sale, .post-dis {
        position: absolute;
        padding: 5px 10px;
        background-color: #ff4747;
        color: #fff;
        font-size: 12px;
        font-weight: 600;
        z-index: 1;
    }
    
    .post-sale {
        top: 10px;
        left: 10px;
        border-radius: 4px;
    }
    
    .post-dis {
        top: 10px;
        right: 10px;
        border-radius: 4px;
    }
    
    .shop-content {
        padding: 20px;
        background-color: #fff;
        border-radius: 0 0 8px 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .car-titile h4 {
        margin-bottom: 5px;
        font-size: 18px;
        font-weight: 600;
    }
    
    .car-titile h4 a {
        color: #333;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .car-titile h4 a:hover {
        color: #ff4747;
    }
    
    .car-titile p {
        color: #777;
        font-size: 14px;
        margin-bottom: 10px;
    }
    
    .star {
        margin-bottom: 15px;
        color: #ffc107;
    }
    
    .price-list {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
        padding: 0;
        list-style: none;
    }
    
    .price-list li:first-child {
        font-size: 18px;
        font-weight: 700;
        color: #ff4747;
    }
    
    .price-list li:last-child {
        color: #999;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .discount-badge-sm {
        display: inline-block;
        padding: 2px 6px;
        background-color: #ff4747;
        color: white;
        font-size: 11px;
        border-radius: 3px;
        font-weight: 600;
    }
    
    .theme-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 12px 15px;
        background-color: #ff4747;
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        text-align: center;
        text-decoration: none;
        border-radius: 4px;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        width: 100%;
        height: 46px;
    }
    
    .theme-btn:hover:not(.disabled) {
        background-color: #e03a3a;
        color: #fff;
        transform: translateY(-2px);
    }
    
    .theme-btn.disabled {
        background-color: #ccc;
        cursor: not-allowed;
        opacity: 0.7;
        pointer-events: none;
    }
    
    .theme-btn i {
        margin-right: 5px;
    }
</style>
@endpush