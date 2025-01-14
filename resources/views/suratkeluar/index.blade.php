@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Surat Keluar</h1>

        <!-- Tombol Tambah Surat Keluar -->
        <a href="{{ route('surat_keluar.create') }}" class="btn btn-primary mb-3">Tambah Surat Keluar</a>
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
                <th>Tujuan</th>
                <th>Tanggal Keluar</th>
                <th>Isi</th>
                <th>File Dokumen</th> <!-- Tambahan Kolom -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($suratKeluar as $surat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $surat->nomor_surat }}</td>
                    <td>{{ $surat->tujuan }}</td>
                    <td>{{ \Carbon\Carbon::parse($surat->tanggal_keluar)->format('d-m-Y') }}</td>
                    <td>{{ $surat->isi }}</td>
                    <td>
                        @if ($surat->file_surat)
                            <a href="{{ asset('storage/surat_keluar/' . $surat->file_surat) }}" target="_blank" class="btn btn-sm btn-info">Lihat File</a>
                        @else
                            <span class="text-muted">Tidak ada file</span>
                        @endif
                    </td>
                    <td class="d-flex">
                        <!-- Tombol Edit -->
                        <a href="{{ route('surat_keluar.edit', $surat->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>

                        <!-- Tombol Delete -->
                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $surat->id }})">Hapus</button>

                        <!-- Form Delete -->
                        <form id="delete-form-{{ $surat->id }}" action="{{ route('surat_keluar.destroy', $surat->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data surat keluar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $suratKeluar->links() }}
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
