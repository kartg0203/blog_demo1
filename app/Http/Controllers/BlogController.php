<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Exception;
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
    public function store(BlogRequest $request)
    {
        // 方法一: 使用DB構造器添加
        // $res = DB::table('blogs')->insert([
        //     'title' => $request->input('title'),
        //     'category_id' => $request->input('category_id'),
        //     'content' => $request->input('content'),
        //     'user_id' => auth()->user()->id,
        // ]);
        // $res = true or false

        // 方法二: 使用model對象添加
        // $blog = new Blog();
        // $blog->title = $request->input('title');
        // $blog->category_id = $request->input('category_id');
        // $blog->content = $request->input('content');
        // $blog->user_id = auth()->id;
        // $res = $blog->save();
        // $res = true or false

        // 方法三: 使用批量賦值，必須要在模型類設置允許批量復職的屬性
        // Blog::create([
        //     'title' => $request->input('title'),
        //     'category_id' => $request->input('category_id'),
        //     'content' => $request->input('content'),
        //     'user_id' => auth()->user()->id,
        // ]);

        // 方法四: 永已存在的模型度向使用fill
        // $blog = new Blog();
        // $blog->fill([
        //     'title' => $request->input('title'),
        //     'category_id' => $request->input('category_id'),
        //     'content' => $request->input('content'),
        //     'user_id' => auth()->user()->id,
        // ]);
        // $res = $blog->save(); //使用fill要save才行

        // 方法五: 使用$request->all()
        // array_merge($request->except(['_token']), ['user_id' => auth()->id]);

        // ##我的寫法##
        $blog  = $request->validated();
        $res = auth()->user()->blogs()->create($blog);

        if ($res) {
            return redirect()->route('blogs.show', $res)->with('success', '文章新增成功');
        } else {
            return back()->with('warning', '文章新增失敗');
        }
        // return back()->with('success', '文章新增成功');
    }

    /**
     * 查看一條blog，不用登入就能查看
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $blog = Blog::where('id', $blog->id)->first();
        // 因為每次更新人數，updated_at都會更新一次，為了避免這樣，所以先設為不更新
        $blog->timestamps = false;
        // increment 自增
        $blog->increment('view');
        // 這裡要馬上開啟，因為timestamps為false時會變成string，我們有在blade調用時間方法(format之類的)，所以要馬上開啟，變回Carbon格式
        $blog->timestamps = true;
        // dd($blog);

        $comments = $blog->comments()->with('user')->paginate(5);
        // dump($comments);

        // dd($blog);
        return view('blogs.show', ['categories' => $this->categories(), 'blog' => $blog, 'comments' => $comments]);
    }

    /**
     * 編輯頁面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = auth()->user()->blogs()->findOrFail($id);

        return view('blogs.edit', ['categories' => $this->categories(), 'blog' => $blog]);
    }

    /**
     * 執行編輯
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $newBlog = $request->validated();
        $res = $blog->update($newBlog);

        if ($res) {
            return redirect()->route('blogs.show', $blog)->with('success', '文章更新成功');
        } else {
            return back()->with('warning', '文章更新失敗');
        }
    }

    /**
     *改變blog狀態，發布or不發布
     */
    public function status(Blog $blog)
    {
        $blog->status = ($blog->status == 1) ? 0 : 1;
        $res = $blog->save();

        if ($res) {
            $msg = ($blog->status == 1) ? '發布成功' : '取消發布';
            return response()->json(['state' => true, 'msg' => $msg]);
        } else {
            return response()->json(['state' => false, 'msg' => '修改失敗']);
        }
    }

    /**
     * 刪除blog
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        // 使用模型事件，刪除blog時自動刪除相關留言
        $res = $blog->delete();

        if ($res) {
            return response()->json(['state' => true, 'msg' => '刪除成功']);
        } else {
            return response()->json(['state' => false, 'msg' => '刪除失敗']);
        }


        // 使用事務刪除blog
        // DB::beginTransaction();
        // try {
        //     // 刪除blog
        //     $blog->delete();
        //     // 刪除blog相關留言
        //     $blog->comments()->delete();

        //     DB::commit();

        //     return response()->json(['state' => true, 'msg' => '刪除成功']);
        // } catch (\Exception $e) {
        //     // 出現異常，回滾事務
        //     DB::rollBack();
        //     return response()->json(['state' => false, 'msg' => '刪除失敗']);
        // }
    }

    // function categories()
    // {
    //     // 方法一: 檢查key存不存在，決定要不要查詢或緩存
    //     // 檢查緩存有沒有分類
    //     // $categories = cache('categories');

    //     // // 假如沒有就去資料庫抓出來，然後放進緩存裡
    //     // if (empty($categories)) {
    //     //     $categories = DB::table('categories')->pluck('name', 'id');
    //     //     cache(['categories' => $categories]);
    //     // }
    //     // return $categories;

    //     // 方法二: 使用rememberForever
    //     $categories = cache()->rememberForever('categories', function () {
    //         return $categories = DB::table('categories')->pluck('name', 'id');
    //     });
    //     return $categories;
    // }
}
