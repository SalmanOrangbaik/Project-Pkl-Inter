<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::latest()->get();
        $title    = 'Hapus Data!';
        $text     = "Apakah Anda Yakin??";
        confirmDelete($title, $text);

        return view('backend.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    
        return redirect()->route('backend.user.index')->with('success', 'Data user berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    $user = User::findOrFail($id);

    $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
    ];

    // Jika password diisi, tambahkan validasi password
    if ($request->filled('password')) {
        $rules['password'] = 'confirmed|min:6';
    }

    $validatedData = $request->validate($rules);

    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];

    // Update password hanya jika diisi
    if (!empty($validatedData['password'])) {
        $user->password = bcrypt($validatedData['password']);
    }

    $user->save();

    return redirect()->route('backend.user.index')->with('success', 'User berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('backend.user.index')->with('success', 'User berhasil dihapus');
    }
}
