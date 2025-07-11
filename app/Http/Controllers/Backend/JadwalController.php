<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Ruang;
use RealRashid\SweetAlert\Facades\Alert;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::latest()->get();
        $title = 'Hapus Data!';
        $text = 'Apakah Anda Yakin??';
        confirmDelete($title, $text);

        return view('backend.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $ruangs = Ruang::all();
        return view('backend.jadwal.create', compact('ruangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ruang_id' => 'required|exists:ruangs,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'keterangan' => 'nullable|string|max:200',
        ]);

        $jadwal = new Jadwal();
        $jadwal->ruang_id = $request->ruang_id;
        $jadwal->tanggal = $request->tanggal;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->keterangan = $request->keterangan;
        $jadwal->save();

        toast('Data jadwal berhasil disimpan.', 'success')->autoClose(3000);
        return redirect()->route('backend.jadwal.index');
    }

    public function show(string $id)
    {
        $jadwal = Jadwal::with('ruang')->findOrFail($id);
        return view('backend.jadwal.show', compact('jadwal'));
    }

    public function edit(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $ruang = Ruang::all();
        return view('backend.jadwal.edit', compact('jadwal', 'ruang'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'ruang_id' => 'required|exists:ruangs,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'keterangan' => 'nullable|string',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update([
            'ruang_id' => $request->ruang_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'keterangan' => $request->keterangan,
        ]);

        toast('Jadwal berhasil diperbarui.', 'success')->autoClose(3000);
        return redirect()->route('backend.jadwal.index');
    }

    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        toast('Jadwal berhasil dihapus.', 'success')->autoClose(3000);
        return redirect()->route('backend.jadwal.index');
    }
}
