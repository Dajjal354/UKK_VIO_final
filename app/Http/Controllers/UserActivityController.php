<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;

class UserActivityController extends Controller
{
    public function getActivityData()
    {
          
        $users = User::whereType('0')->get();
       

// Buat data dates (contoh hari dalam seminggu)
$dates = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

// Manipulasi activeUsers (contoh data berdasarkan created_at)
$activeUsers = array_fill(0, 7, 0); // Buat array dengan 7 elemen bernilai 0

foreach ($users as $user) {
    // Ambil hari dari created_at dan hitung jumlah user aktif di tiap hari
    $dayIndex = Carbon::parse($user->created_at)->dayOfWeek; // Mengambil index hari (0 = Sunday)
    $activeUsers[$dayIndex]++;
}

// Format JSON yang diinginkan
$response = [
    'dates' => $dates,
    'activeUsers' => $activeUsers,
];
return response()->json($response);

    }
}