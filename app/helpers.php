<?php

/**
 * Laravel uygulaması için helper fonksiyonlar
 */

if (!function_exists('public_path')) {
    /**
     * InfinityFree için public_path fonksiyonunu düzeltme
     */
    function public_path($path = '')
    {
        return rtrim(__DIR__, '/app') . '/public/' . ltrim($path, '/');
    }
} 