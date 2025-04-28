@extends('back.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Blog Hero Düzenle</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Ana Səhifə</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('back.pages.blog-hero.index') }}">Blog Hero</a></li>
                                <li class="breadcrumb-item active">Düzenle</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('back.pages.blog-hero.update', $blogHero->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <!-- Mevcut Resim -->
                                    @if($blogHero->image_path)
                                        <div class="col-md-12 mb-3">
                                            <div class="current-image">
                                                <img src="{{ asset($blogHero->image_path) }}" alt="{{ $blogHero->alt_az }}" class="img-thumbnail" style="max-height: 200px">
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Hero Şəkli</label>
                                            <input type="file" class="form-control" name="image" accept=".png,.jpg,.jpeg,.gif,.svg">
                                            <small class="form-text text-muted">İzin verilen formatlar: PNG, JPG, JPEG, GIF, SVG. Maksimum boyut: 2MB</small>
                                            @if($blogHero->image_path)
                                                <small class="form-text text-muted">Yeni bir şəkil yükləyəniz, əvvəlki şəkil silinəcək.</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Alt Mətn (AZ)</label>
                                            <input type="text" class="form-control" name="alt_az" value="{{ $blogHero->alt_az }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Alt Mətn (EN)</label>
                                            <input type="text" class="form-control" name="alt_en" value="{{ $blogHero->alt_en }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Alt Mətn (RU)</label>
                                            <input type="text" class="form-control" name="alt_ru" value="{{ $blogHero->alt_ru }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="status" value="1" {{ $blogHero->status ? 'checked' : '' }}>
                                                <label class="form-check-label">Aktiv</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Güncelle</button>
                                    <a href="{{ route('back.pages.blog-hero.index') }}" class="btn btn-secondary">İptal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 