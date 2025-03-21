@extends('back.layouts.master')

@section('title', __('Blog Türləri'))

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ __('Blog Türləri') }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Ana səhifə') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('Blog Türləri') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <a href="{{ route('back.pages.blog_types.create') }}" class="btn btn-primary">{{ __('Yeni Blog Türü') }}</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0" id="blogTypesTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Başlıq') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Əməliyyatlar') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($blogTypes as $blogType)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $blogType->text }}</td>
                                            <td>{{ $blogType->status ? __('Aktiv') : __('Deaktiv') }}</td>
                                            <td>
                                                <a href="{{ route('back.pages.blog_types.edit', $blogType->id) }}" class="btn btn-primary btn-sm">{{ __('Redaktə') }}</a>
                                                <form action="{{ route('back.pages.blog_types.destroy', $blogType->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">{{ __('Sil') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
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

@push('js')
<script>
    $(document).ready(function() {
        $('#blogTypesTable').DataTable({
            responsive: true,
            language: {
                // DataTable dil ayarları
                url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/Azerbaijani.json'
            }
        });
    });
</script>
@endpush 