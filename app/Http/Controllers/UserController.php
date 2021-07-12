<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
     * 個人資料更新
     */
    public function infoUpdate(UserRequest $request)
    {
        // $validateDate = $request->validate();
        $validated = $request->validated();
        // dd($validated);

        // $name = $request->input('name');
        // $email = $request->input('email');

        // if (empty($name) || empty($email)) {
        //     return back()->withErrors(['error' => '用戶名或是信箱不能為空']);
        // }
        // $errors = [];
        // if (empty($name)) array_push($errors, '用戶名不為空');
        // if (empty($email)) array_push($errors, '信箱不為空');
        // if (!empty($errors)) return back()->withErrors($errors);

        // $id = auth()->user()->id;
        $id = auth()->id();

        // $res = DB::table('users')->where('id', $id)->update(['name' => $name, 'email' => $email]);
        $res = DB::table('users')->where('id', $id)->update($validated);

        // dd($res);
        if ($res) {
            return back()->with('success', '更新成功');
        } else {
            return back()->with('warning', '未做更改');
        }

        // 僅作了解
        // $user = auth()->user();
        // $user->name = $name;
        // $user->email = $email;
        // $user->save();
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
    public function avatarUpdate(Request $request)
    {
        // $file = request('avatar');
        // 獲取上傳文件
        // 保存到本地，store 會自动生成一个唯一的 ID
        // $path = $file->store('avatar');
        // 取得原黨名
        // $name = $file->getClientOriginalName();
        // 使用自訂文件名
        // $path = $file->storeAs('avatar', $name);

        $file = $request->validate(
            [
                'avatar' => 'image | required'
            ],
            [],
            [
                'avatar' => '圖片'
            ]
        );
        // $file = $request->file('avatar');

        //更新前獲取原有圖片
        $oldAvatar = auth()->user()->avatar;

        // if (empty($file)) return back()->withErrors(['error' => '檔案不為空']);
        // 指定地址strorage/app/public 裡，用戶才訪問的到
        $path = $file['avatar']->store('avatar', 'public');

        $id = auth()->user()->id;

        $res = DB::table('users')->where('id', $id)->update(['avatar' => $path]);

        if ($res) {
            // 更新成功，刪除原有圖片，記得要選擇位置disk
            Storage::disk('public')->delete($oldAvatar);
            return back()->with(
                'success',
                '頭像更新成功'
            );
        } else {
            return back()->with('warning', '頭像未做更改');
        }
    }

    /**
     * 所有blog
     */

    public function blog()
    {
        return view('user.blog');
    }
}
