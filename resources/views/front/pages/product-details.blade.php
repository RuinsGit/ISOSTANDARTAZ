@extends('front.layouts.master')

@section('title', isset($product->name) ? $product->name : (isset($settings['products']) ? $settings['products'] : 'Ürün Detayı'))

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
    <div
      class="breadcrumb-wrapper section-bg bg-cover"
      style="background-image: url('{{ $blogHero && $blogHero->image_path ? asset($blogHero->image_path) : asset('front/assets/img/breadcrumb-bg.jpg') }}')"
    >
      <div class="container">
        <div class="page-heading">
          <div class="breadcrumb-sub-title">
            <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ $product->name }}</h1>
          </div>
          <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
            <li>
              <a href="{{ route('front.index') }}"> {{ nav_trans('home', 'Ana Sayfa') }} </a>
            </li>
            <li>
              <i class="fa-regular fa-chevrons-right"></i>
            </li>
            <li>
              <a href="{{ route('front.products.index') }}"> {{ nav_trans('products', 'Ürünler') }} </a>
            </li>
            <li>
              <i class="fa-regular fa-chevrons-right"></i>
            </li>
            <li>{{ $product->name }}</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Shop Details Section Start -->
    <section class="shop-details-section section-padding">
      <div class="container">
        <div class="shop-details-wrapper">
          <div class="row">
            <div class="col-lg-6">
              <div class="shop-details-image">
                <!-- Ana ürün resmi -->
                <div class="product-main-image mb-3">
                  @if($product->main_image)
                  <img id="main-product-image" src="{{ asset($product->main_image) }}" alt="{{ $product->name }}" class="img-fluid" />
                  @elseif($product->images && count($product->images) > 0)
                  <img id="main-product-image" src="{{ asset($product->images[0]->image_path) }}" alt="{{ $product->images[0]->alt_text ?? $product->name }}" class="img-fluid" />
                  @endif
                    </div>
                
                <!-- Küçük resimler galerisi -->
                <div class="product-thumbs d-flex flex-wrap">
                  @if($product->main_image)
                  <div class="thumb-item active" data-image="{{ asset($product->main_image) }}">
                    <img src="{{ asset($product->main_image) }}" alt="{{ $product->name }}" class="img-fluid" />
                  </div>
                  @endif
                  
                  @if($product->images && count($product->images) > 0)
                    @foreach($product->images as $key => $image)
                    <div class="thumb-item {{ !$product->main_image && $key == 0 ? 'active' : '' }}" data-image="{{ asset($image->image_path) }}">
                      <img src="{{ asset($image->image_path) }}" alt="{{ $image->alt_text ?? $product->name }}" class="img-fluid" />
                    </div>
                    @endforeach
                  @endif
                  </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="product-details-content">
                <h2 class="pb-3">{{ $product->name }}</h2>
                <div class="star pb-3">
                  <a href="#"> <i class="fas fa-star"></i></a>
                  <a href="#"><i class="fas fa-star"></i></a>
                  <a href="#"> <i class="fas fa-star"></i></a>
                  <a href="#"><i class="fas fa-star"></i></a>
                  <a href="#"><i class="fas fa-star"></i></a>
                  <span>({{ rand(5, 30) }} {{ isset($settings['customer_rewiev']) ? $settings['customer_rewiev'] : 'Ürünler' }})</span>
                </div>
                <div class="product-short-description mb-3">
                  <p class="short-description">{{ Str::limit($product->description, 150) }}</p>
                  <div class="full-description" style="display: none;">
                    <p>{{ $product->description }}</p>
                  </div>
                  @if(strlen($product->description) > 150)
                  <a href="javascript:void(0)" class="read-more-btn">{{ nav_trans('read_more', 'Daha Fazla') }} <i class="fas fa-chevron-down"></i></a>
                  @endif
                </div>
                <div class="price-list">
                  @if($product->discount_price)
                    <h3>{{ number_format($product->discount_price, 2) }} ₼
                      <span class="old-price"><s>{{ number_format($product->price, 2) }} ₼</s> 
                      <span class="discount-badge">-%{{ round((($product->price - $product->discount_price) / $product->price) * 100) }}</span></span>
                    </h3>
                  @else
                    <h3>{{ number_format($product->price, 2) }} ₺</h3>
                  @endif
                </div>
                <div class="cart-wrp">
                  <div class="cart-quantity">
                    <form id="productForm" class="quantity">
                      <input type="button" value="-" class="qtyminus minus" />
                      <input type="text" name="quantity" value="1" class="qty" />
                      <input type="button" value="+" class="qtyplus plus" />
                      <input type="hidden" name="product_id" value="{{ $product->id }}" />
                      <input type="hidden" name="color_id" id="selected_color_id" value="" />
                      <input type="hidden" name="size_id" id="selected_size_id" value="" />
                    </form>
                  </div>
                  <a href="#" class="icon add-to-wishlist" data-id="{{ $product->id }}">
                    <i class="far fa-heart"></i>
                  </a>
                  <a href="#" class="icon">
                    <i class="far fa-share"></i>
                  </a>
                </div>
                <div class="shop-btn">
                  <a href="javascript:void(0)" class="theme-btn add-to-cart {{ ($product->stocks && $product->stocks->sum('quantity') > 0) ? '' : 'disabled' }}" data-id="{{ $product->id }}">
                    <span><i class="fa-sharp fa-regular fa-cart-shopping"></i> {{ isset($settings['add_to_cart']) ? $settings['add_to_cart'] : 'Ürünler' }}</span>
                  </a>
                  <a href="{{ route('front.products.cart') }}" class="theme-btn buy-now-btn {{ ($product->stocks && $product->stocks->sum('quantity') > 0) ? '' : 'disabled' }}">
                    <span><i class="fa-solid fa-credit-card"></i> {{ isset($settings['buy_now']) ? $settings['buy_now'] : 'Ürünler' }}</span>
                  </a>
                </div>
                <h6 class="details-info">
                  <span>SKU:</span> <a href="#">{{ $product->sku }}</a>
                </h6>
                <h6 class="details-info">
                  <span>{{ isset($settings['catagorys']) ? $settings['catagorys'] : 'Ürünler' }}:</span>
                  @if($product->categories && count($product->categories) > 0)
                    @foreach($product->categories as $category)
                      <a href="#">{{ $category->name }}</a>{{ !$loop->last ? ', ' : '' }}
                    @endforeach
                  @else
                    <a href="#">{{ nav_trans('uncategorized', 'Kategorisiz') }}</a>
                  @endif
                </h6>
             
                
                <!-- Renk ve Boyut Seçimi -->
                <div class="row mt-5">
                  <div class="col-12">
                    <div class="product-variations">
                      <!-- Stok Durumu Bilgisi -->
                      <div class="stock-status mb-4">
                        @if($product->stocks && $product->stocks->sum('quantity') > 0)
                          <span class="badge bg-success">{{ isset($settings['in_stock']) ? $settings['in_stock'] : 'Ürünler' }}</span>
                          <span class="stock-quantity">({{ $product->stocks->sum('quantity') }} {{ isset($settings['items_avianable']) ? $settings['items_avianable'] : 'Ürünler' }})</span>
                        @else
                          <span class="badge bg-danger">{{ isset($settings['items_notavianable']) ? $settings['items_notavianable'] : 'Ürünler' }}</span>
                        @endif
              </div>
                      
                      <!-- Renk Seçimi -->
                      @if($product->colors && $product->colors->where('status', 1)->count() > 0)
                      <div class="color-options mb-4">
                        <h5>{{ isset($settings['pick_color']) ? $settings['pick_color'] : 'Ürünler' }}</h5>
                        <div class="color-selector d-flex flex-wrap gap-2">
                          @foreach($product->colors->where('status', 1)->sortBy('sort_order') as $color)
                            <div class="color-item" data-color-id="{{ $color->id }}" data-color-name="{{ $color->color_name }}">
                              @if($color->color_image)
                                <div class="color-swatch" style="background-image: url('{{ asset($color->color_image) }}')"></div>
                              @else
                                <div class="color-swatch" style="background-color: {{ $color->color_code }}"></div>
                              @endif
                              <span class="color-name">{{ $color->color_name }}</span>
                            </div>
                          @endforeach
                        </div>
                      </div>
                      @endif
                      
                      <!-- Boyut Seçimi -->
                      @if($product->sizes && $product->sizes->where('status', 1)->count() > 0)
                      <div class="size-options mb-4">
                        <h5>{{ isset($settings['pick_size']) ? $settings['pick_size'] : 'Ürünler' }}</h5>
                        <div class="size-selector d-flex flex-wrap gap-2">
                          @foreach($product->sizes->where('status', 1)->sortBy('sort_order') as $size)
                            <div class="size-item" data-size-id="{{ $size->id }}" data-size-name="{{ $size->size_name }}">
                              {{ $size->size_value }}
                            </div>
                          @endforeach
                        </div>
                      </div>
                      @endif
                      
                      <!-- Özel Stok Bilgisi -->
                      <div class="specific-stock-info mt-3 mb-4 d-none">
                        <div class="alert alert-info stock-message">
                        {{ isset($settings['aplly_chose']) ? $settings['aplly_chose'] : 'Ürünler' }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="single-tab">
            <ul class="nav mb-5">
              <li class="nav-item">
                <a
                  href="#description"
                  data-bs-toggle="tab"
                  class="nav-link ps-0 active"
                >
                  <h6>{{ nav_trans('description', 'Açıklama') }}</h6>
                </a>
              </li>
              <li class="nav-item">
                <a href="#additional" data-bs-toggle="tab" class="nav-link">
                  <h6>{{ nav_trans('additional_information', 'Ek Bilgiler') }}</h6>
                </a>
              </li>
              <li class="nav-item">
                <a href="#review" data-bs-toggle="tab" class="nav-link">
                  <h6>{{ nav_trans('reviews', 'Yorumlar') }} (3)</h6>
                </a>
              </li>
            </ul>
            <div class="tab-content">
              <div id="description" class="tab-pane fade show active">
                <div class="description-items">
                  <div class="description-content">
                    <h3>{{ nav_trans('product_descriptions', 'Ürün Açıklamaları') }}</h3>
                    <div class="product-description">
                      {!! $product->description !!}
                    </div>
                    
                    @if($product->properties && count($product->properties) > 0)
                    <div class="description-list-items d-flex justify-content-between mt-4">
                      <ul class="description-list">
                        @foreach($product->properties->take(3) as $property)
                        <li>
                          {{ $property->property_name }}:
                          <span>{{ $property->property_value }}</span>
                        </li>
                        @endforeach
                      </ul>
                      
                      @if(count($product->properties) > 3)
                      <ul class="description-list">
                        @foreach($product->properties->skip(3)->take(3) as $property)
                        <li>
                          {{ $property->property_name }}:
                          <span>{{ $property->property_value }}</span>
                        </li>
                        @endforeach
                      </ul>
                      @endif
                    </div>
                    @endif
                  </div>
                </div>
              </div>
              <div id="additional" class="tab-pane fade">
                <div class="table-responsive mb-15">
                  <table class="table table-bordered">
                    <tbody>
                      @if($product->properties && count($product->properties) > 0)
                        @foreach($product->properties as $property)
                      <tr>
                          <td>{{ $property->property_name }}</td>
                          <td>{{ $property->property_value }}</td>
                      </tr>
                        @endforeach
                      @else
                      <tr>
                          <td colspan="2">{{ nav_trans('no_additional_information', 'Ek bilgi bulunmamaktadır.') }}</td>
                      </tr>
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
              <div id="review" class="tab-pane fade">
                <div class="review-items">
                  <div
                    class="admin-items d-flex flex-wrap flex-md-nowrap align-items-center pb-4"
                  >
                    <div class="admin-img pb-4 pb-md-0 me-4">
                      <img src="{{ asset('front/assets/img/shop/r-1.jpg') }}" alt="image" />
                    </div>
                    <div class="content p-4">
                      <div
                        class="head-content pb-1 d-flex flex-wrap justify-content-between"
                      >
                        <h5>miklos salsa<span>27June 2024 at 5.44pm</span></h5>
                        <div class="star">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                        </div>
                      </div>
                      <p>
                        Lorem ipsum dolor sit amet consectetur adipiscing elit.
                        Curabitur vulputate vestibulum Phasellus rhoncus dolor
                        eget viverra pretium.Curabitur vulputate vestibulum
                        Phasellus rhoncus dolor eget viverra pretium.
                      </p>
                    </div>
                  </div>
                  <div
                    class="admin-items d-flex flex-wrap flex-md-nowrap align-items-center pb-4"
                  >
                    <div class="admin-img pb-4 pb-md-0 me-4">
                      <img src="{{ asset('front/assets/img/shop/r-2.jpg') }}" alt="image" />
                    </div>
                    <div class="content p-4">
                      <div
                        class="head-content pb-1 d-flex flex-wrap justify-content-between"
                      >
                        <h5>Ethan Turner <span>27June 2024 at 5.44pm</span></h5>
                        <div class="star">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                        </div>
                      </div>
                      <p>
                        Lorem ipsum dolor sit amet consectetur adipiscing elit.
                        Curabitur vulputate vestibulum Phasellus rhoncus dolor
                        eget viverra pretium.Curabitur vulputate vestibulum
                        Phasellus rhoncus dolor eget viverra pretium.
                      </p>
                    </div>
                  </div>
                  <div
                    class="admin-items d-flex flex-wrap flex-md-nowrap align-items-center pb-4"
                  >
                    <div class="admin-img pb-4 pb-md-0 me-4">
                      <img src="{{ asset('front/assets/img/shop/r-3.png') }}" alt="image" />
                    </div>
                    <div class="content p-4">
                      <div
                        class="head-content pb-1 d-flex flex-wrap justify-content-between"
                      >
                        <h5>Devid Miller<span>27June 2024 at 5.44pm</span></h5>
                        <div class="star">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                        </div>
                      </div>
                      <p>
                        Lorem ipsum dolor sit amet consectetur adipiscing elit.
                        Curabitur vulputate vestibulum Phasellus rhoncus dolor
                        eget viverra pretium.Curabitur vulputate vestibulum
                        Phasellus rhoncus dolor eget viverra pretium.
                      </p>
                    </div>
                  </div>
                  <div class="review-title mt-5 py-15 mb-30">
                    <h4>{{ nav_trans('add_review', 'Yorum Ekle') }}</h4>
                    <div class="rate-now d-flex align-items-center">
                      <p>{{ nav_trans('rate_product', 'Bu ürünü değerlendir') }} *</p>
                      <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                    </div>
                  </div>
                  <div class="review-form">
                    <form action="#" id="contact-form" method="POST">
                      <div class="row g-4">
                        <div class="col-lg-6">
                          <div class="form-clt">
                            <input
                              type="text"
                              name="name"
                              id="name"
                              placeholder="{{ nav_trans('full_name', 'Ad Soyad') }}"
                            />
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-clt">
                            <input
                              type="text"
                              name="email"
                              id="email"
                              placeholder="{{ nav_trans('email_address', 'E-posta Adresi') }}"
                            />
                          </div>
                        </div>
                        <div class="col-lg-12 wow fadeInUp" data-wow-delay=".8">
                          <div class="form-clt-big form-clt">
                            <textarea
                              name="message"
                              id="message"
                              placeholder="{{ nav_trans('message', 'Mesajınız') }}"
                            ></textarea>
                          </div>
                        </div>
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay=".9">
                          <button type="submit" class="theme-btn">
                            <span>{{ nav_trans('submit', 'Gönder') }}</span>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Suggested Products Section Start -->
    @if(isset($suggestedProducts) && count($suggestedProducts) > 0)
    <section class="car-section fix section-padding section-bg">
      <div class="container">
        <div class="section-title-area">
          <div class="section-title">
            <h2 class="wow fadeInUp" data-wow-delay=".3s">
              {{ isset($settings['suggested_products']) ? $settings['suggested_products'] : 'Önerilen Ürünler' }}
            </h2>
          </div>
        </div>
        <div class="tab-content">
          <div class="tab-panel-suggest fade show active">
            <div class="row">
              @foreach($suggestedProducts as $sugProduct)
              <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="shop-box-items">
                  <div class="shop-image">
                    <img src="{{ asset($sugProduct->main_image ?? 'front/assets/img/shop/01.jpg') }}" alt="{{ $sugProduct->name ?? 'Product Image' }}" />
                    @if($sugProduct->discount_price)
                    <div class="post-sale">Sale</div>
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
        </div>
      </div>
    </section>
    @endif

    <!-- Ürün Resmi Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="imageModalLabel">{{ $product->name }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <img id="modal-product-image" src="{{ $product->main_image ? asset($product->main_image) : (isset($product->images[0]) ? asset($product->images[0]->image_path) : '') }}" alt="{{ $product->name }}" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

@endsection

@push('js')
<script>
  $(document).ready(function() {
    // Daha fazla butonu işlevselliği
    $('.read-more-btn').click(function() {
      var $this = $(this);
      var $shortDesc = $this.siblings('.short-description');
      var $fullDesc = $this.siblings('.full-description');
      
      if ($fullDesc.is(':hidden')) {
        $shortDesc.hide();
        $fullDesc.slideDown();
        $this.html('{{ nav_trans("read_less", "Daha Az") }} <i class="fas fa-chevron-up"></i>');
      } else {
        $fullDesc.hide();
        $shortDesc.show();
        $this.html('{{ nav_trans("read_more", "Daha Fazla") }} <i class="fas fa-chevron-down"></i>');
      }
    });
    
    // Ürün miktarı artırma/azaltma
    $('.qtyminus').click(function() {
      var qty = parseInt($('.qty').val());
      if (qty > 1) {
        $('.qty').val(qty - 1);
      }
    });
    
    $('.qtyplus').click(function() {
      var qty = parseInt($('.qty').val());
      $('.qty').val(qty + 1);
    });
    
    // Ürün küçük resimlerine tıklandığında ana resmi değiştirme
    $('.thumb-item').click(function() {
      // Aktif sınıfını kaldırma
      $('.thumb-item').removeClass('active');
      
      // Tıklanan öğeye aktif sınıfı ekleme
      $(this).addClass('active');
      
      // Ana resmi değiştirme
      var newImageSrc = $(this).data('image');
      $('#main-product-image').attr('src', newImageSrc);
      $('#modal-product-image').attr('src', newImageSrc);
      
      // Ana resme hafif bir animasyon eklemek için
      $('#main-product-image').css('opacity', '0.7').animate({opacity: 1}, 300);
    });
    
    // Ana resme tıklandığında modal açma
    $('#main-product-image').click(function() {
      // Modal açma
      $("#imageModal").modal('show');
    });
    
    // Renk seçme işlemi
    $('.color-item').click(function() {
      $('.color-item').removeClass('active');
      $(this).addClass('active');
      
      // Seçilen renk bilgisini sakla
      var colorId = $(this).data('color-id');
      var colorName = $(this).data('color-name');
      
      // Gizli input'a seçilen renk ID'sini ata
      $('#selected_color_id').val(colorId);
      
      // Stok durumunu kontrol et
      checkStockStatus();
    });
    
    // Boyut seçme işlemi
    $('.size-item').click(function() {
      $('.size-item').removeClass('active');
      $(this).addClass('active');
      
      // Seçilen boyut bilgisini sakla
      var sizeId = $(this).data('size-id');
      var sizeName = $(this).data('size-name');
      
      // Gizli input'a seçilen boyut ID'sini ata
      $('#selected_size_id').val(sizeId);
      
      // Stok durumunu kontrol et
      checkStockStatus();
    });
    
    // Stok durumunu kontrol eden fonksiyon
    function checkStockStatus() {
      var colorId = $('#selected_color_id').val();
      var sizeId = $('#selected_size_id').val();
      
      // Eğer hem renk hem de boyut seçimi varsa stok durumunu kontrol et
      if (colorId && sizeId) {
        // AJAX isteği ile stok durumu kontrolü
        $.ajax({
          url: '{{ route("front.products.check-stock") }}',
          method: 'POST',
          data: {
            _token: '{{ csrf_token() }}',
            product_id: '{{ $product->id }}',
            color_id: colorId,
            size_id: sizeId
          },
          success: function(response) {
            $('.specific-stock-info').removeClass('d-none');
            
            if (response.in_stock) {
              $('.stock-message').removeClass('alert-danger alert-info').addClass('alert-success')
                .html('{{ nav_trans("selected_option_in_stock", "Seçilen renk ve boyut stokta mevcut") }}: ' + response.quantity + ' {{ nav_trans("items", "adet") }}');
              
              // Sepete ekle ve satın al butonlarını aktif et
              $('.add-to-cart, .buy-now-btn').removeClass('disabled');
            } else {
              $('.stock-message').removeClass('alert-success alert-info').addClass('alert-danger')
                .html('{{ nav_trans("selected_option_out_of_stock", "Seçilen renk ve boyutta ürün stokta bulunmamaktadır.") }}');
              
              // Sepete ekle ve satın al butonlarını devre dışı bırak
              $('.add-to-cart, .buy-now-btn').addClass('disabled');
            }
          },
          error: function() {
            $('.specific-stock-info').removeClass('d-none');
            $('.stock-message').removeClass('alert-success alert-danger').addClass('alert-info')
              .html('{{ nav_trans("error_checking_stock", "Stok durumu kontrol edilirken bir hata oluştu.") }}');
          }
        });
      }
    }
    
    // Sepete ekleme işlemi - tüm add-to-cart sınıflı elemanlara atanır
    $('.add-to-cart').click(function(e) {
      e.preventDefault();
      
      // Eğer buton devre dışı bırakılmışsa işlemi yapma
      if ($(this).hasClass('disabled')) {
        return;
      }
      
      var productId = $(this).data('id');
      var quantity = $('.qty').val() || 1;
      var colorId = $('#selected_color_id').val();
      var sizeId = $('#selected_size_id').val();
      
      $.ajax({
        url: '{{ route("front.products.add-to-cart") }}',
        method: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          product_id: productId,
          quantity: quantity,
          color_id: colorId,
          size_id: sizeId
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
    
    // Satın Al butonuna tıklama
    $('.buy-now-btn').click(function(e) {
      // Eğer buton devre dışı bırakılmışsa işlemi yapma
      if ($(this).hasClass('disabled')) {
        e.preventDefault();
        return;
      }
      
      var productId = $('.add-to-cart').data('id');
      var quantity = $('.qty').val() || 1;
      var colorId = $('#selected_color_id').val();
      var sizeId = $('#selected_size_id').val();
      
      // Önce sepete ekle, sonra sepet sayfasına yönlendir
      $.ajax({
        url: '{{ route("front.products.add-to-cart") }}',
        method: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          product_id: productId,
          quantity: quantity,
          color_id: colorId,
          size_id: sizeId
        },
        success: function(response) {
          if (response.success) {
            window.location.href = '{{ route("front.products.cart") }}';
          } else {
            alert(response.message || '{{ nav_trans("error_adding_product", "Ürün eklenirken bir hata oluştu") }}');
            e.preventDefault();
          }
        },
        error: function() {
          alert('{{ nav_trans("error_adding_product", "Ürün eklenirken bir hata oluştu") }}');
          e.preventDefault();
        }
      });
    });
    
    // Favorilere ekleme işlemi
    $('.add-to-wishlist').click(function(e) {
      e.preventDefault();
      
      var productId = $(this).data('id');
      
      $.ajax({
        url: '{{ route("front.products.add-to-wishlist") }}',
        method: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          product_id: productId
        },
        success: function(response) {
          if (response.success) {
            alert('{{ nav_trans("product_added_to_wishlist", "Ürün favorilere eklendi") }}');
          }
        },
        error: function() {
          alert('{{ nav_trans("error_adding_wishlist", "Favorilere eklenirken bir hata oluştu") }}');
        }
      });
    });
  });
</script>
@endpush

@push('css')
<style>
  /* Ürün Resim Galerisi */
  .product-main-image {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    height: 450px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f8f8;
    margin-bottom: 20px;
    cursor: pointer;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
  }
  
  .product-main-image img {
    max-width: 100%;
    max-height: 450px;
    object-fit: contain;
    display: block;
    transition: transform 0.3s ease;
  }
  
  .product-main-image img:hover {
    transform: scale(1.05);
  }

  .product-thumbs {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-bottom: 30px;
  }
  
  .thumb-item {
    width: 80px;
    height: 80px;
    border-radius: 6px;
    overflow: hidden;
    cursor: pointer;
    border: 2px solid transparent;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f8f8;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
  }
  
  .thumb-item img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
  }
  
  .thumb-item.active {
    border-color: #ff4747;
  }
  
  .thumb-item:hover {
    opacity: 0.8;
    transform: translateY(-2px);
  }
  
  /* Renk ve Boyut Seçiciler */
  .product-variations {
    border-top: 1px solid #eee;
    padding-top: 20px;
  }
  
  .stock-status {
    font-size: 14px;
  }
  
  .stock-quantity {
    margin-left: 10px;
    color: #666;
  }
  
  .color-options h5, .size-options h5 {
    font-size: 16px;
    margin-bottom: 12px;
    font-weight: 600;
  }
  
  .color-selector, .size-selector {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
  }
  
  .color-item {
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  
  .color-swatch {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: block;
    margin: 0 auto 5px;
    border: 2px solid #ddd;
    background-size: cover;
    background-position: center;
    transition: all 0.3s ease;
  }
  
  .color-name {
    font-size: 12px;
    display: block;
    color: #666;
  }
  
  .color-item:hover .color-swatch {
    border-color: #999;
    transform: scale(1.1);
  }
  
  .color-item.active .color-swatch {
    border-color: #ff4747;
    box-shadow: 0 0 0 2px rgba(255, 71, 71, 0.3);
  }
  
  .size-item {
    min-width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 0 12px;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  
  .size-item:hover {
    border-color: #999;
    transform: translateY(-2px);
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
  }
  
  .size-item.active {
    border-color: #ff4747;
    background-color: rgba(255, 71, 71, 0.1);
    color: #ff4747;
    font-weight: 600;
  }
  
  .specific-stock-info {
    font-size: 14px;
  }
  
  /* Sepet Butonları */
  .shop-btn {
    display: flex;
    gap: 10px;
    margin-top: 20px;
  }
  
  .shop-btn .theme-btn {
    flex: 1;
    padding: 12px 15px;
    border-radius: 6px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    text-align: center;
    width: 50%;
    height: 46px;
    margin: 0;
  }
  
  .shop-btn .theme-btn span {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    white-space: nowrap;
  }
  
  .shop-btn .add-to-cart {
    background-color: #ff4747;
  }
  
  .shop-btn .add-to-cart:hover:not(.disabled) {
    background-color: #e03a3a;
    transform: translateY(-2px);
  }
  
  .shop-btn .buy-now-btn {
    background-color: #333;
  }
  
  .shop-btn .buy-now-btn:hover:not(.disabled) {
    background-color: #222;
    transform: translateY(-2px);
  }
  
  .shop-btn .theme-btn.disabled {
    background-color: #ccc;
    cursor: not-allowed;
    opacity: 0.7;
    pointer-events: none;
  }
  
  /* Modal Stilleri */
  #imageModal .modal-body {
    padding: 0;
  }
  
  #imageModal .modal-content {
    border: none;
    border-radius: 10px;
    overflow: hidden;
  }
  
  #imageModal .modal-header {
    border-bottom: none;
    background-color: rgba(255,255,255,0.9);
    padding: 15px 20px;
  }
  
  #imageModal .modal-title {
    font-weight: 600;
  }
  
  #modal-product-image {
    max-height: 75vh;
    object-fit: contain;
    padding: 20px;
    background-color: #f8f8f8;
  }
  
  /* Ürün Detayları Stilleri */
  .details-info {
    margin-bottom: 12px;
    font-size: 15px;
    display: flex;
    align-items: center;
    gap: 5px;
  }
  
  .details-info span {
    font-weight: 600;
    color: #555;
    min-width: 100px;
  }
  
  .details-info a {
    color: #777;
    text-decoration: none;
    transition: color 0.3s ease;
  }
  
  .details-info a:hover {
    color: #ff4747;
  }
  
  .product-tags {
    display: flex;
    align-items: flex-start;
    margin-bottom: 15px;
  }
  
  .badge-label {
    font-weight: 600;
    color: #555;
    min-width: 100px;
    margin-top: 5px;
  }
  
  .tags-wrapper {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
  }
  
  .product-tag {
    display: inline-block;
    padding: 5px 12px;
    border-radius: 30px;
    background-color: #f5f5f5;
    color: #666;
    font-size: 13px;
    transition: all 0.3s ease;
    border: 1px solid #eee;
  }
  
  .product-tag:hover {
    background-color: #ff4747;
    color: #fff;
    border-color: #ff4747;
    transform: translateY(-2px);
  }
  
  /* Fiyat Stilleri */
  .price-list {
    margin-bottom: 20px;
  }
  
  .price-list h3 {
    font-size: 24px;
    font-weight: 700;
    color: #ff4747;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
  }
  
  .old-price {
    font-size: 16px;
    color: #999;
    font-weight: normal;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  
  .discount-badge {
    display: inline-block;
    padding: 3px 8px;
    background-color: #ff4747;
    color: white;
    font-size: 12px;
    border-radius: 4px;
    font-weight: 600;
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
  
  /* Önerilen Ürünler Fiyat Stilleri */
  .shop-box-items .price-list li:first-child {
    font-size: 18px;
    font-weight: 700;
    color: #ff4747;
  }
  
  .shop-box-items .price-list li:last-child {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #999;
    font-size: 14px;
  }
  
  /* Açıklama Stilleri */
  .product-short-description {
    position: relative;
    margin-bottom: 20px;
  }
  
  .short-description {
    margin-bottom: 0;
    overflow: hidden;
    line-height: 1.6;
    max-height: 4.8em; /* 3 satır için */
    position: relative;
  }
  
  .read-more-btn {
    color: #ff4747;
    font-size: 14px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    margin-top: 5px;
    text-decoration: none;
    transition: all 0.3s ease;
  }
  
  .read-more-btn:hover {
    color: #e03a3a;
    text-decoration: underline;
  }
  
  .full-description {
    margin-top: 10px;
  }
  
  .full-description p {
    line-height: 1.7;
    margin-bottom: 0;
  }
</style>
@endpush