<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 個人頁面
     */
    public function infoPage()
    {
        return view('user.info');
    }

    /**
     * 個人更新
     */
    public function infoUpdate()
    {
    }

    /**
     * 頭像頁面
     */
    public function avatarPage()
    {

        return view('user.avatar');
    }

    /**
     * 更新頭像
     */
    public function avatarUpdate()
    {
    }

    /**
     * 所有blog
     */

    public function blog()
    {
        return view('user.blog');
    }
}
