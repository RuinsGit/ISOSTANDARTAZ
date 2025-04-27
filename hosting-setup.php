<?php
// Bu dosya hosting ortamında storage:link komutunu çalıştırmak için kullanılır

$targetFolder = __DIR__ . '/storage/app/public';
$linkFolder = __DIR__ . '/public/storage';

if (file_exists($linkFolder)) {
    echo "Sembolik bağlantı zaten mevcut!";
    exit;
}

// Sembolik bağlantı oluşturmayı deneyelim
if (symlink($targetFolder, $linkFolder)) {
    echo "Sembolik bağlantı başarıyla oluşturuldu!";
} else {
    // Sembolik bağlantı oluşturulamadıysa, klasörü kopyalayalım
    echo "Sembolik bağlantı oluşturulamadı, dosyaları kopyalama yöntemi deneniyor...<br>";
    
    if (!file_exists($linkFolder)) {
        mkdir($linkFolder, 0755, true);
    }
    
    // Basit bir dosya kopyalama fonksiyonu
    function copyDir($src, $dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while (($file = readdir($dir)) !== false) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    copyDir($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }
    
    copyDir($targetFolder, $linkFolder);
    echo "Dosyalar kopyalandı!";
} 