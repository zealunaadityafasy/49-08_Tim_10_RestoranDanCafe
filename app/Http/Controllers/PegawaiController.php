<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    // READ: Menampilkan data pegawai
    public function index(Request $request)
    {
        $query = Pegawai::query();

        if ($request->filled('q')) {
            $query->where('nama', 'like', '%' . $request->q . '%');
        }

        if ($request->filled('posisi')) {
            $query->where('posisi', $request->posisi);
        }

        $pegawai = $query->orderBy('id_pegawai')->get();

        $daftarPosisi = Pegawai::select('posisi')
            ->distinct()
            ->orderBy('posisi')
            ->pluck('posisi');

        return view('pegawai.index', [
            'pegawai' => $pegawai,
            'daftarPosisi' => $daftarPosisi,
            'q' => $request->q,
            'filter' => $request->posisi,
        ]);
    }

    // CREATE: Menampilkan form tambah
    public function create()
    {
        return view('pegawai.create');
    }

    // CREATE: Menyimpan data baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'posisi' => 'required|string|max:100',
            'jabatan_kerja' => 'required|string|max:100',
            'kontak' => 'required|string|max:30',
        ]);

        Pegawai::create($data);

        return redirect()->route('pegawai.index')
            ->with('status', 'tambah');
    }

    // UPDATE: Menampilkan form edit
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    // UPDATE: Menyimpan perubahan
    public function update(Request $request, Pegawai $pegawai)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'posisi' => 'required|string|max:100',
            'jabatan_kerja' => 'required|string|max:100',
            'kontak' => 'required|string|max:30',
        ]);

        $pegawai->update($data);

        return redirect()->route('pegawai.index')
            ->with('status', 'ubah');
    }

    // DELETE: Menghapus data
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();

        return redirect()->route('pegawai.index')
            ->with('status', 'hapus');
    }
}
