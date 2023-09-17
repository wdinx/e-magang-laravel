<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('login.index',[
            'user' => User::all()
        ]);
    }

    public function authenticate(Request $request){
        $credential = $request -> validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        // dd('berhasil login');

        if(Auth::attempt($credential)){
            if (auth()->user()->isAdmin){
                // Jika pengguna memiliki peran 'student', lanjutkan.
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }else{
                $request->session()->regenerate();
                return redirect()->intended('/user');
            }
        };

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
