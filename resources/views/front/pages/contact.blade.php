@extends('front.layouts.master')

@section('title', isset($settings['contact']) ? $settings['contact'] : 'İletişim')

@section('content')
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapper section-bg bg-cover"
        style="background-image: url('{{ asset('front/assets/img/breadcrumb-bg.jpg') }}')">
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ isset($settings['contact']) ? $settings['contact'] : 'İletişim' }}</h1>
                </div>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="{{ route('front.index') }}"> {{ nav_trans('home', 'Ana Sayfa') }} </a>
                    </li>
                    <li>
                        <i class="fa-regular fa-chevrons-right"></i>
                    </li>
                    <li>{{ isset($settings['contact']) ? $settings['contact'] : 'İletişim' }}</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Contact Section Start -->
    <section class="contact-section section-padding fix">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 wow fadeInUp" data-wow-delay=".3s">
                    <div class="contact-info-wrapper">
                        <h3>{{ isset($settings['contact_info']) ? $settings['contact_info'] : 'İletişim Bilgileri' }}</h3>
                        <ul class="contact-info-list">
                            <li>
                                <div class="icon">
                                    <i class="fa-regular fa-location-dot"></i>
                                </div>
                                <div class="text">
                                    <span>{{ isset($settings['address']) ? $settings['address'] : 'Adres' }}</span>
                                    <p>{{ isset($settings['address_value']) ? $settings['address_value'] : 'Örnekköy, Örnek Cad. No:123, İstanbul, Türkiye' }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa-regular fa-phone"></i>
                                </div>
                                <div class="text">
                                    <span>{{ isset($settings['phone']) ? $settings['phone'] : 'Telefon' }}</span>
                                    <p>{{ isset($settings['phone_number']) ? $settings['phone_number'] : '+90 123 456 7890' }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa-regular fa-envelope"></i>
                                </div>
                                <div class="text">
                                    <span>{{ isset($settings['email']) ? $settings['email'] : 'E-posta' }}</span>
                                    <p>{{ isset($settings['email_address']) ? $settings['email_address'] : 'info@example.com' }}</p>
                                </div>
                            </li>
                        </ul>
                        <div class="social-links">
                            <h4>{{ isset($settings['follow_us']) ? $settings['follow_us'] : 'Bizi Takip Edin' }}</h4>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 wow fadeInUp" data-wow-delay=".5s">
                    <div class="contact-form-wrap">
                        <h3>{{ isset($settings['send_message']) ? $settings['send_message'] : 'Bize Mesaj Gönderin' }}</h3>
                        <form id="contact-form" action="{{ route('front.storeMessage') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="{{ isset($settings['your_name']) ? $settings['your_name'] : 'Adınız' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="{{ isset($settings['your_email']) ? $settings['your_email'] : 'E-posta Adresiniz' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="{{ isset($settings['your_phone']) ? $settings['your_phone'] : 'Telefon Numaranız' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" placeholder="{{ isset($settings['your_message']) ? $settings['your_message'] : 'Mesajınız' }}" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="theme-btn">{{ isset($settings['send']) ? $settings['send'] : 'Gönder' }}</button>
                                </div>
                            </div>
                        </form>
                        <div class="form-response"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <div class="map-section">
        <div class="google-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3008.9633091899905!2d28.977141476238246!3d41.037238879097855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab7650656bd63%3A0x8ca058b28c20b6c3!2zVGFrc2ltIE1leWRhbsSxLCBHw7xtw7zFn3N1eXUsIDM0NDM1IEJleW_En2x1L8Swc3RhbmJ1bA!5e0!3m2!1str!2str!4v1711120005756!5m2!1str!2str" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endsection

@push('css')
<style>
    .contact-section {
        padding: 100px 0;
    }
    
    .contact-info-wrapper {
        background-color: #f8f9fa;
        padding: 40px;
        border-radius: 10px;
        height: 100%;
    }
    
    .contact-info-wrapper h3 {
        font-size: 24px;
        margin-bottom: 30px;
        font-weight: 600;
        color: #222;
    }
    
    .contact-info-list {
        list-style: none;
        padding: 0;
        margin: 0 0 30px;
    }
    
    .contact-info-list li {
        display: flex;
        margin-bottom: 25px;
    }
    
    .contact-info-list li:last-child {
        margin-bottom: 0;
    }
    
    .contact-info-list .icon {
        margin-right: 15px;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ff4747;
        color: #fff;
        font-size: 20px;
        border-radius: 50%;
    }
    
    .contact-info-list .text span {
        display: block;
        font-size: 14px;
        color: #777;
        margin-bottom: 5px;
    }
    
    .contact-info-list .text p {
        margin: 0;
        font-size: 16px;
        font-weight: 500;
        color: #222;
    }
    
    .social-links h4 {
        font-size: 18px;
        margin-bottom: 15px;
        font-weight: 600;
        color: #222;
    }
    
    .social-links ul {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .social-links ul li {
        margin-right: 10px;
    }
    
    .social-links ul li a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background-color: #fff;
        color: #333;
        border-radius: 50%;
        font-size: 16px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    
    .social-links ul li a:hover {
        background-color: #ff4747;
        color: #fff;
    }
    
    .contact-form-wrap {
        background-color: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 5px 30px rgba(0,0,0,0.05);
        height: 100%;
    }
    
    .contact-form-wrap h3 {
        font-size: 24px;
        margin-bottom: 30px;
        font-weight: 600;
        color: #222;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-control {
        height: 50px;
        border: 1px solid #e9e9e9;
        border-radius: 5px;
        padding: 0 20px;
        font-size: 15px;
        color: #666;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: #ff4747;
        box-shadow: none;
    }
    
    textarea.form-control {
        height: 150px;
        padding: 15px 20px;
        resize: none;
    }
    
    .theme-btn {
        background-color: #ff4747;
        color: #fff;
        border: none;
        padding: 12px 30px;
        font-size: 16px;
        font-weight: 500;
        border-radius: 5px;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .theme-btn:hover {
        background-color: #333;
    }
    
    .map-section {
        margin-bottom: -10px;
    }
    
    .google-map {
        height: 450px;
    }
    
    .google-map iframe {
        width: 100%;
        height: 100%;
        display: block;
    }
    
    @media (max-width: 991px) {
        .contact-info-wrapper {
            margin-bottom: 30px;
        }
    }
</style>
@endpush
