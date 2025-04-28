@extends('back.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Blog Hero</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Ana Səhifə</a></li>
                                <li class="breadcrumb-item active">Blog Hero</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Blog Hero Listesi</h4>
                                <a href="{{ route('back.pages.blog-hero.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Yeni Ekle
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Resim</th>
                                            <th>Alt (AZ)</th>
                                            <th>Alt (EN)</th>
                                            <th>Alt (RU)</th>
                                            <th>Durum</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($blogHeroes as $hero)
                                            <tr>
                                                <td>{{ $hero->id }}</td>
                                                <td>
                                                    @if($hero->image_path)
                                                        <img src="{{ asset($hero->image_path) }}" alt="{{ $hero->alt_az }}" class="img-thumbnail" style="max-height: 100px">
                                                    @else
                                                        <span class="text-muted">Resim yok</span>
                                                    @endif
                                                </td>
                                                <td>{{ $hero->alt_az }}</td>
                                                <td>{{ $hero->alt_en }}</td>
                                                <td>{{ $hero->alt_ru }}</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" 
                                                            {{ $hero->status ? 'checked' : '' }}
                                                            onclick="window.location.href='{{ route('back.pages.blog-hero.toggle-status', $hero->id) }}'">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('back.pages.blog-hero.edit', $hero->id) }}" 
                                                           class="btn btn-info btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('back.pages.blog-hero.destroy', $hero->id) }}" 
                                                              method="POST" 
                                                              onsubmit="return confirm('Bu kaydı silmek istediğinizden emin misiniz?')"
                                                              style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Henüz kayıt bulunmuyor.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
