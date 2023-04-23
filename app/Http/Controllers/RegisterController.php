<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        // ユーザーの作成
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();
    
        // 登録が成功した場合、ログイン画面にリダイレクト
    return redirect()->route('login')->with('success', '登録完了しました')->with('registration_success', 'true');

}
}
