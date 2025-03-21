<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogType extends Model
{
    protected $fillable = ['text', 'status'];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
} 