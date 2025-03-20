@foreach ($blogs as $blog)
    <a href="{{ route('blog-detail.' . app()->getLocale(), ['slug' => $blog->slug]) }}" class="news-cart">
        <div class="cart-img">
            <img src="{{ asset($blog->poster_image) }}" alt="{{ $blog->image_alt }}" title="{{ $blog->image_title }}">
        </div>
        <p class="news-cart-time">{{ $blog->date->format('d F Y') }}</p>
        <div class="cart-body">
            <h3>{{ $blog->title }}</h3>
            <span class="more">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.99989 13.9999L4.99976 5.00003L6.99976 5L6.99986 11.9999H14.5859V6.58581L21.0001 13L14.5859 19.4142V13.9999H4.99989Z"
                        fill="#B72636" />
                </svg>
                {{ $settings['see_more'] }}
            </span>
        </div>
    </a>
@endforeach
