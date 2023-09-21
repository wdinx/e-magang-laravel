<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('dashboard.admin.user', [
            'users' => User::all()
        ]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5',
            'isAdmin' => 'required'
        ]);

        User::create($validateData);
        $request->session()->flash('success', 'User telah berhasil terdaftar');

        return redirect('/add/user');
    }
}
