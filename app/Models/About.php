<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title_az',
        'title_en',
        'title_ru',
        'description_az',
        'description_en',
        'description_ru',
        'image',
        'icon',
        'status',
    ];
    
    // Aksesörler
    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        $column = "title_" . $locale;
        
        return $this->{$column};
    }

    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        $column = "description_" . $locale;
        
        return $this->{$column};
    }

    // Scopelar
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
