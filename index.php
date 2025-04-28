<?php
/**
 * InfinityFree için Laravel yönlendirme dosyası
 */

// Hata ayıklama için
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Bakım modu kontrolü
 */
if (file_exists(__DIR__ . '/storage/framework/maintenance.php')) {
    require __DIR__ . '/storage/framework/maintenance.php';
}

/**
 * Autoloader kaydı
 */
require __DIR__ . '/vendor/autoload.php';

/**
 * Uygulamayı çalıştır
 */
$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response); 