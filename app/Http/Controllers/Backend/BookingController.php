<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Ruang;
use App\Models\User;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        
            // Dapatkan waktu sekarang
            $now = Carbon::now();
        
            // Update semua booking "pending" yang sudah lewat waktunya jadi "selesai"
            Booking::where('status', 'pending')
                ->where(function ($data) use ($now) {
                    $data->whereDate('tanggal', '<', $now->toDateString())
                        ->orWhere(function ($waktu) use ($now) {
                            $waktu->whereDate('tanggal', $now->toDateString())
                              ->whereTime('jam_selesai', '<=', $now->toTimeString());
                        });
                })
                ->update(['status' => 'selesai']);
        
            // Ambil data setelah update
            $bookings = Booking::with(['user', 'ruang'])->latest()->get();
        
            return view('backend.booking.index', compact('bookings'));
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ruangs = Ruang::all();
        $users = User::all();

    return view('backend.booking.create', compact('ruangs', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
    
        return redirect()->route('backend.booking.index')->with('success', 'Booking berhasil dikirim.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::with(['ruang', 'user'])->findOrFail($id);
        return view('backend.booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $booking = Booking::findOrFail($id);
        $ruangs = Ruang::all();
        $users = User::all();

        return view('backend.booking.edit', compact('booking', 'ruangs', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ruang_id' => 'required|exists:ruangs,id',
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'status' => 'required|in:pending,selesai,ditolak,diterima',
        ]);
    
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());
    
        return redirect()->route('backend.booking.index')->with('success', 'Data booking berhasil diperbarui.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('backend.booking.index')->with('success', 'Ruang berhasil dihapus');
    }

    public function updateStatus(Request $request, $id)
    {
    $request->validate([
        'status' => 'required|in:pending,selesai,ditolak,diterima',
    ]);

    $booking = Booking::findOrFail($id);
    $booking->status = $request->status;
    $booking->save();

    return redirect()->back()->with('success', 'Status booking berhasil diperbarui.');
    }
}
