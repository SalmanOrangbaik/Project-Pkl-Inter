<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Jadwal;
use App\Models\Ruang;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $ruang = Ruang::take(3)->get();

        // Ambil semua booking dan jadwal
        $bookings = Booking::with('ruang')->get();
        $jadwals  = Jadwal::with('ruang')->get();


        $events = [];

        foreach ($bookings as $booking) {
            $events[] = [
                'title' => 'Booking - ' . ($booking->ruang->nama ?? 'Tanpa Ruangan'),
                'start' => $booking->tanggal . 'T' . $booking->jam_mulai,
                'end'   => $booking->tanggal . 'T' . $booking->jam_selesai,
                'color' => '#f39c12',
            ];
        }

        foreach ($jadwals as $jadwalItem) {
            $events[] = [
                'title' => 'Jadwal - ' . ($jadwalItem->ruang->nama ?? 'Tanpa Ruangan'),
                'start' => $jadwalItem->tanggal . 'T' . $jadwalItem->jam_mulai,
                'end'   => $jadwalItem->tanggal . 'T' . $jadwalItem->jam_selesai,
                'color' => '#3498db',
            ];
        }

        return view('index', compact('ruang', 'events'));
    }

    public function riwayat()
    {
        $booking = Booking::where('user_id', Auth::id())->latest()->get();
        return view('booking_riwayat', compact('booking'));
    }

    public function ruangan()
    {
        $ruang = Ruang::all();
        return view('booking_ruangan', compact('ruang'));
    }

    public function detailRuangan($id)
    {
        $ruang = Ruang::findOrFail($id);
        return view('detail_ruangan', compact('ruang'));
    }
}
