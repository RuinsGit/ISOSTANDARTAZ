<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactRequestController extends Controller
{
    public function index()
    {
        $requests = ContactRequest::latest()->paginate(10);
        return view('back.admin.contact-requests.index', compact('requests'));
    }

    public function show(ContactRequest $contactRequest)
    {
        return view('back.admin.contact-requests.show', compact('contactRequest'));
    }

    public function destroy(ContactRequest $contactRequest)
    {
        $contactRequest->delete();
        return back()->with('success', 'Sorğu uğurla silindi');
    }

    public function toggleStatus($id)
    {
        $request = ContactRequest::findOrFail($id);
        $request->status = !$request->status;
        $request->save();
        return back()->with('success', 'Status uğurla dəyişdirildi');
    }
    
    public function sendTestEmail(Request $request, $id)
    {
        try {
            // İlgili mesajı bul
            $contactRequest = ContactRequest::findOrFail($id);
            
            // Test e-postası için alıcı
            $toEmail = $request->input('test_email', 'ruhinmuseyibli31@gmail.com');
            
            // E-posta içeriğini oluştur (düz metin kullanıyoruz)
            $subject = 'Test: İletişim Formu Mesajı';
            $body = "TEST E-POSTA - İletişim Mesajı\n\n";
            $body .= "İsim: " . $contactRequest->name . "\n";
            $body .= "E-posta: " . $contactRequest->email . "\n";
            
            if ($contactRequest->website) {
                $body .= "Website: " . $contactRequest->website . "\n";
            }
            
            $body .= "Mesaj:\n" . $contactRequest->comment . "\n\n";
            $body .= "-----\nBu bir test e-postasıdır. " . now() . " tarihinde gönderilmiştir.";
            
            // E-posta başlıklarını ayarla
            $headers = "From: noreply@example.com\r\n";
            $headers .= "Reply-To: noreply@example.com\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();
            
            Log::info("Test e-postası gönderiliyor: {$toEmail}");
            
            // E-postayı gönder
            $result = mail($toEmail, $subject, $body, $headers);
            
            if ($result) {
                Log::info("Test e-postası başarıyla gönderildi");
                return back()->with('success', 'Test e-postası başarıyla gönderildi: ' . $toEmail);
            } else {
                Log::error("Test e-postası gönderilemedi");
                return back()->with('error', 'Test e-postası gönderilemedi. Lütfen sunucu loglarını kontrol edin.');
            }
        } catch (\Exception $e) {
            Log::error("Test e-postası gönderim hatası: " . $e->getMessage());
            return back()->with('error', 'Hata: ' . $e->getMessage());
        }
    }
} 