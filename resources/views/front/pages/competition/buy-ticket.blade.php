@extends('front.layouts.master')

@section('title', $settings['payment'])

@section('content')
    <div class="page-direction p-lr">
        <a href="{{ route('home.' . app()->getLocale()) }}" class="prev-page">{{ $settings['home'] }}</a>
        <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M13.3333 0.166687C13.3333 0.78502 13.9442 1.70835 14.5625 2.48335C15.3575 3.48335 16.3075 4.35585 17.3967 5.02169C18.2133 5.52085 19.2033 6.00002 20 6.00002M20 6.00002C19.2033 6.00002 18.2125 6.47919 17.3967 6.97835C16.3075 7.64502 15.3575 8.51752 14.5625 9.51585C13.9442 10.2917 13.3333 11.2167 13.3333 11.8334M20 6.00002H0"
                stroke="black" stroke-opacity="0.6" stroke-width="1.5" />
        </svg>
        <a href="{{ route('buy-ticket.' . app()->getLocale(), ['slug' => $comp->slug]) }}"
            class="current-page">{{ $settings['payment'] }}</a>
    </div>
    <div class="buy-ticket-container p-lr">

        <h1>{{ $settings['enter_the_information'] }}</h1>
        <span class="step-level"></span>
        <div class="buy-ticket">
            <div class="buy-ticket-left">
                <div class="previewCompetition">
                    <span class="previewTitle">{{ $comp->title }}</span>
                    <div class="preview-buyTicket">
                        <div class="buyTicket-cart">
                            <div class="body-img">
                                <img src="{{ asset($comp->image) }}" alt="">
                            </div>
                            <div class="buyTicket-body">
                                <h2>{{ $comp->title }}</h2>
                                <p>{{ $comp->datetime->format('d F Y H:i') }}</p>
                            </div>
                        </div>
                        {{-- <div class="counter-container">
                            <span class="counter">1</span>
                            <div class="counter-buttons">
                                <button class="increase-btn" type="button">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.75829 7.36669L4.45829 10.6667L3.51562 9.72402L7.75829 5.48135L12.001 9.72402L11.0583 10.6667L7.75829 7.36669Z"
                                            fill="black" />
                                    </svg>
                                </button>
                                <button class="decrease-btn" type="button">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.24171 8.63331L11.5417 5.33331L12.4844 6.27598L8.24171 10.5186L3.99904 6.27598L4.94171 5.33331L8.24171 8.63331Z"
                                            fill="black" />
                                    </svg>
                                </button>
                            </div>
                        </div> --}}
                        <div class="ticket-price">
                            <span>{{ $comp->price }}</span> AZN
                        </div>
                    </div>
                </div>
                @foreach ($comp->packages as $competition_package)
                    <div class="previewClothes">
                        <div class="previewHead">
                            <span class="previewTitle">{{ $competition_package->title }}</span>
                            <input type="checkbox" class="competition_package_id" onchange="change_total_price(this)"
                                value="{{ $competition_package->id }}" data-price="{{ $competition_package->price }}">
                        </div>
                        <div class="preview-buyClothes">
                            <div class="buyClothes-cart">
                                <div class="body-img">
                                    <img src="{{ asset($competition_package->image) }}" alt="{{ $comp->image_alt }}"
                                        title="{{ $comp->image_title }}">
                                </div>
                                <div class="buyClothes-body">
                                    <h2>{{ $competition_package->sub_title }}</h2>
                                    <p><span></span></p>
                                </div>
                            </div>
                            <div class="clothes-price">
                                <span>{{ $competition_package->price }}</span> AZN
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="buy-ticket-checkOut">
                <h2>{{ $settings['user_info'] }}</h2>
                <form action="{{ route('buy-ticket', ['slug' => $comp->slug]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="competition_package_id" value="">
                    <input type="hidden" name="size">
                    <div class="form-inputs">
                        <div class="form-input-item">
                            <label for="">{{ $settings['firstname'] }} {{ $settings['lastname'] }}</label>
                            <input type="text" name="name"
                                value="{{ old('name', auth()->guard('web')->user()?->name) }}">
                        </div>
                        <div class="form-input-item">
                            <label for="">{{ $settings['gender'] }}</label>
                            <select name="gender" class="form-group-item" style="width:100%;">
                                <option value="Kişi">{{ $settings['male'] }}</option>
                                <option value="Qadın">{{ $settings['female'] }}</option>
                            </select>
                        </div>
                        <div class="form-input-item">
                            <label for="">{{ $settings['birthday'] }}</label>
                            <input type="date" name="birthday" value="{{ old('birthday') }}">
                        </div>
                        <div class="form-input-item">
                            <label for="">{{ $settings['team'] }}</label>
                            <input type="text" name="team" value="{{ old('team') }}">
                        </div>
                        <div class="form-input-item">
                            <label for="">{{ $settings['contact_phone'] }}</label>
                            <input type="text" name="phone"
                                value="{{ old('phone', auth()->guard('web')->user()?->phone) }}">
                        </div>
                        <div class="form-input-item">
                            <label for="">{{ $settings['email'] }}</label>
                            <input type="email" name="email"
                                value="{{ old('email', auth()->guard('web')->user()?->email) }}">
                        </div>
                        <div class="check_terms">
                            <input type="checkbox" required name="accept_privacy_policy" value="on">
                            <p>{!! $settings['accept_privacy_policy'] !!}</p>
                        </div>
                    </div>
                    <div class="totalTicketPrice">
                        {{ $settings['total_price'] }}: <p>
                            <span>{{ $comp->price ?? '0' }}</span> AZN
                        </p>
                    </div>
                    <button class="pay" type="submit">{{ $settings['pay'] }}</button>
                </form>
            </div>
        </div>
    </div>
    <div class="clothesSize-modal-container" style="display: none;">
        <div class="clothesSize-modal">
            <div class="clothesSize-modal-top">
                <h2>Ölçünü seç</h2>
                <button class="closeClothesModal" data-id="" type="button">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_938_4991)">
                            <path d="M18 6L6 18" stroke="black" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M6 6L18 18" stroke="black" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_938_4991">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </div>
            <div class="clothesSize-modal-preview">
                <div class="modal-preview-img">
                    <img src="" alt="">
                </div>
                <div class="modal-preview-body">
                    <h3>Nike Köynək</h3>
                    <p>250 <span>AZN</span></p>
                </div>
            </div>
            <div class="clothesSize-modal-sizes">
                <div class="clothesSize-sizeItem">
                    <span>XS</span>
                    <input type="radio" name="sizeItemModal">
                </div>
            </div>
            <button class="modalAddSize" onclick="add_package()">Əlavə et</button>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        function change_total_price(item) {
            let lang = document.querySelector('html').getAttribute('lang');
            let total_price = parseFloat(document.querySelector('.totalTicketPrice span').innerText);
            let price = parseFloat(item.getAttribute('data-price'));
            let competition_package_ids = get_competition_package_ids();
            let checked = item.checked;
            let modal = document.querySelector('.clothesSize-modal-container');
            let id = item.value;
            let url = `/${lang}/competition/${id}/get-package`;
            if (!checked) {
                total_price -= price;
            } else {
                total_price += price;
            }

            document.querySelector('[name="competition_package_id"]').value = competition_package_ids;
            document.querySelector('.totalTicketPrice span').innerText = total_price.toFixed(2);

            if (checked) modal.style.display = 'flex';
            else modal.style.display = 'none';

            fetch(url)
                .then(res => res.json())
                .then(data => {
                    if (data.status == 'success') {
                        document.querySelector('.modal-preview-img img').setAttribute('src', data.data.image);
                        document.querySelector('.modal-preview-body h3').innerText = data.data.title;
                        document.querySelector('.closeClothesModal').setAttribute('data-id', id);
                        document.querySelector('.modal-preview-body p').innerHTML =
                            `${data.data.price} <span>AZN</span>`;
                        let sizes = document.querySelector('.clothesSize-modal-sizes');
                        sizes.innerHTML = '';
                        data.data.sizes.forEach(size => {
                            sizes.innerHTML += `
                            <div class="clothesSize-sizeItem">
                                <span>${size.name}</span>
                                <input type="radio" name="sizeItemModal">
                            </div>`;
                        });
                    }
                });
        }

        function get_competition_package_ids() {
            let arr = [];
            let competition_package_ids = document.querySelectorAll('.competition_package_id');
            competition_package_ids.forEach(package_id => {
                if (package_id.checked) arr.push(package_id.value);
            });
            return arr;
        }

        function add_package() {
            let sizes = document.querySelectorAll('.clothesSize-sizeItem');
            if (sizes.length > 0) {
                let checkedSize = document.querySelector('.clothesSize-sizeItem input:checked');
                if (checkedSize == null) toastr.error('Ölçü seçin');
                else {
                    toastr.success('Məhsul əlavə olundu');
                    let size = checkedSize.parentElement.querySelector('span').innerText;
                    document.querySelector('[name="size"]').value = size;
                    document.querySelector('.buyClothes-body span').innerText = size;
                    document.querySelector('.clothesSize-modal-container').style.display = 'none';
                }

            } else {
                toastr.success('Məhsul əlavə olundu');
                document.querySelector('.clothesSize-modal-container').style.display = 'none';
            }
        }

        document.querySelector('.closeClothesModal').addEventListener('click', function(e) {
            e.preventDefault();
            let checkedSize = document.querySelector('.clothesSize-sizeItem input:checked');
            let id = this.getAttribute('data-id');
            let competition_package_id = document.querySelector(`[value="${id}"]`);
            if (checkedSize == null) competition_package_id.checked = false;
        });
    </script>

    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>

    <script>
        function accept_policy(item) {
            if (item.checked) document.querySelector('.pay').disabled = false;
            else document.querySelector('.pay').disabled = true;
        }
    </script>
@endpush
