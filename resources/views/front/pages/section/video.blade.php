@foreach ($videos as $video)
    @php
        $video_url = preg_match('/src=["\']([^"\']+)["\']/', $video->url, $matches);
        $url = isset($matches[1]) ? $matches[1] : '';
        if (strpos($url, '//') === 0) {
            $url = 'https:' . $url;
        }
    @endphp
    <div class="video-item">
        <iframe width="560" height="315" src="{{ $url }}" title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
@endforeach
