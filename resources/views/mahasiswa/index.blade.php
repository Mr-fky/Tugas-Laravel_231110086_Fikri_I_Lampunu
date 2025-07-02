@extends('layouts.app')

@section('content')
<h1 class="mb-4">Data Mahasiswa</h1>

<a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-hover">
  <thead class="table-light">
    <tr>
      <th>ID</th><th>Nama</th><th>NIM</th><th>Jurusan</th><th>Email</th><th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($mahasiswas as $mhs)
    <tr>
      <td>{{ $mhs->id }}</td>
      <td>{{ $mhs->nama }}</td>
      <td>{{ $mhs->nim }}</td>
      <td>{{ $mhs->jurusan }}</td>
      <td>{{ $mhs->email }}</td>
      <td>
        <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" style="display:inline">
          @csrf
          @method('DELETE')
          <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
