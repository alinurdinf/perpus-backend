<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'headline',
        'contents',
        'url',
    ];
    public function getUrlAttribute($url)
    {
        return config('app.url') . Storage::url($url);
    }

}
