<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function create(Alumni $alumni)
    {
        return view('testimonial.create', compact('alumni'));
    }

    public function store(Request $request, Alumni $alumni)
    {
        $validated = $request->validate([
            'testimoni' => 'required',
            'tgl_testimoni' => 'required',
        ]);

        $testimonial = Testimoni::create([
            'id_alumni' => $alumni->id_alumni,
            'testimoni' => $validated['testimoni'],
            'tgl_testimoni' => $validated['tgl_testimoni'],
        ]);

        return redirect()->route('home')->with('success', 'Testimonial berhasil disimpan');
    }

    public function getTestimonials()
    {
        $testimonials = Testimoni::with('alumni')->latest('tgl_testimoni')->get();
        return view('users.home', compact('testimonials'));
    }
}
