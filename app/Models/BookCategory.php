<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 
    ];    

    public function books()
    {
        return $this->hasMany(Book::class, 'categories_id', 'id');
    }
}
