<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\TracerKuliah;
use Illuminate\Http\Request;

class TracerKuliahController extends Controller
{
    public function create(Alumni $alumni)
    {
        return view('tracer.kuliah', compact('alumni'));
    }

    public function store(Request $request, Alumni $alumni)
    {
        $validated = $request->validate([
            'tracer_kuliah_kampus' => 'required|string|max:100',
            'tracer_kuliah_jenjang' => 'required|string|max:50',
            'tracer_kuliah_jurusan' => 'required|string|max:100',
            'tracer_kuliah_alamat' => 'required|string|max:255',
            'tracer_kuliah_status' => 'required',
            'tracer_kuliah_linier' => 'required',
        ]);
        $tracerKuliah = TracerKuliah::create([
            'id_alumni' => $alumni->id_alumni,
            'tracer_kuliah_kampus' => $validated['tracer_kuliah_kampus'],
            'tracer_kuliah_jenjang' => $validated['tracer_kuliah_jenjang'], 
            'tracer_kuliah_jurusan' => $validated['tracer_kuliah_jurusan'],
            'tracer_kuliah_status' => $validated['tracer_kuliah_status'],
            'tracer_kuliah_linier' => $validated['tracer_kuliah_linier'],
            'tracer_kuliah_alamat' => $validated['tracer_kuliah_alamat'],
        ]);

        return redirect()->route('testimonial.create', $alumni)->with('success', 'Data kuliah berhasil disimpan');
    }
}