<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\TracerKerja;
use App\Models\TracerKuliah;
use App\Models\Alumni;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        // Hitung jumlah alumni yang bekerja dan kuliah
        $workingAlumni = TracerKerja::count();
        $studyingAlumni = TracerKuliah::count();
        
        // Ambil data alumni
        $alumni = Alumni::with(['tahunLulus', 'konsentrasiKeahlian', 'statusAlumni'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.adminHome', compact('workingAlumni', 'studyingAlumni', 'alumni'));
    }
    
    public function ReturnLogin()
    {
        return view('auth.login');
    }

    public function ForgetPassword()
    {
        return view('auth.forgot-password');
    }
    public function Register()
    {
        return view('auth.register');
    }
    
    public function profileAdmin(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function index()
    {
        // Hitung jumlah alumni yang bekerja dan kuliah
        $workingAlumni = TracerKerja::count();
        $studyingAlumni = TracerKuliah::count();

        return view('admin.adminHome', compact('workingAlumni', 'studyingAlumni'));
    }
}
