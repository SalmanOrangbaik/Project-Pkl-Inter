<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingUserController extends Controller
{
    public function create()
    {
        $ruang = Ruang::all();
        return view('booking_create', compact('ruang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'ruang_id' => 'required|exists:ruangs,id',
        ]);
    
        // Cek bentrok  
        $bentrok = Booking::where('ruang_id', $request->ruang_id)
            ->where('tanggal', $request->tanggal)
            ->where(function ($data) use ($request) {
                $data->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])
                      ->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai])
                      ->orWhere(function ($booking) use ($request) {
                          $booking->where('jam_mulai', '<=', $request->jam_mulai)
                            ->where('jam_selesai', '>=', $request->jam_selesai);
                      });
            })
            ->exists();
    
        if ($bentrok) {
            return back()->withInput()->with('error', 'Jadwal bentrok! Silakan pilih jam lain.');
        }
    
        // Simpan booking
        Booking::create([
            'user_id' => auth()->id(),
            'ruang_id' => $request->ruang_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => 'pending',
        ]);
    
        return redirect()->route('booking.create')->with('success', 'Booking berhasil dikirim.');
    }
}
