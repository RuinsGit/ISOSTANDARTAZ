<?php

if (!function_exists('get_image_url')) {
    /**
     * Resim URL'sini doğru şekilde oluşturan yardımcı fonksiyon
     *
     * @param string|null $path
     * @return string
     */
    function get_image_url($path = null)
    {
        if (empty($path)) {
            return asset('images/no-image.png');
        }

        // Eğer path zaten http ile başlıyorsa, doğrudan döndür
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        // Eğer path zaten public/storage ile başlıyorsa, bunu kaldır
        if (str_starts_with($path, 'public/storage/')) {
            $path = str_replace('public/storage/', '', $path);
        }

        // Eğer path zaten storage/ ile başlıyorsa
        if (str_starts_with($path, 'storage/')) {
            return asset($path);
        }

        // Normal storage path ise
        return asset('storage/' . $path);
    }
} 