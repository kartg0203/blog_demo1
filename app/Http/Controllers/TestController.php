<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\Flight;
use App\Models\Store;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $users = User::all();
        // $users = DB::table('users')->get();
        // dd($users);
        // dd('test');
        // Storage::put('file.txt', 'hello');
        // Storage::disk('public')->put('file2.txt', 'hello');
        // $contents = Storage::disk('public')->get('file2.txt');
        // dd($contents);
        // dd('test');
        // $validatedData = $request->validate([
        //     'title' => 'required|max:255',
        //     'body' => 'required',
        // ]);
        // dd($validatedData);

        // $ca = DB::table('categories')->pluck('name', 'id');
        // *******************************************************************
        // 增
        // 添加一條數據
        // $flight = new Flight();
        // $flight->name = '台北';
        // $res = $flight->save();
        // 批量新增
        // $res = Flight::create(['name' => '不知火']);
        // $flight = new Flight();
        // $flight->fill(['name' => '美國']);
        // $res = $flight->save();
        //複製
        // $flight = Flight::find(2);
        // $copy = $flight->replicate();
        // $copy->save();
        // dd($res);

        // 刪
        // 刪除一條數據
        // $flight = Flight::find(1);
        // $res = $flight->delete();
        // 刪除多條數據
        // $res = Flight::where('name', '日本')->delete();
        // dd($res);

        // 改
        // 更新一條數據
        // $flight = Flight::find(1);
        // $flight->name = '日本';
        // $flight->save();
        // 更新多條數據
        // $flight = Flight::where('name', '日本')->update(['name' => '台灣']);
        // 獲取原始數據
        // $flight->getOriginal('name'); // John
        // $flight->getOriginal(); // 原始属性数组

        // 查
        // Flight::all();
        // Flight::get();
        // Flight::where('name', 'xxx')->first();
        // Flight::firstWhere('name', 'xxx'); //簡寫
        // Flight::find(1);

        // 預加載
        // $users = User::with('blogs')->get();

        // dd($users);

        // Mail::to('kartg0102@gmail.com')->send(new OrderShipped('hello'));
        DB::beginTransaction();

        try {
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
