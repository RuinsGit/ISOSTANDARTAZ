@extends('back.layouts.master')

@section('title', __('Blog Türünü Redaktə Et'))

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ __('Blog Türünü Redaktə Et') }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Ana səhifə') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('back.pages.blog_types.index') }}">{{ __('Blog Türləri') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('Redaktə') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('back.pages.blog_types.update', $blogType->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Başlıq') }}</label>
                                    <input type="text" name="text" class="form-control @error('text') is-invalid @enderror" value="{{ old('text', $blogType->text) }}">
                                    @error('text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Status') }}</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="1" {{ $blogType->status ? 'selected' : '' }}>{{ __('Aktiv') }}</option>
                                        <option value="0" {{ !$blogType->status ? 'selected' : '' }}>{{ __('Deaktiv') }}</option>
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