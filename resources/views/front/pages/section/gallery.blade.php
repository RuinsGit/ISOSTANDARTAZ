@foreach ($galleries as $gallery)
    <a href="{{ route('gallery-detail.' . app()->getLocale(), ['slug' => $gallery->slug]) }}" class="images_from_race">
        <div class="cart-body">
            <h3>{{ $gallery->title }}</h3>
            <p>{{ $gallery->date->format('d F Y') }}</p>
        </div>
        <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->image_alt }}" title="{{ $gallery->image_title }}">
    </a>
@endforeach
