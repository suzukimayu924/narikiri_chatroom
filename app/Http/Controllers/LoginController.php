<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->flash('success', 'ログインが完了しました');
            return redirect()->route('index');
        }
    
        return back()
            ->withErrors([
                'password' => 'パスワードが間違っています',
            ])
            ->withInput($request->except('password'));
    }
    
}    