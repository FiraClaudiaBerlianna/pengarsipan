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
        // Validasi input
        $validated = $request->validate([
            'nomor_surat' => 'required',
            'tujuan' => 'required', // Mengganti pengirim menjadi tujuan
            'tanggal_keluar' => 'required|date', // Mengganti tanggal_kirim menjadi tanggal_keluar
            'isi' => 'required',
            'file_surat' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',  // File jadi opsional
        ]);

        // Menyimpan data surat keluar
        $fileName = null;
        if ($request->hasFile('file_surat')) {
            // Menyimpan file jika ada
            $fileName = time().'_'.$request->file('file_surat')->getClientOriginalName();
            $request->file('file_surat')->storeAs('surat_keluar', $fileName, 'public');
        }

        // Menambahkan data surat keluar ke database
        SuratKeluar::create([
            'nomor_surat' => $validated['nomor_surat'],
            'tujuan' => $validated['tujuan'],
            'tanggal_keluar' => $validated['tanggal_keluar'],
            'isi' => $validated['isi'],
            'file_surat' => $fileName,  // Menyimpan nama file jika ada
        ]);

        return redirect()->route('surat_keluar.index')->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        return view('suratkeluar.edit', compact('suratKeluar'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nomor_surat' => 'required',
            'tujuan' => 'required', // Mengganti pengirim menjadi tujuan
            'tanggal_keluar' => 'required|date', // Mengganti tanggal_kirim menjadi tanggal_keluar
            'isi' => 'required',
            'file_surat' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',  // File jadi opsional
        ]);

        // Temukan data berdasarkan ID
        $suratKeluar = SuratKeluar::findOrFail($id);

        // Update data surat keluar dengan input yang sudah divalidasi
        $suratKeluar->update($validated);

        // Update file surat jika ada
        if ($request->hasFile('file_surat')) {
            $fileName = time().'_'.$request->file('file_surat')->getClientOriginalName();
            $request->file('file_surat')->storeAs('surat_keluar', $fileName, 'public');
            $suratKeluar->update(['file_surat' => $fileName]);
        }

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
