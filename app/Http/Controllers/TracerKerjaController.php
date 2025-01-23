<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\TracerKerja;
use Illuminate\Http\Request;

class TracerKerjaController extends Controller
{
    public function create(Alumni $alumni)
    {
        return view('tracer.kerja', compact('alumni'));
    }

    public function store(Request $request, Alumni $alumni)
    {
        $validated = $request->validate([
            'tracer_kerja_pekerjaan' => 'required',
            'tracer_kerja_nama' => 'required|string|max:100',
            'tracer_kerja_status' => 'required|string|max:50',
            'tracer_kerja_tgl_mulai' => 'required',
            'tracer_kerja_jabatan' => 'required',
            'tracer_kerja_lokasi' => 'required',
            'tracer_kerja_alamat' => 'required',
            'tracer_kerja_gaji' => 'required',
        ]);

        $tracerKerja = TracerKerja::create([
            'id_alumni' => $alumni->id_alumni,
            'tracer_kerja_nama' => $validated['tracer_kerja_nama'],
            'tracer_kerja_jabatan' => $validated['tracer_kerja_jabatan'],
            'tracer_kerja_tgl_mulai' => $validated['tracer_kerja_tgl_mulai'],
            'tracer_kerja_gaji' => $validated['tracer_kerja_gaji'],
            'tracer_kerja_status' => $validated['tracer_kerja_status'],
            'tracer_kerja_alamat' => $validated['tracer_kerja_alamat'],
            'tracer_kerja_lokasi' => $validated['tracer_kerja_lokasi'],
            'tracer_kerja_pekerjaan' => $validated['tracer_kerja_pekerjaan'],
            
        ]);

        return redirect()->route('testimonial.create', $alumni)->with('success', 'Data pekerjaan berhasil disimpan');
    }
}