<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title_az',
        'title_en',
        'title_ru',
        'description_az',
        'description_en',
        'description_ru',
        'image',
        'bottom_image',
        'status',
        'is_popular',
        'blog_type_id',
        'text_az',
        'text_en',
        'text_ru'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function getTitleAttribute()
    {
        return $this->{'title_' . app()->getLocale()};
    }

    public function getDescriptionAttribute()
    {
        return $this->{'description_' . app()->getLocale()};
    }

    public function blogType()
    {
        return $this->belongsTo(BlogType::class);
    }
} 