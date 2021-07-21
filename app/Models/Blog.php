<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //事件，就像是生命週期事件一樣
    // protected static function booted()
    // {
    //     static::deleted(function ($blog) {
    //         info('您刪除了blog：' . $blog->title);
    //     });
    // }
}
