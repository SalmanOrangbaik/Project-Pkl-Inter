<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class RuanganController extends Controller
{
    public function index()
    {
        $ruang = Ruang::latest()->get();
        return view('backend.ruangan.index', compact('ruang'));
    }

    public function create()
    {
        return view('backend.ruangan.create');
    }

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

        toast('Data ruangan berhasil disimpan.', 'success')->autoClose(3000);
        return redirect()->route('backend.ruang.index');
    }

    public function show(string $id)
    {
        $ruang = Ruang::findOrFail($id);
        return view('backend.ruangan.show', compact('ruang'));
    }

    public function edit(string $id)
    {
        $ruang = Ruang::findOrFail($id);
        return view('backend.ruangan.edit', compact('ruang'));
    }

    public function update(Request $request, string $id)
    {
        $ruang = Ruang::findOrFail($id);

        $request->validate([
            'nama'      => 'required|string|max:255|unique:ruangs,nama,' . $ruang->id,
            'kapasitas' => 'required|string|max:255',
            'fasilitas' => 'required|string',
            'cover'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('cover')) {
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

        toast('Data ruangan berhasil diupdate.', 'success')->autoClose(3000);
        return redirect()->route('backend.ruang.index');
    }

    public function destroy(string $id)
    {
        $ruang = Ruang::findOrFail($id);

        // Hapus gambar juga (jika ada)
        if ($ruang->cover && Storage::disk('public')->exists($ruang->cover)) {
            Storage::disk('public')->delete($ruang->cover);
        }

        $ruang->delete();

        toast('Data ruangan berhasil dihapus.', 'success')->autoClose(3000);
        return redirect()->route('backend.ruang.index');
    }
}
