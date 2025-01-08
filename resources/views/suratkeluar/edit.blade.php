@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Surat Keluar</h1>
    <form action="{{ route('surat_keluar.update', $suratKeluar->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nomor_surat" class="form-label">Nomor Surat</label>
            <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" value="{{ $suratKeluar->nomor_surat }}" required>
        </div>

        <div class="mb-3">
            <label for="tujuan" class="form-label">Tujuan</label>
            <input type="text" name="tujuan" id="tujuan" class="form-control" value="{{ $suratKeluar->tujuan }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
            <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control" value="{{ $suratKeluar->tanggal_keluar }}" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi Surat</label>
            <textarea name="isi" id="isi" class="form-control" required>{{ $suratKeluar->isi }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('surat_keluar.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
