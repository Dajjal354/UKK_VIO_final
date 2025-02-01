<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniViewController extends Controller
{
    public function index()
    {
        $alumni = Alumni::with(['tahunLulus', 'konsentrasiKeahlian', 'statusAlumni'])->get();
        return view('alumni.index', compact('alumni'));
    }

    public function show(Alumni $alumni)
    {
        $alumni->load([
            'tahunLulus', 
            'konsentrasiKeahlian.programKeahlian.bidangKeahlian', 
            'statusAlumni'
        ]);

        // Load related data based on status
        if ($alumni->id_status_alumni == 1) { // Kuliah
            $alumni->load('tracerKuliah');
        } elseif ($alumni->id_status_alumni == 2) { // Kerja
            $alumni->load('tracerKerja');
        }

        // Load testimonial
        $alumni->load('testimoni');

        return view('alumni.show', compact('alumni'));
    }

    public function destroy(Alumni $alumni)
    {
        try {
            // Hapus data terkait terlebih dahulu
            if ($alumni->tracerKuliah) {
                $alumni->tracerKuliah->delete();
            }
            
            if ($alumni->tracerKerja) {
                $alumni->tracerKerja->delete();
            }
            
            if ($alumni->testimoni) {
                $alumni->testimoni->delete();
            }

            // Hapus data alumni
            $alumni->delete();

            return redirect()->route('alumni.index')
                ->with('success', 'Data alumni berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('alumni.index')
                ->with('error', 'Gagal menghapus data alumni');
        }
    }
} 