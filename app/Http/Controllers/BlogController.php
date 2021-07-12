<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    /**
     * S添加blog的頁面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd($categories);
        return view('blogs.create', ['categories' => $this->categories()]);
    }

    /**
     * 執行blog的添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * 查看一條blog，不用登入就能查看
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('blogs.show');
    }

    /**
     * 編輯頁面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('blogs.edit', ['categories' => $this->categories()]);
    }

    /**
     * 執行編輯
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     *改變blog狀態，發布or不發布
     */
    public function status($id)
    {
        dd($id);
    }

    /**
     * 刪除blog
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

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
