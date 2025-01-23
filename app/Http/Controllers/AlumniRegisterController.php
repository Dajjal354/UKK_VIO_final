<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\TahunLulus;
use App\Models\KonsentrasiKeahlian;
use App\Models\StatusAlumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AlumniRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $tahunLulus = TahunLulus::all();
        $konsentrasiKeahlian = KonsentrasiKeahlian::with('programKeahlian.bidangKeahlian')->get();
        $statusAlumni = StatusAlumni::all();
        
        return view('users.alumni-register', compact('tahunLulus', 'konsentrasiKeahlian', 'statusAlumni'));
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'id_tahun_lulus' => 'required|exists:tbl_tahun_lulus,id_tahun_lulus',
            'id_konsentrasi_keahlian' => 'required|exists:tbl_konsentrasi_keahlian,id_konsentrasi_keahlian',
            'id_status_alumni' => 'required|exists:tbl_status_alumni,id_status_alumni',
            'nisn' => 'nullable|string|max:20',
            'nik' => 'nullable|string|max:20',
            'nama_depan' => 'required|string|max:50',
            'nama_belakang' => 'required|string|max:50',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:20',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:50',
            'no_hp' => 'nullable|string|max:15',
            'akun_fb' => 'nullable|string|max:50',
            'akun_ig' => 'nullable|string|max:50',
            'akun_tiktok' => 'nullable|string|max:50',
            'email' => 'required|string|email|max:50|unique:tbl_alumni,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $alumni = Alumni::create($validated);

        switch($request->id_status_alumni) {
            case 1: // Kuliah
                return redirect()->route('tracer.kuliah.form', ['alumni' => $alumni->id_alumni]);
            case 2: // Kerja
                return redirect()->route('tracer.kerja.form', ['alumni' => $alumni->id_alumni]);
            default:
                return redirect()->route('home');
        }
    }
}