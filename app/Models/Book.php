<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'isbn',
        'penulis',
        'sinopsis',
        'contents',
        'tags',
        'categories_id',
    ];

    public function covers()
    {
        return $this->hasMany(BookCover::class, 'books_id', 'id');
    }
    
    public function category()
    {
        return $this->belongsTo(BookCategory::class, 'categories_id', 'id');
    }
}
