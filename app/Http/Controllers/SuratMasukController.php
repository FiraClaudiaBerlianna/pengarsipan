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
        // Validasi input
        $validated = $request->validate([
            'nomor_surat' => 'required',
            'pengirim' => 'required',
            'tanggal_terima' => 'required|date',
            'isi' => 'required',
            'file_surat' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',  // File jadi opsional
        ]);

        // Menyimpan data surat masuk
        $fileName = null;
        if ($request->hasFile('file_surat')) {
            // Menyimpan file jika ada
            $fileName = time().'_'.$request->file('file_surat')->getClientOriginalName();
            $request->file('file_surat')->storeAs('surat_masuk', $fileName, 'public');
        }

        // Menambahkan data surat masuk ke database
        SuratMasuk::create([
            'nomor_surat' => $validated['nomor_surat'],
            'pengirim' => $validated['pengirim'],
            'tanggal_terima' => $validated['tanggal_terima'],
            'isi' => $validated['isi'],
            'file_surat' => $fileName,  // Menyimpan nama file jika ada
        ]);

        return redirect()->route('surat_masuk.index')->with('success', 'Surat masuk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return view('suratmasuk.edit', compact('suratMasuk'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nomor_surat' => 'required',
            'pengirim' => 'required',
            'tanggal_terima' => 'required|date',
            'isi' => 'required',
            'file_surat' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',  // File jadi opsional
        ]);

        // Temukan data berdasarkan ID
        $suratMasuk = SuratMasuk::findOrFail($id);

        // Update data surat masuk dengan input yang sudah divalidasi
        $suratMasuk->update([
            'nomor_surat' => $validated['nomor_surat'],
            'pengirim' => $validated['pengirim'],
            'tanggal_terima' => $validated['tanggal_terima'],
            'isi' => $validated['isi'],
        ]);

        // Update file surat jika ada
        if ($request->hasFile('file_surat')) {
            $fileName = time().'_'.$request->file('file_surat')->getClientOriginalName();
            $request->file('file_surat')->storeAs('surat_masuk', $fileName, 'public');
            $suratMasuk->update(['file_surat' => $fileName]);
        }

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
