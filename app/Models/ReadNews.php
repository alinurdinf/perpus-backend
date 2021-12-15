<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReadNews extends Model
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

  public function news()
  {
      return $this->hasMany(News::class, 'news_id', 'id');
  }
}
