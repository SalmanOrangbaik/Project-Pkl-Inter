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

        $bookings = Booking::with('ruang')->get();
        $jadwals  = Jadwal::with('ruang')->get();

        $events = [];

        foreach ($bookings as $booking) {
            $events[] = [
                'title' => 'Booking - ' . ($booking->ruang->nama ?? 'Tanpa Ruangan'),
                'start' => $booking->tanggal . 'T' . $booking->jam_mulai,
                'end'   => $booking->tanggal . 'T' . $booking->jam_selesai,
                'color' => '#ffc107', // Kuning (Booking Diterima / Selesai)
                'description' => 'Booking oleh: ' . ($booking->user->name ?? 'Pengguna'),
            ];
        }

        foreach ($jadwals as $data) {
            $events[] = [
                'title' => 'Jadwal - ' . ($data->ruang->nama ?? 'Tanpa Ruangan'),
                'start' => $data->tanggal . 'T' . $data->jam_mulai,
                'end'   => $data->tanggal . 'T' . $data->jam_selesai,
                'color' => '#0dcaf0', // Biru (Jadwal Tetap)
                'description' => 'Jadwal Tetap - ' . ($data->keterangan ?? '-'),
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
