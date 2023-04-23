<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;

class PasswordResetController extends Controller
{
    public function resetPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'new_password' => 'required|min:8|confirmed',
        ], [
            'email.required' => 'メールアドレスは必須です。',
            'email.email' => 'メールアドレスの形式が正しくありません。',
            'new_password.required' => 'パスワードは必須です。',
            'new_password.min' => 'パスワードは:min文字以上で入力してください。',
            'new_password.confirmed' => 'パスワードが一致しません。',
        ]);
        
        // ユーザーの検索
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // パスワードの変更
            $user->password = Hash::make($request->new_password);
            $user->save();

            // パスワード変更が成功した場合、同じページにリダイレクトしてフラッシュメッセージを表示
            return back()
                ->with('success', 'パスワード変更完了しました');
        } else {
            return back()
                ->withErrors(['email' => 'メールアドレスが見つかりませんでした'])
                ->withInput($request->except('new_password', 'new_password_confirmation'));
        }
    }
} 
