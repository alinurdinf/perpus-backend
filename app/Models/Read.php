<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Read extends Model
{
    use HasFactory, SoftDeletes;
      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'users_id',
        'progress',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(ReadItem::class, 'reads_id', 'id');
    }

}