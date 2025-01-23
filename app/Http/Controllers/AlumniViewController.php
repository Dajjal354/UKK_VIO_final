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
} 