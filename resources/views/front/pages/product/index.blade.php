@extends('front.layouts.master')

@section('title', $settings['products'])

@section('content')
    <div class="page-direction p-lr">
        <a href="{{ route('home.' . app()->getLocale()) }}" class="prev-page">{{ $settings['home'] }}</a>
        <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M13.3333 0.166687C13.3333 0.78502 13.9442 1.70835 14.5625 2.48335C15.3575 3.48335 16.3075 4.35585 17.3967 5.02169C18.2133 5.52085 19.2033 6.00002 20 6.00002M20 6.00002C19.2033 6.00002 18.2125 6.47919 17.3967 6.97835C16.3075 7.64502 15.3575 8.51752 14.5625 9.51585C13.9442 10.2917 13.3333 11.2167 13.3333 11.8334M20 6.00002H0"
                stroke="black" stroke-opacity="0.6" stroke-width="1.5" />
        </svg>
        <a href="{{ route('product.' . app()->getLocale()) }}" class="current-page">Məhsullar</a>
    </div>
    <div class="products-container p-lr">
        <h1 class="title">Məhsullar</h1>
        <form class="pro-top-filter">
            <div class="form-main">
                <div class="form-item">
                    <label for="">Kateqoriya</label>
                    <select name="category_id" id="">
                        <option value="">Seçim edin</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-item">
                    <label for="">Rəng</label>
                    <select name="color_id" id="">
                        <option value="">Seçim edin</option>
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}" {{ request('color_id') == $color->id ? 'selected' : '' }}>
                                {{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-item">
                    <label for="">Qiymət</label>
                    <div class="form-inputs">
                        <input type="number" value="{{ request('min_price') }}" name="min_price" id=""
                            placeholder="Min.">
                        <input type="number" value="{{ request('max_price') }}" name="max_price" id=""
                            placeholder="Max.">
                    </div>
                </div>
            </div>
            <button class="submitForm" type="submit">Axtar</button>
        </form>
        <div class="pro-bottom-filter">
            <p class="filter-result">
                <span>{{ count($all_products) }}</span>
                məhsul
            </p>
            <div class="sort-filter">
                <p>Sırala</p>
                <select name="sort" onchange="sort()" id="">
                    <option value="date_desc">Yenidən köhnəyə</option>
                    <option value="date_asc">Köhnədən yeniyə</option>
                    <option value="title_asc">A-dan Z-yə</option>
                    <option value="title_desc">Z-dən A-ya</option>
                </select>
            </div>
        </div>
        <div class="all-products">
            @include('front.pages.product.section.product', ['products' => $products])
        </div>
        @if (count($all_products) > 4)
            <a href="" onclick="more()" class="more_all_pro">Daha çox</a>
        @endif
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        function add_to_favorite(elem) {
            let id = elem.getAttribute('data-id');
            let lang = document.querySelector('html').getAttribute('lang');
            let url = `/${lang}/add-to-favorite/${id}`;
            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        '_token': "{{ csrf_token() }}"
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status == 'success') {
                        toastr.success(data.message)
                    } else {
                        toastr.error(data.message);
                    }
                });
        }
    </script>

    <script>
        let page = 1;

        function more() {
            event.preventDefault();
            page++;
            let category_id = document.querySelector('[name="category_id"]').value;
            let color_id = document.querySelector('[name="color_id"]').value;
            let min_price = document.querySelector('[name="min_price"]').value;
            let max_price = document.querySelector('[name="max_price"]').value;
            let sort = document.querySelector('[name="sort"]').value;
            let lang = document.querySelector('html').getAttribute('lang');
            let url =
                `/${lang}/product/filter?category_id=${category_id}&color_id=${color_id}&min_price=${min_price}&max_price=${max_price}&sort=${sort}&page=${page}`;
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    if (data.status == 'success') {
                        document.querySelector('.all-products').innerHTML = data.view;
                        document.querySelector('.more_all_pro').style.display = 'none';
                    }
                });
        }

        function sort() {
            let category_id = document.querySelector('[name="category_id"]').value;
            let color_id = document.querySelector('[name="color_id"]').value;
            let min_price = document.querySelector('[name="min_price"]').value;
            let max_price = document.querySelector('[name="max_price"]').value;
            let sort = document.querySelector('[name="sort"]').value;
            let lang = document.querySelector('html').getAttribute('lang');
            let url =
                `/${lang}/product/filter?category_id=${category_id}&color_id=${color_id}&min_price=${min_price}&max_price=${max_price}&sort=${sort}&page=${page}`;
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    if (data.status == 'success') {
                        document.querySelector('.all-products').innerHTML = data.view;
                    }
                });
        }
    </script>
@endpush
