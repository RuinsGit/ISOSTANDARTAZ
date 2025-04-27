@extends('back.layouts.master')
@section('title', 'Sorğu Detayı')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <a href="{{ route('back.pages.contact-requests.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Siyahıya Qayıt
                            </a>
                        </div>


                        <div class="card">
                            <div class="card-header  text-white" style="background-color: #5bf91b; border-color: green; color: white">
                                <h6>Sorğu Detalları</h6>
                            </div>
                            <div class="card-body">
                                <p><strong>İsim:</strong> {{ $contactRequest->name ?? 'Belirtilmemiş' }}</p>
                                <p><strong>Email:</strong> {{ $contactRequest->email }}</p>
                                <p><strong>Website:</strong> {{ $contactRequest->website ?? '-' }}</p>
                                <p><strong>Şərh:</strong></p>
                                <div class="border p-3 rounded">
                                    {{ $contactRequest->comment }}
                                </div>
                                <p class="mt-3"><strong>Tarix:</strong> {{ $contactRequest->created_at->format('d.m.Y H:i') }}</p>
                                <p><strong>Durum:</strong> {!! $contactRequest->status ? '<span class="badge bg-success">Okundu</span>' : '<span class="badge bg-warning">Okunmadı</span>' !!}</p>
                            </div>
                        </div>
                        
                        <!-- Test Email Sending Card -->
                        <div class="card mt-4">
                            <div class="card-header text-white" style="background-color: #007bff; border-color: #0056b3; color: white">
                                <h6>Test E-postası Gönder</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('back.pages.contact-requests.send-test-email', $contactRequest->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="test_email" class="form-label">Alıcı E-posta Adresi</label>
                                        <input type="email" class="form-control" id="test_email" name="test_email" 
                                            value="ruhinmuseyibli31@gmail.com" required>
                                        <div class="form-text">Bu adrese test e-postası gönderilecektir.</div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-paper-plane me-2"></i>Test E-postası Gönder
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 