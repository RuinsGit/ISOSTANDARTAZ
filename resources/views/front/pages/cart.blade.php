@extends('front.layouts.master')

@section('title', isset($settings['cart']) ? $settings['cart'] : 'Sepetim')

@section('content')

<div id="preloader" class="preloader">
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
         style="background-image: url('{{ asset('front/assets/img/breadcrumb-bg.jpg') }}')">
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ isset($settings['cart']) ? $settings['cart'] : 'Sepetim' }}</h1>
                </div>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="{{ route('front.index') }}"> {{ nav_trans('home', 'Ana Sayfa') }} </a>
                    </li>
                    <li>
                        <i class="fa-regular fa-chevrons-right"></i>
                    </li>
                    <li>{{ isset($settings['cart']) ? $settings['cart'] : 'Sepetim' }}</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Cart Section Start -->
    <section class="cart-section section-padding">
        <div class="container">
            @if(Session::has('cart') && count(Session::get('cart')) > 0)
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-items-wrapper">
                            <div class="cart-table-header d-none d-md-flex">
                                <div class="cart-header-item product-col">{{ nav_trans('product', 'Ürün') }}</div>
                                <div class="cart-header-item price-col">{{ nav_trans('price', 'Fiyat') }}</div>
                                <div class="cart-header-item quantity-col">{{ nav_trans('quantity', 'Adet') }}</div>
                                <div class="cart-header-item total-col">{{ nav_trans('total', 'Toplam') }}</div>
                                <div class="cart-header-item action-col"></div>
                            </div>
                            
                            <div id="cart-items-container">
                                @php
                                    $cart = Session::get('cart');
                                    $total = 0;
                                    $totalDiscount = 0;
                                @endphp
                                
                                @foreach($cart as $productKey => $item)
                                    @php
                                        $productInfo = explode(':', $productKey);
                                        $productId = $productInfo[0];
                                        $colorId = isset($productInfo[1]) ? $productInfo[1] : null;
                                        $sizeId = isset($productInfo[2]) ? $productInfo[2] : null;
                                        
                                        $product = \App\Models\Product::find($productId);
                                        if(!$product) continue;
                                        
                                        $color = $colorId ? \App\Models\ProductColor::find($colorId) : null;
                                        $size = $sizeId ? \App\Models\ProductSize::find($sizeId) : null;
                                        
                                        $itemPrice = $product->discount_price ?? $product->price;
                                        $subtotal = $itemPrice * $item['quantity'];
                                        $total += $subtotal;
                                        
                                        if($product->discount_price) {
                                            $itemDiscount = ($product->price - $product->discount_price) * $item['quantity'];
                                            $totalDiscount += $itemDiscount;
                                        }
                                    @endphp
                                    
                                    <div class="cart-item" data-product-key="{{ $productKey }}">
                                        <div class="cart-item-inner">
                                            <div class="cart-item-col product-col">
                                                <div class="cart-product">
                                                    <div class="cart-product-image">
                                                        <a href="{{ route('front.products.show', $product->slug) }}">
                                                            <img src="{{ asset($product->main_image ?? 'front/assets/img/shop/01.jpg') }}" alt="{{ $product->name }}">
                                                        </a>
                                                    </div>
                                                    <div class="cart-product-content">
                                                        <h4><a href="{{ route('front.products.show', $product->slug) }}">{{ $product->name }}</a></h4>
                                                        @if($color)
                                                            <div class="product-variation">
                                                                <span>{{ nav_trans('color', 'Renk') }}: </span>
                                                                <span class="var-value">{{ $color->color_name }}</span>
                                                            </div>
                                                        @endif
                                                        @if($size)
                                                            <div class="product-variation">
                                                                <span>{{ nav_trans('size', 'Boyut') }}: </span>
                                                                <span class="var-value">{{ $size->size_value }}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cart-item-col price-col">
                                                <div class="cart-product-price">
                                                    @if($product->discount_price)
                                                        <span class="current-price">{{ number_format($product->discount_price, 2) }} ₺</span>
                                                        <span class="old-price"><s>{{ number_format($product->price, 2) }} ₺</s></span>
                                                        <span class="discount-badge-sm">-%{{ round((($product->price - $product->discount_price) / $product->price) * 100) }}</span>
                                                    @else
                                                        <span class="current-price">{{ number_format($product->price, 2) }} ₺</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="cart-item-col quantity-col">
                                                <div class="cart-quantity">
                                                    <div class="quantity-input">
                                                        <button type="button" class="qty-btn minus-btn"><i class="fas fa-minus"></i></button>
                                                        <input type="text" class="qty-input-field" value="{{ $item['quantity'] }}" min="1" max="99">
                                                        <button type="button" class="qty-btn plus-btn"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cart-item-col total-col">
                                                <div class="cart-product-total">
                                                    {{ number_format($subtotal, 2) }} ₺
                                                </div>
                                            </div>
                                            <div class="cart-item-col action-col">
                                                <button type="button" class="remove-item-btn" data-product-key="{{ $productKey }}">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="cart-actions">
                                <a href="{{ route('front.products.index') }}" class="theme-btn outline-btn">
                                    <i class="fas fa-arrow-left"></i> {{ nav_trans('continue_shopping', 'Alışverişe Devam Et') }}
                                </a>
                                <button id="clear-cart-btn" class="theme-btn outline-btn danger-btn">
                                    <i class="fas fa-trash"></i> {{ nav_trans('clear_cart', 'Sepeti Temizle') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="cart-totals">
                            <h3>{{ nav_trans('cart_summary', 'Sepet Özeti') }}</h3>
                            
                            <div class="cart-totals-table">
                                <div class="table-row">
                                    <div class="label">{{ nav_trans('subtotal', 'Ara Toplam') }}</div>
                                    <div class="value">{{ number_format($total + $totalDiscount, 2) }} ₺</div>
                                </div>
                                @if($totalDiscount > 0)
                                <div class="table-row discount-row">
                                    <div class="label">{{ nav_trans('discount', 'İndirim') }}</div>
                                    <div class="value">-{{ number_format($totalDiscount, 2) }} ₺</div>
                                </div>
                                @endif
                                <div class="table-row">
                                    <div class="label">{{ nav_trans('shipping', 'Kargo') }}</div>
                                    <div class="value shipping-value">{{ nav_trans('free', 'Ücretsiz') }}</div>
                                </div>
                                <div class="table-row total-row">
                                    <div class="label">{{ nav_trans('total', 'Toplam') }}</div>
                                    <div class="value">{{ number_format($total, 2) }} ₺</div>
                                </div>
                            </div>
                            
                            <div class="coupon-section">
                                <div class="coupon-form">
                                    <input type="text" placeholder="{{ nav_trans('coupon_code', 'Kupon Kodu') }}" class="coupon-input">
                                    <button class="theme-btn" id="apply-coupon">{{ nav_trans('apply', 'Uygula') }}</button>
                                </div>
                            </div>
                            
                            <div class="cart-buttons">
                                <a href="#" class="theme-btn full-width">
                                    <i class="fas fa-credit-card"></i> {{ nav_trans('proceed_to_checkout', 'Ödeme Yap') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="empty-cart text-center">
                    <div class="empty-cart-icon">
                        <i class="fa-sharp fa-regular fa-cart-shopping"></i>
                    </div>
                    <h3>{{ nav_trans('empty_cart', 'Sepetiniz Boş') }}</h3>
                    <p>{{ nav_trans('empty_cart_message', 'Sepetinizde ürün bulunmamaktadır.') }}</p>
                    <a href="{{ route('front.products.index') }}" class="theme-btn">{{ nav_trans('shop_now', 'Alışverişe Başla') }}</a>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        // Ürün miktarını artırma/azaltma
        $('.plus-btn').click(function() {
            var input = $(this).siblings('.qty-input-field');
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                input.val(currentVal + 1);
                updateCartItem($(this).closest('.cart-item'));
            }
        });
        
        $('.minus-btn').click(function() {
            var input = $(this).siblings('.qty-input-field');
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal) && currentVal > 1) {
                input.val(currentVal - 1);
                updateCartItem($(this).closest('.cart-item'));
            }
        });
        
        // Miktarı manuel değiştirdiğinde güncelleme
        $('.qty-input-field').change(function() {
            var currentVal = parseInt($(this).val());
            if (isNaN(currentVal) || currentVal < 1) {
                $(this).val(1);
            } else if (currentVal > 99) {
                $(this).val(99);
            }
            updateCartItem($(this).closest('.cart-item'));
        });
        
        // Sepetten ürün silme
        $('.remove-item-btn').click(function() {
            var productKey = $(this).data('product-key');
            removeFromCart(productKey);
        });
        
        // Sepeti temizleme
        $('#clear-cart-btn').click(function() {
            if (confirm('{{ nav_trans("confirm_clear_cart", "Sepeti temizlemek istediğinize emin misiniz?") }}')) {
                clearCart();
            }
        });
        
        // AJAX ile sepet güncelleme
        function updateCartItem(cartItem) {
            var productKey = cartItem.data('product-key');
            var quantity = cartItem.find('.qty-input-field').val();
            
            $.ajax({
                url: '{{ route("front.products.update-cart") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productKey,
                    quantity: quantity
                },
                success: function(response) {
                    if (response.success) {
                        // Sayfayı yenilemek yerine AJAX ile güncellenebilir
                        window.location.reload();
                    }
                },
                error: function() {
                    alert('{{ nav_trans("error_updating_cart", "Sepet güncellenirken bir hata oluştu") }}');
                }
            });
        }
        
        // AJAX ile sepetten ürün silme
        function removeFromCart(productKey) {
            $.ajax({
                url: '{{ route("front.products.remove-from-cart") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productKey
                },
                success: function(response) {
                    if (response.success) {
                        // Sayfayı yenilemek yerine AJAX ile güncellenebilir
                        window.location.reload();
                    }
                },
                error: function() {
                    alert('{{ nav_trans("error_removing_item", "Ürün silinirken bir hata oluştu") }}');
                }
            });
        }
        
        // AJAX ile sepeti temizleme
        function clearCart() {
            $.ajax({
                url: '{{ route("front.products.clear-cart") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        window.location.reload();
                    }
                },
                error: function() {
                    alert('{{ nav_trans("error_clearing_cart", "Sepet temizlenirken bir hata oluştu") }}');
                }
            });
        }
        
        // Kupon uygulama
        $('#apply-coupon').click(function() {
            var couponCode = $('.coupon-input').val().trim();
            
            if (couponCode === '') {
                alert('{{ nav_trans("enter_coupon_code", "Lütfen bir kupon kodu girin") }}');
                return;
            }
            
            $.ajax({
                url: '{{ route("front.products.apply-coupon") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    coupon_code: couponCode
                },
                success: function(response) {
                    if (response.success) {
                        window.location.reload();
                    } else {
                        alert(response.message || '{{ nav_trans("invalid_coupon", "Geçersiz kupon kodu") }}');
                    }
                },
                error: function() {
                    alert('{{ nav_trans("error_applying_coupon", "Kupon uygulanırken bir hata oluştu") }}');
                }
            });
        });
    });
