<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;



class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
    return view('mahasiswa.index', compact('mahasiswas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required',
        'nim' => 'required|unique:mahasiswas',
        'jurusan' => 'required',
        'email' => 'required|email|unique:mahasiswas',
    ]);

    Mahasiswa::create($request->all());

    return redirect()->route('mahasiswa.index')
                     ->with('success', 'Data Mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         //
       $mahasiswa = Mahasiswa::findOrFail($id);
       return view('mahasiswa.show', compact('mahasiswa'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
    return view('mahasiswa.edit', compact('mahasiswa'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
    $request->validate([
        'nama' => 'required',
        'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
        'jurusan' => 'required',
        'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
    ]);

    $mahasiswa->update($request->all());

    return redirect()->route('mahasiswa.index')
                     ->with('success', 'Data Mahasiswa berhasil diupdate.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $mahasiswa = Mahasiswa::findOrFail($id);
    $mahasiswa->delete();

    return redirect()->route('mahasiswa.index')
                     ->with('success', 'Data Mahasiswa berhasil dihapus.');

    }
}
