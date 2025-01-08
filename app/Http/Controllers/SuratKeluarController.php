<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use Carbon\Carbon; // tanggal

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluar = SuratKeluar::paginate(10); // Mengambil data surat keluar dengan pagination
        return view('suratkeluar.index', compact('suratKeluar'));
    }

    public function create()
    {
        return view('suratkeluar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required',
            'tujuan' => 'required', // Mengganti pengirim menjadi tujuan
            'tanggal_keluar' => 'required|date', // Mengganti tanggal_kirim menjadi tanggal_keluar
            'isi' => 'required',
        ]);

        SuratKeluar::create($validated);

        return redirect()->route('surat_keluar.index')->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        return view('suratkeluar.edit', compact('suratKeluar'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validated = $request->validate([
            'nomor_surat' => 'required',
            'tujuan' => 'required', // Mengganti pengirim menjadi tujuan
            'tanggal_keluar' => 'required|date', // Mengganti tanggal_kirim menjadi tanggal_keluar
            'isi' => 'required',
        ]);

        // Temukan data berdasarkan ID
        $suratKeluar = SuratKeluar::findOrFail($id);

        // Update data dengan input yang sudah divalidasi
        $suratKeluar->update($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('surat_keluar.index')->with('success', 'Surat keluar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Temukan data berdasarkan ID
        $suratKeluar = SuratKeluar::findOrFail($id);

        // Hapus data
        $suratKeluar->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('surat_keluar.index')->with('success', 'Data surat keluar berhasil dihapus.');
    }
}