</script>
@endpush

@push('css')
<style>
    /* Sepet Sayfası Stilleri */
    .cart-section {
        padding-top: 80px;
        padding-bottom: 80px;
    }
    
    .cart-table-header {
        display: flex;
        background-color: #f8f8f8;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
        font-weight: 600;
        color: #333;
    }
    
    .cart-header-item {
        text-align: center;
    }
    
    .product-col {
        flex: 0 0 40%;
        text-align: left;
    }
    
    .price-col {
        flex: 0 0 20%;
    }
    
    .quantity-col {
        flex: 0 0 20%;
    }
    
    .total-col {
        flex: 0 0 15%;
    }
    
    .action-col {
        flex: 0 0 5%;
    }
    
    .cart-item {
        background-color: #fff;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.03);
        transition: all 0.3s ease;
    }
    
    .cart-item:hover {
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transform: translateY(-2px);
    }
    
    .cart-item-inner {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .cart-item-col {
        padding: 10px;
        text-align: center;
    }
    
    .cart-product {
        display: flex;
        align-items: center;
        text-align: left;
    }
    
    .cart-product-image {
        width: 80px;
        height: 80px;
        overflow: hidden;
        border-radius: 6px;
        margin-right: 15px;
        background-color: #f8f8f8;
        flex-shrink: 0;
    }
    
    .cart-product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .cart-product-content h4 {
        margin-bottom: 5px;
        font-size: 16px;
        font-weight: 600;
    }
    
    .cart-product-content h4 a {
        color: #333;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .cart-product-content h4 a:hover {
        color: #ff4747;
    }
    
    .product-variation {
        font-size: 13px;
        color: #666;
        margin-bottom: 3px;
    }
    
    .var-value {
        font-weight: 500;
    }
    
    .cart-product-price {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .current-price {
        font-weight: 700;
        color: #ff4747;
        font-size: 16px;
    }
    
    .old-price {
        color: #999;
        font-size: 14px;
        margin-top: 3px;
    }
    
    .discount-badge-sm {
        display: inline-block;
        padding: 2px 6px;
        background-color: #ff4747;
        color: white;
        font-size: 11px;
        border-radius: 3px;
        font-weight: 600;
        margin-top: 3px;
    }
    
    .quantity-input {
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #ddd;
        border-radius: 4px;
        width: 120px;
        margin: 0 auto;
    }
    
    .qty-btn {
        width: 32px;
        height: 38px;
        background: #f5f5f5;
        border: none;
        color: #333;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .qty-btn:hover {
        background: #eaeaea;
    }
    
    .minus-btn {
        border-radius: 4px 0 0 4px;
    }
    
    .plus-btn {
        border-radius: 0 4px 4px 0;
    }
    
    .qty-input-field {
        width: 50px;
        height: 38px;
        text-align: center;
        border: none;
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        font-weight: 600;
    }
    
    .cart-product-total {
        font-weight: 700;
        font-size: 16px;
        color: #333;
    }
    
    .remove-item-btn {
        background: none;
        border: none;
        color: #999;
        cursor: pointer;
        font-size: 16px;
        transition: all 0.3s ease;
    }
    
    .remove-item-btn:hover {
        color: #ff4747;
        transform: scale(1.2);
    }
    
    .cart-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }
    
    .outline-btn {
        background-color: transparent;
        border: 1px solid #ddd;
        color: #333;
    }
    
    .outline-btn:hover {
        background-color: #f5f5f5;
        color: #333;
    }
    
    .danger-btn {
        border-color: #ff4747;
        color: #ff4747;
    }
    
    .danger-btn:hover {
        background-color: #ff4747;
        color: #fff;
    }
    
    /* Sepet Toplamları */
    .cart-totals {
        background-color: #f8f8f8;
        border-radius: 8px;
        padding: 25px;
        position: sticky;
        top: 30px;
    }
    
    .cart-totals h3 {
        margin-bottom: 20px;
        font-size: 20px;
        font-weight: 700;
        padding-bottom: 15px;
        border-bottom: 1px solid #e9e9e9;
    }
    
    .cart-totals-table {
        margin-bottom: 20px;
    }
    
    .table-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #e9e9e9;
    }
    
    .table-row:last-child {
        border-bottom: none;
    }
    
    .label {
        color: #555;
    }
    
    .value {
        font-weight: 600;
        color: #333;
    }
    
    .discount-row .value {
        color: #ff4747;
    }
    
    .shipping-value {
        color: #4CAF50;
    }
    
    .total-row {
        margin-top: 10px;
        border-top: 2px solid #e9e9e9;
        padding-top: 15px;
        border-bottom: none;
    }
    
    .total-row .label,
    .total-row .value {
        font-size: 18px;
        font-weight: 700;
        color: #333;
    }
    
    /* Kupon Form */
    .coupon-section {
        margin-bottom: 20px;
        padding-top: 15px;
        border-top: 1px solid #e9e9e9;
    }
    
    .coupon-form {
        display: flex;
    }
    
    .coupon-input {
        flex: 1;
        height: 46px;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 6px 0 0 6px;
        font-size: 14px;
    }
    
    #apply-coupon {
        height: 46px;
        border-radius: 0 6px 6px 0;
        padding: 0 15px;
        background-color: #333;
        color: #fff;
        font-weight: 600;
    }
    
    #apply-coupon:hover {
        background-color: #222;
    }
    
    .cart-buttons {
        margin-top: 20px;
    }
    
    .full-width {
        width: 100%;
        text-align: center;
        padding: 15px;
        font-size: 16px;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }
    
    /* Boş Sepet */
    .empty-cart {
        padding: 60px 0;
    }
    
    .empty-cart-icon {
        font-size: 80px;
        color: #ddd;
        margin-bottom: 20px;
    }
    
    .empty-cart h3 {
        font-size: 24px;
        margin-bottom: 10px;
    }
    
    .empty-cart p {
        color: #777;
        margin-bottom: 20px;
    }
    
    /* Mobil Cihazlar için Düzenlemeler */
    @media (max-width: 767px) {
        .cart-item-inner {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .cart-item-col {
            width: 100%;
            text-align: left;
            padding: 8px 0;
        }
        
        .cart-product {
            width: 100%;
        }
        
        .cart-product-price,
        .cart-product-total {
            display: flex;
            align-items: center;
            margin-left: 95px; /* Ürün resmi genişliği + sağ margin */
        }
        
        .cart-product-price::before {
            content: "Fiyat: ";
            font-weight: 600;
            margin-right: 5px;
        }
        
        .cart-product-total::before {
            content: "Toplam: ";
            font-weight: 600;
            margin-right: 5px;
        }
        
        .cart-quantity {
            margin-left: 95px;
            justify-content: flex-start;
        }
        
        .remove-item-btn {
            position: absolute;
            top: 15px;
            right: 15px;
        }
        
        .cart-item {
            position: relative;
            padding-right: 40px;
        }
        
        .action-col {
            position: absolute;
            top: 15px;
            right: 15px;
        }
    }
</style>
@endpush 