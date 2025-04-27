<x-mail::message>
# Yeni İletişim Mesajı

Aşağıdaki bilgilerle yeni bir iletişim formu dolduruldu:

**İsim:** {{ $contactRequest->name }}

**E-posta:** {{ $contactRequest->email }}

@if($contactRequest->website)
**Website:** {{ $contactRequest->website }}
@endif

**Mesaj:**
{{ $contactRequest->comment }}

<x-mail::button :url="route('back.pages.contact-requests.index')">
Tüm Mesajları Görüntüle
</x-mail::button>

Saygılarımızla,<br>
{{ config('app.name') }}
</x-mail::message>
