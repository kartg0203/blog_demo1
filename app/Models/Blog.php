<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function getUpdatedAtAttribute()
    {
        // $a =  $this->comments()->first()->updated_at;
        // dd($this->comments->pluck('updated_at')->last());
        if ($this->comments->pluck('updated_at')->last()) {
            return Carbon::parse($this->comments->pluck('updated_at')->last())->diffForHumans();
        } else {
            return "暫無回復";
        }
    }

    //事件，就像是生命週期事件一樣
    // protected static function booted()
    // {
    //     static::deleted(function ($blog) {
    //         info('您刪除了blog：' . $blog->title);
    //     });
    // }
}
