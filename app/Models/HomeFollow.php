<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeFollow extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_az',
        'title_en',
        'title_ru',
        'name_az',
        'name_en',
        'name_ru',
        'link',
        'image',
        'status',
        'order'
    ];

    // Aksesörler
    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        $column = "title_" . $locale;
        
        return $this->{$column};
    }

    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        $column = "name_" . $locale;
        
        return $this->{$column};
    }

    // Scopelar
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
