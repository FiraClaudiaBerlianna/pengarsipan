<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use Carbon\Carbon; // tanggal

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuk = SuratMasuk::paginate(10); // Mengambil data surat masuk dengan pagination
        return view('suratmasuk.index', compact('suratMasuk'));
    }

    public function create()
    {
        return view('suratmasuk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required',
            'pengirim' => 'required',
            'tanggal_terima' => 'required|date',
            'isi' => 'required',
        ]);

        SuratMasuk::create($validated);

        return redirect()->route('surat_masuk.index')->with('success', 'Surat masuk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return view('suratmasuk.edit', compact('suratMasuk'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validated = $request->validate([
            'nomor_surat' => 'required',
            'pengirim' => 'required',
            'tanggal_terima' => 'required|date',
            'isi' => 'required',
        ]);

        // Temukan data berdasarkan ID
        $suratMasuk = SuratMasuk::findOrFail($id);

        // Update data dengan input yang sudah divalidasi
        $suratMasuk->update($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('surat_masuk.index')->with('success', 'Surat masuk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Temukan data berdasarkan ID
        $suratMasuk = SuratMasuk::findOrFail($id);

        // Hapus data
        $suratMasuk->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('surat_masuk.index')->with('success', 'Data surat masuk berhasil dihapus.');
    }
}
