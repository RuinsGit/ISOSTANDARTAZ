@extends('back.layouts.master')

@section('title', __('Bloglar'))

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ __('Bloglar') }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Ana səhifə') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('Bloglar') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <form action="{{ route('back.pages.blogs.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="{{ __('Axtarış...') }}" value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit">{{ __('Axtar') }}</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('back.pages.blogs.index') }}" method="GET">
                        <div class="input-group">
                            <select name="blog_type_id" class="form-control">
                                <option value="">{{ __('Blog Türü Seçin') }}</option>
                                @foreach($blogTypes as $blogType)
                                    <option value="{{ $blogType->id }}" {{ request('blog_type_id') == $blogType->id ? 'selected' : '' }}>{{ $blogType->text }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary" type="submit">{{ __('Filtrele') }}</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('back.pages.blogs.index') }}" method="GET">
                        <div class="input-group">
                            <select name="is_popular" class="form-control">
                                <option value="">{{ __('Popüler Bloglar') }}</option>
                                <option value="1" {{ request('is_popular') == '1' ? 'selected' : '' }}>{{ __('Bəli') }}</option>
                                <option value="0" {{ request('is_popular') == '0' ? 'selected' : '' }}>{{ __('Xeyr') }}</option>
                            </select>
                            <button class="btn btn-primary" type="submit">{{ __('Filtrele') }}</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('Bloglar') }}</h4>
                            <div class="mb-3">
                                <a href="{{ route('back.pages.blogs.create') }}" class="btn btn-primary">
                                    <i class="mdi mdi-plus me-1"></i> {{ __('Yeni Blog') }}
                                </a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Şəkil') }}</th>
                                            <th>{{ __('Alt Şəkil') }}</th>
                                            <th>{{ __('Başlıq') }}</th>
                                            <th>{{ __('Mətn') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Əməliyyatlar') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($blogs as $blog)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($blog->image)
                                                    <img src="{{ asset($blog->image) }}" alt="{{ __('Blog Şəkili') }}" class="img-thumbnail" style="width: 150px; height: 100px; object-fit: cover;">
                                                @else
                                                    <span class="text-muted">{{ __('Şəkil yoxdur') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($blog->bottom_image)
                                                    <img src="{{ asset($blog->bottom_image) }}" alt="{{ __('Alt Şəkil') }}" class="img-thumbnail" style="width: 150px; height: 100px; object-fit: cover;">
                                                @else
                                                    <span class="text-muted">{{ __('Şəkil yoxdur') }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $blog->title_az }}</td>
                                            <td>
                                                <div style="max-height: 100px; overflow: auto;">
                                                    {!! $blog->description_az !!}
                                                </div>
                                            </td>
                                            <td>
                                                <form action="{{ route('back.pages.blogs.toggle-status', $blog->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-{{ $blog->status ? 'success' : 'danger' }}">
                                                        {{ $blog->status ? __('Aktiv') : __('Deaktiv') }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('back.pages.blogs.edit', $blog->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('back.pages.blogs.destroy', $blog->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
