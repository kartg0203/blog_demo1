<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function categories()
    {
        // 方法一: 檢查key存不存在，決定要不要查詢或緩存
        // 檢查緩存有沒有分類
        // $categories = cache('categories');

        // // 假如沒有就去資料庫抓出來，然後放進緩存裡
        // if (empty($categories)) {
        //     $categories = DB::table('categories')->pluck('name', 'id');
        //     cache(['categories' => $categories]);
        // }
        // return $categories;

        // 方法二: 使用rememberForever
        $categories = cache()->rememberForever('categories', function () {
            return $categories = DB::table('categories')->pluck('name', 'id');
        });
        return $categories;
    }
}
