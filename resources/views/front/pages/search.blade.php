@extends('front.layouts.master')
@section('content')
    <div class="search-result-container p-lr">
        <h1 class="title">Axtarış nəticələri</h1>
        <div class="search-result-list">
            @foreach ($search_result as $result)
                <a href="{{ $result['url'] }}" class="search-result-item">{{ $result['title'] }}</a>
            @endforeach
        </div>
    </div>
@endsection
