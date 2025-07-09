<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Ruang;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::latest()->get();
        $title   = 'Hapus Data!';
        $text    = "Apakah Anda Yakin??";
        confirmDelete($title, $text);

        return view('backend.jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ruangs = Ruang::all();
        return view('backend.jadwal.create', compact('ruangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ruang_id'   => 'required|exists:ruangs,id',
            'tanggal'    => 'required|date',
            'jam_mulai'  => 'required|date_format:H:i',
            'jam_selesai'=> 'required|date_format:H:i|after:jam_mulai',
            'keterangan' => 'nullable|string|max:200',
        ]);
    
        
        $jadwal = new Jadwal();
        $jadwal->ruang_id   = $request->ruang_id;
        $jadwal->tanggal    = $request->tanggal;
        $jadwal->jam_mulai  = $request->jam_mulai;
        $jadwal->jam_selesai= $request->jam_selesai;
        $jadwal->keterangan = $request->keterangan;
        $jadwal->save();
    
        toast('Data jadwal berhasil disimpan.', 'success');
        return redirect()->route('backend.jadwal.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jadwal = Jadwal::with('ruang')->findOrFail($id);
        return view('backend.jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $ruang = Ruang::all();
        return view('backend.jadwal.edit', compact('jadwal', 'ruang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ruang_id'    => 'required|exists:ruangs,id',
            'tanggal'     => 'required|date',
            'jam_mulai'   => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'keterangan'  => 'nullable|string',
        ]);
    
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update([
            'ruang_id'    => $request->ruang_id,
            'tanggal'     => $request->tanggal,
            'jam_mulai'   => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'keterangan'  => $request->keterangan,
        ]);
    
        return redirect()->route('backend.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('backend.jadwal.index')->with('success', 'Ruang berhasil dihapus');
    }
}
