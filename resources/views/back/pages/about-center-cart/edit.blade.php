@extends('back.layouts.master')
@section('title', 'Mərkəz Haqqında Düzənlə')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Mərkəz Haqqında Düzənlə</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('back.pages.index') }}">Ana Səhifə</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('back.pages.about-center-cart.index') }}">Mərkəz Haqqında</a></li>
                        <li class="breadcrumb-item active">Düzənlə</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="editForm" method="POST" action="{{ route('back.pages.about-center-cart.update', $cart->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <div class="mb-3">
                            <label for="image" class="form-label">Şəkil</label>
                            @if($cart->image)
                                <div class="mb-2">
                                    <img src="{{ asset($cart->image) }}" alt="Mevcut Resim" class="img-thumbnail" style="max-height: 150px;">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#az" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Azərbaycan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#en" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">English</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#ru" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Русский</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="az" role="tabpanel">
                                <div class="mb-3">
                                    <label for="title_az" class="form-label">Başlıq (AZ)</label>
                                    <input type="text" class="form-control @error('title_az') is-invalid @enderror" id="title_az" name="title_az" value="{{ old('title_az', $cart->title_az) }}">
                                    @error('title_az')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description_az" class="form-label">Təsvir (AZ)</label>
                                    <textarea class="form-control @error('description_az') is-invalid @enderror" id="description_az" name="description_az" rows="10">{{ old('description_az', $cart->description_az) }}</textarea>
                                    @error('description_az')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="tab-pane" id="en" role="tabpanel">
                                <div class="mb-3">
                                    <label for="title_en" class="form-label">Title (EN)</label>
                                    <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en" value="{{ old('title_en', $cart->title_en) }}">
                                    @error('title_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description_en" class="form-label">Description (EN)</label>
                                    <textarea class="form-control @error('description_en') is-invalid @enderror" id="description_en" name="description_en" rows="10">{{ old('description_en', $cart->description_en) }}</textarea>
                                    @error('description_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="tab-pane" id="ru" role="tabpanel">
                                <div class="mb-3">
                                    <label for="title_ru" class="form-label">Заголовок (RU)</label>
                                    <input type="text" class="form-control @error('title_ru') is-invalid @enderror" id="title_ru" name="title_ru" value="{{ old('title_ru', $cart->title_ru) }}">
                                    @error('title_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description_ru" class="form-label">Описание (RU)</label>
                                    <textarea class="form-control @error('description_ru') is-invalid @enderror" id="description_ru" name="description_ru" rows="10">{{ old('description_ru', $cart->description_ru) }}</textarea>
                                    @error('description_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Yadda Saxla</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    textarea {
        resize: vertical;
    }
</style>
@endpush

@push('js')
@endpush
