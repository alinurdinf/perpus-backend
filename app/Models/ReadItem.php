<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'books_id', 'reads_id'
    ]; 

    public function books()
    {
        return $this->hasOne(Book::class, 'id', 'books_id');
    }
}
