@foreach ($competitions as $competition)
    <a href="{{ route('competition-detail.' . app()->getLocale(), ['slug' => $competition->slug]) }}"
        class="competition-cart"
        data-id="{{ $competition->datetime->format('YmdHis') > now()->format('YmdHis') ? 'held_racing' : 'finished_racing' }}"
        style="display: block;">
        <div class="cart-img">
            <img src="{{ asset($competition->poster_image) }}" alt="{{ $competition->image_alt }}"
                title="{{ $competition->image_title }}">
        </div>
        <p class="cart-price">{{ !is_null($competition->price) ? $competition->price . ' AZN' : 'Ödənişsiz' }}
        </p>
        <div class="cart-body">
            <span class="cart-date">{{ $competition->datetime->format('d F Y') }}</span>
            <h3>{{ $competition->title }}</h3>
            <p>{{ Str::limit($competition->content, 150, '...') }}</p>
            <span class="more">
                {{ $settings['see_more'] }}
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.99989 13.9999L4.99976 5.00003L6.99976 5L6.99986 11.9999H14.5859V6.58581L21.0001 13L14.5859 19.4142V13.9999H4.99989Z"
                        fill="#B72636" />
                </svg>
            </span>
        </div>
    </a>
@endforeach
