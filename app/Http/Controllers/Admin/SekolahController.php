<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah::first();
        return view('admin.sekolah.index', compact('sekolah'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'npsn' => 'required|string|max:20',
            'nss' => 'required|string|max:20',
            'nama_sekolah' => 'required|string|max:50',
            'alamat' => 'required|string|max:50',
            'no_telp' => 'required|string|max:15',
            'website' => 'required|string|max:50',
            'email' => 'required|email|max:50'
        ]);

        Sekolah::updateOrCreate(
            ['id_sekolah' => 1],
            $validated
        );

        return redirect()->route('admin.sekolah.index')
            ->with('success', 'Profil sekolah berhasil diperbarui');
    }
} 