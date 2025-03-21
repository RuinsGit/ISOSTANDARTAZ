<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranslationManage extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value_en',
        'value_az',
        'value_ru',
        'status'
    ];

    // Varsayılan çeviriler
    public static $defaults = [
        'home' => 'Ana Sayfa',
        'about' => 'Hakkımızda',
        'services' => 'Hizmetler',
        'products' => 'Ürünler',
        'blog' => 'Blog',
        'news' => 'Haberler',
        'contact' => 'İletişim',
        // ... other translations ...
    ];

    public function getValueAttribute()
    {
        return $this->getAttribute('value_' . app()->getLocale());
    }
}
