<?php

/**
 * Sayfa çevirileri için yardımcı fonksiyon
 * 
 * @param string $key Çeviri anahtarı
 * @param string $default Varsayılan değer
 * @return string
 */
if (!function_exists('page_trans')) {
    function page_trans($key, $default = '')
    {
        $lang = app()->getLocale();
        $trans = \App\Models\TranslationManage::where('key', $key)
                ->where('status', 1)
                ->where('group', 'page')
                ->first();
                
        \Log::info('Translation Debug', [
            'key' => $key,
            'lang' => $lang,
            'trans' => $trans,
            'group' => 'page'
        ]);
                
        if ($trans) {
            $field = "value_" . $lang;
            return $trans->$field ?: $default;
        }
        
        return $default;
    }
}

/**
 * Navbar çevirileri için yardımcı fonksiyon
 * 
 * @param string $key Çeviri anahtarı
 * @param string $default Varsayılan değer
 * @return string
 */
function nav_trans($key, $default = '')
{
    $lang = app()->getLocale();
    $trans = \App\Models\TranslationManage::where('key', $key)
            ->where('status', 1)
            ->where('group', 'navbar')
            ->first();
            
    if ($trans) {
        $field = "value_" . $lang;
        return $trans->$field ?: $default;
    }
    
    return $default;
}

/**
 * Genel çeviriler için yardımcı fonksiyon
 * 
 * @param string $key Çeviri anahtarı
 * @param string $group Çeviri grubu
 * @param string $default Varsayılan değer
 * @return string
 */
function get_translation($key, $group = 'general', $default = '')
{
    $lang = app()->getLocale();
    $trans = \App\Models\TranslationManage::where('key', $key)
            ->where('status', 1)
            ->where('group', $group)
            ->first();
            
    if ($trans) {
        $field = "value_" . $lang;
        return $trans->$field ?: $default;
    }
    
    return $default;
}

if (!function_exists('trans_text')) {
    function trans_text($key, $group = 'general')
    {
        $lang = app()->getLocale();
        $trans = \App\Models\TranslationManage::where('key', $key)
                ->where('status', 1)
                ->where('group', $group)
                ->first();
                
        if ($trans) {
            $field = "value_" . $lang;
            return $trans->$field ?: $key;
        }
        
        return $key;
    }
} 