<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request){
        $validationData = $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|max:25',
            'password' => 'required|min:5'
        ]);

        User::create($validationData);
        $request->session->flash('success', 'User telah berhasil terdaftar');

        return redirect('/');
    }
}
