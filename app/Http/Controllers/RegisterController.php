<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){
        // $departments = DB::table('departments')->get();
        return view('register.index', [
            'title' => 'Register',
            'students' => Student::all(),
            'departments' => Department::all()
        ]);
    }

    public function store(Request $request){
        $validationData = $request->validate([
            'image' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'nik' => 'required|unique:users',
            'name' => 'required|max:100',
            'address' => 'required|max:100',
            'birth_date' => 'required',
            'email' => 'required|email:dns|unique:users',
            'school' => 'required|max:100',
            'religion'=> 'required',
            'number_phone' => 'required|max:13|min:10|unique:users',
            'gender' => 'required',
            'password' => 'required|min:5',
            'department_id' => 'required',
            'jurusan' => 'required|max:30',
        ]);

        // dd($validationData);

        if($request -> file('image')){
            $validationData['image'] = $request->file('image')->store('student-image');
        }
        

        User::create($validationData);
        $request->session()->flash('success', 'User telah berhasil terdaftar');

        return redirect('/');
    }

}
