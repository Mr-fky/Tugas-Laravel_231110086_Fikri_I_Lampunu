@extends('layouts.create')

@section('title', 'Tambah Mahasiswa')

@section('content')
    <h1>Tambah Mahasiswa</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>

        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="{{ old('nim') }}" required>

        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" value="{{ old('jurusan') }}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>

        <button type="submit">Simpan</button>
    </form>

    <div class="back-link">
        <a href="{{ route('mahasiswa.index') }}">Kembali ke Daftar Mahasiswa</a>
    </div>
@endsection
