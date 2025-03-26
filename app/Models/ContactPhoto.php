<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactPhoto extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title_az',
        'title_en',
        'title_ru',
        'image_path',
        'image_alt',
        'status'
    ];
    
    // O anki dil için başlığı getiren accessor
    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'title_' . $locale};
    }
    
    // Resim URL'ini veren accessor
    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }
} 