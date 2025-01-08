@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Surat Masuk</h1>

        <!-- Tombol Tambah Surat Masuk -->
        <a href="{{ route('surat_masuk.create') }}" class="btn btn-primary mb-3">Tambah Surat Masuk</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol Kembali -->
    <a href="{{ route('sidebar') }}" class="btn btn-secondary mb-3">Kembali</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Pengirim</th>
                <th>Tanggal Terima</th>
                <th>Isi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($suratMasuk as $surat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $surat->nomor_surat }}</td>
                    <td>{{ $surat->pengirim }}</td>
                    <td>{{ \Carbon\Carbon::parse($surat->tanggal_terima)->format('d-m-Y') }}</td>
                    <td>{{ $surat->isi }}</td>
                    <td class="d-flex">
                        <!-- Tombol Edit -->
                        <a href="{{ route('surat_masuk.edit', $surat->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>

                        <!-- Tombol Delete -->
                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $surat->id }})">Hapus</button>

                        <!-- Form Delete -->
                        <form id="delete-form-{{ $surat->id }}" action="{{ route('surat_masuk.destroy', $surat->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data surat masuk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $suratMasuk->links() }}
    </div>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form delete
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection
