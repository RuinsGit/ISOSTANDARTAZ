<?php
/**
 * Bu script, hosting ortamında Laravel'in storage linkini oluşturmak için kullanılır
 * Bu dosyayı projenizin kök dizinine yükleyip tarayıcıdan çalıştırın
 */

echo "<h1>Storage Kurulum Aracı</h1>";

// 1. Storage dizinlerini oluştur
$storageAppPublic = __DIR__ . '/storage/app/public';
if (!is_dir($storageAppPublic)) {
    mkdir($storageAppPublic, 0755, true);
    echo "<p>✅ storage/app/public dizini oluşturuldu</p>";
} else {
    echo "<p>✓ storage/app/public dizini zaten mevcut</p>";
}

// 2. Public storage dizinini oluştur
$publicStorage = __DIR__ . '/public/storage';
if (!is_dir($publicStorage)) {
    mkdir($publicStorage, 0755, true);
    echo "<p>✅ public/storage dizini oluşturuldu</p>";
} else {
    echo "<p>✓ public/storage dizini zaten mevcut</p>";
}

// 3. Sembolik bağlantı oluşturmayı dene
$success = false;
try {
    if (function_exists('symlink')) {
        // Önce dizini kaldıralım, eğer varsa
        if (is_dir($publicStorage)) {
            rmdir($publicStorage);
        }
        
        // Sembolik bağlantı oluştur
        $success = symlink($storageAppPublic, $publicStorage);
        if ($success) {
            echo "<p>✅ Sembolik bağlantı başarıyla oluşturuldu!</p>";
        } else {
            echo "<p>❌ Sembolik bağlantı oluşturulamadı, alternatif yönteme geçiliyor...</p>";
        }
    } else {
        echo "<p>⚠️ symlink fonksiyonu PHP yapılandırmanızda bulunmuyor, alternatif yönteme geçiliyor...</p>";
    }
} catch (Exception $e) {
    echo "<p>❌ Hata: " . $e->getMessage() . "</p>";
    echo "<p>Alternatif yönteme geçiliyor...</p>";
}

// 4. Eğer sembolik bağlantı oluşturulamadıysa, klasörleri kopyalayacak bir işlev oluştur
if (!$success) {
    echo "<p>Dosyalar kopyalanıyor...</p>";
    
    // Özyinelemeli kopyalama fonksiyonu
    function copyDirectory($source, $destination) {
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }
        
        $dir = opendir($source);
        while (($file = readdir($dir)) !== false) {
            if ($file != '.' && $file != '..') {
                $srcFile = $source . '/' . $file;
                $destFile = $destination . '/' . $file;
                
                if (is_dir($srcFile)) {
                    copyDirectory($srcFile, $destFile);
                } else {
                    copy($srcFile, $destFile);
                }
            }
        }
        closedir($dir);
        return true;
    }
    
    // Eğer dizin varsa temizle
    if (is_dir($publicStorage)) {
        // İçeriği temizle
        $files = glob($publicStorage . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            } elseif (is_dir($file)) {
                // Özyinelemeli dizin silme
                $dirFiles = new RecursiveIteratorIterator(
                    new RecursiveDirectoryIterator($file, RecursiveDirectoryIterator::SKIP_DOTS),
                    RecursiveIteratorIterator::CHILD_FIRST
                );
                
                foreach ($dirFiles as $dirFile) {
                    $path = $dirFile->getRealPath();
                    if ($dirFile->isDir()) {
                        rmdir($path);
                    } else {
                        unlink($path);
                    }
                }
                rmdir($file);
            }
        }
    }
    
    // Yeniden oluştur
    if (copyDirectory($storageAppPublic, $publicStorage)) {
        echo "<p>✅ Dosyalar başarıyla kopyalandı!</p>";
    } else {
        echo "<p>❌ Dosya kopyalama başarısız oldu.</p>";
    }
}

// 5. .htaccess dosyasını public klasörüne ekle
$htaccessContent = <<<EOT
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
EOT;

$publicHtaccess = __DIR__ . '/public/.htaccess';
if (!file_exists($publicHtaccess)) {
    file_put_contents($publicHtaccess, $htaccessContent);
    echo "<p>✅ .htaccess dosyası public klasörüne eklendi</p>";
} else {
    echo "<p>✓ .htaccess dosyası zaten mevcut</p>";
}

// 6. FileSystem disk ayarını kontrol et
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    $envContent = file_get_contents($envFile);
    if (strpos($envContent, 'FILESYSTEM_DISK=') === false) {
        // .env dosyasına FILESYSTEM_DISK=public ekle
        $envContent .= "\nFILESYSTEM_DISK=public\n";
        file_put_contents($envFile, $envContent);
        echo "<p>✅ .env dosyasına FILESYSTEM_DISK=public eklendi</p>";
    } else if (strpos($envContent, 'FILESYSTEM_DISK=public') === false) {
        // FILESYSTEM_DISK var ama public değil, değiştir
        $envContent = preg_replace('/FILESYSTEM_DISK=.*/', 'FILESYSTEM_DISK=public', $envContent);
        file_put_contents($envFile, $envContent);
        echo "<p>✅ FILESYSTEM_DISK değeri public olarak güncellendi</p>";
    } else {
        echo "<p>✓ FILESYSTEM_DISK zaten public olarak ayarlanmış</p>";
    }
} else {
    echo "<p>⚠️ .env dosyası bulunamadı, lütfen dosyayı oluşturup FILESYSTEM_DISK=public satırını ekleyin</p>";
}

echo "<h2>Kurulum Tamamlandı!</h2>";
echo "<p>Eğer hala sorun yaşıyorsanız, lütfen hosting sağlayıcınızla iletişime geçin.</p>";
echo "<p><a href='/'>Ana Sayfaya Dön</a></p>"; 