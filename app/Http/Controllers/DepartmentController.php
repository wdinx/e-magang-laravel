<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        return view('dashboard.admin.department', [
            'departments' => Department::all()
        ]);
    }

    public function store(Request $request){
        $validationData = $request->validate([
            'department_name' => 'required'
        ]);

        Department::create($validateData);
        $request->session()->flash('success', 'Bagian telah berhasil ditambahkan');

        return redirect('/add/department');
    }

    public function update(Request $request, Department $department){
        $rules = [
            'department_name' => 'required'
        ];

        $validateData = $request->validate($rules);
        
        Department::where('department_name', $department->id)
            ->update($validateData);
    }

    public function destroy(Department $department){
        Department::destroy($department->id);

        return redirect('dashboard/department') -> with('Success', 'Telah Dihapus');
    }
}
