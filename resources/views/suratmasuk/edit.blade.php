@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Surat Masuk</h1>
    <form action="{{ route('surat_masuk.update', $suratMasuk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nomor_surat" class="form-label">Nomor Surat</label>
            <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" value="{{ $suratMasuk->nomor_surat }}" required>
        </div>

        <div class="mb-3">
            <label for="pengirim" class="form-label">Pengirim</label>
            <input type="text" name="pengirim" id="pengirim" class="form-control" value="{{ $suratMasuk->pengirim }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_terima" class="form-label">Tanggal Terima</label>
            <input type="date" name="tanggal_terima" id="tanggal_terima" class="form-control" value="{{ $suratMasuk->tanggal_terima }}" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi Surat</label>
            <textarea name="isi" id="isi" class="form-control" required>{{ $suratMasuk->isi }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('surat_masuk.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
