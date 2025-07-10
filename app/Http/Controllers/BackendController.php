<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ruang;
use App\Models\Jadwal;
use App\Models\Booking;

class BackendController extends Controller
{
    public function index()
    {
        $totalUser = User::count();
        $totalRuang = Ruang::count();
        $totalJadwal = Jadwal::count();
        $totalBooking = Booking::count();

        return view('backend.index', compact('totalUser', 'totalRuang', 'totalJadwal', 'totalBooking'));
    }
}
