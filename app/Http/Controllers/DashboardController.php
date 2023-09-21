<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.admin.index', [
            'totalPeserta' => User::where('isAdmin', '0') -> sum('isAdmin'),
            'totalPesertaAktif' => User::where('isActive', '1') -> sum('isActive'),
            'totalPesertaPerempuan' => User::where('gender', 'perempuan') -> sum('gender'),
            'totalPesertaLaki' => User::where('gender', 'laki-laki') -> sum('gender')
        ]);
    }
}
