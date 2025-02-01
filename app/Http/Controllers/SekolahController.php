<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;

class SekolahController extends Controller
{
    public function show()
    {
        $sekolah = Sekolah::first();
        return view('users.sekolah', compact('sekolah'));
    }
} 