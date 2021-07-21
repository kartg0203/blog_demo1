<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use GlobIterator;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {

        // dd($request->query('category_id'));
        // 搜尋關鍵字
        $keyword = $request->query('keyword');
        // 分類id
        $category_id = $request->query('category_id');

        $blogs = Blog::when($keyword, function ($query, $keyword) {
            // dd($query);
            // return $query->where('title', 'like', '%' . $keyword . '%');

            // return $query->where('title', 'like', "%{$keyword}%")
            //     ->orWhere('content', 'like', "%{$keyword}%");
            // 這裡keyword要用use 不然抓不到
            return $query->where(function ($query) use ($keyword) {
                return $query->where('title', 'like', "%{$keyword}%")
                    ->orWhere('content', 'like', "%{$keyword}%");
            });
        })
            ->when($category_id, function ($query, $category_id) {
                return $query->where('category_id', $category_id);
            })
            ->where('status', 1)->with(['user:id,name', 'category:id,name'])->latest()
            ->paginate(7);
        // ->dd();
        // dd($blogs);

        return view('index.index', ['blogs' => $blogs, 'categories' => $this->categories()]);
    }
}
