@extends('back.layouts.master')

@section('title', __('Yeni Blog Türü'))

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ __('Yeni Blog Türü') }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Ana səhifə') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('back.pages.blog_types.index') }}">{{ __('Blog Türləri') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('Yeni') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('back.pages.blog_types.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Başlıq') }}</label>
                                    <input type="text" name="text" class="form-control @error('text') is-invalid @enderror" value="{{ old('text') }}">
                                    @error('text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Status') }}</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="1">{{ __('Aktiv') }}</option>
                                        <option value="0">{{ __('Deaktiv') }}</option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">{{ __('Yadda saxla') }}</button>
                                        <a href="{{ route('back.pages.blog_types.index') }}" class="btn btn-secondary">{{ __('Ləğv et') }}</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 