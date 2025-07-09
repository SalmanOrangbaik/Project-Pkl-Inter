<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruang = Ruang::latest()->get();
        $title    = 'Hapus Data!';
        $text     = "Apakah Anda Yakin??";
        confirmDelete($title, $text);

        return view('backend.ruangan.index', compact('ruang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255|unique:ruangs',
            'kapasitas' => 'required|string|max:255',
            'fasilitas' => 'required|string',
            'cover'     => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $ruang = new Ruang();

        if ($request->hasFile('cover')) {
            $file       = $request->file('cover');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $coverPath  = $file->storeAs('cover-ruangan', $randomName, 'public');
            $ruang->cover = $coverPath;
        }

        $ruang->nama      = $request->nama;
        $ruang->kapasitas = $request->kapasitas;
        $ruang->fasilitas = $request->fasilitas;
        $ruang->save();

        toast('Data ruangan berhasil disimpan.', 'success');
        return redirect()->route('backend.ruang.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ruang = Ruang::findOrFail($id);
        return view('backend.ruangan.show', compact('ruang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ruang = Ruang::findOrFail($id);
        return view('backend.ruangan.edit', compact('ruang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ruang = Ruang::findOrFail($id);

        $request->validate([
        'nama'      => 'required|string|max:255|:ruangs,nama,' . $ruang->id,
        'kapasitas' => 'required|string|max:255',
        'fasilitas' => 'required|string',
        'cover'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

        if ($request->hasFile('cover')) {
        // Hapus cover lama
        if ($ruang->cover && Storage::disk('public')->exists($ruang->cover)) {
            Storage::disk('public')->delete($ruang->cover);
        }

        $file = $request->file('cover');
        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $coverPath = $file->storeAs('cover-ruangan', $filename, 'public');
        $ruang->cover = $coverPath;
    }

        $ruang->nama = $request->nama;
        $ruang->kapasitas = $request->kapasitas;
        $ruang->fasilitas = $request->fasilitas;
        $ruang->save();

        toast('Data ruangan berhasil diupdate.', 'success');
        return redirect()->route('backend.ruang.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ruang = Ruang::findOrFail($id);
        $ruang->delete();
        return redirect()->route('backend.ruang.index')->with('success', 'Ruang berhasil dihapus');
    }
}
