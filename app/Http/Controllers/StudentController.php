<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $schools = DB::table('schools')->get();
        $students = DB::table('students')->get();
        return view('dashboard.admin.user', [
            'schools' => $schools,
            'students' => Student::all()
        ]);
    }

    public function store(Request $request){
        $validateData = $request -> validate([
            'name' => 'required|max:100',
            'school_id' => "required",
            'username' => 'required',
            'password' => 'required|min:5',
            'gender'=> 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'isActive' => 'required'
        ]);

        Student::create($validateData);
        
        return('/user');
    }
}
