<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Blog $blog)
    {
        // dd($blog->id);
        // dd($request->all());

        $res = auth()->user()->comments()->create(['blog_id' => $blog->id, 'content' => $request->content]);

        if ($res) {
            $data = [
                'user_avatar' => auth()->user()->avatar,
                'user_name' => auth()->user()->name,
                'comment' => $request->content,
            ];
            return response()->json(['state' => true, 'msg' => '回復成功', 'data' => $data]);
        } else {
            return response()->json(['state' => false, 'msg' => '回復失敗']);
        }
    }
}
