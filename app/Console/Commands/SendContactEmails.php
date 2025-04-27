<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ContactRequest;
use Illuminate\Support\Facades\Log;

class SendContactEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:send-emails {--limit=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kayıtlı iletişim mesajlarını e-posta olarak gönderir';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $limit = $this->option('limit');
        $this->info("İşlem başlatılıyor. İşlenecek maksimum kayıt sayısı: $limit");
        
        // İşlenmemiş mesajları al
        $messages = ContactRequest::where('status', false)
            ->latest()
            ->limit($limit)
            ->get();
            
        if ($messages->isEmpty()) {
            $this->info('Gönderilecek mesaj bulunamadı.');
            return;
        }
        
        $this->info($messages->count() . ' adet mesaj bulundu. Gönderim başlıyor...');
        
        $success = 0;
        $failed = 0;
        
        foreach ($messages as $message) {
            try {
                // E-posta içeriğini oluştur
                $toEmail = 'ruhinmuseyibli31@gmail.com'; // Alıcı e-posta
                $subject = 'Yeni İletişim Formu Mesajı';
                $body = "Yeni İletişim Mesajı\n\n";
                $body .= "İsim: " . $message->name . "\n";
                $body .= "E-posta: " . $message->email . "\n";
                
                if ($message->website) {
                    $body .= "Website: " . $message->website . "\n";
                }
                
                $body .= "Mesaj:\n" . $message->comment . "\n";
                
                // E-postayı gönder
                $headers = "From: noreply@example.com\r\n";
                
                // E-posta başarılı mı
                $emailSent = mail($toEmail, $subject, $body, $headers);
                
                if ($emailSent) {
                    $message->status = true;
                    $message->save();
                    $this->info("Mesaj gönderildi: ID #" . $message->id);
                    $success++;
                } else {
                    $this->error("Mesaj gönderimi başarısız: ID #" . $message->id);
                    $failed++;
                }
            } catch (\Exception $e) {
                $this->error("Hata: " . $e->getMessage());
                Log::error("İletişim e-posta gönderimi hatası: " . $e->getMessage());
                $failed++;
            }
        }
        
        $this->info("İşlem tamamlandı. Başarılı: $success, Başarısız: $failed");
    }
}
