<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Mail\BlogCommentMail;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CommentRequest $request, Blog $blog)
    {
        // dd($blog->id);
        // dd($request->all());

        // 返回一個Comment對象
        $comment = auth()->user()->comments()->create(['blog_id' => $blog->id, 'content' => $request->content]);
        if ($comment) {
            $data = [
                'user_avatar' => auth()->user()->avatar,
                'user_name' => auth()->user()->name,
                'comment' => $comment->content,
            ];
            //發送郵件，通知作者有新的留言
            // 寫user就好，會自己去找mail，to() 裡面可以傳用戶model/郵箱地址/數組裡面寫多個郵箱地址
            // Mail::to($blog->user)->send(new BlogCommentMail($comment));
            return response()->json(['state' => true, 'msg' => '回復成功', 'data' => $data]);
        } else {
            return response()->json(['state' => false, 'msg' => '回復失敗']);
        }
    }
}
