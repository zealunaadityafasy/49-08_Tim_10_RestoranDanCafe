@extends('layouts.app')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Staff & Pegawai</h1>
        <a href="{{ route('pegawai.create') }}" class="bg-emerald-700 hover:bg-emerald-800 text-white px-4 py-2 rounded-lg text-sm font-medium transition no-underline">
            + Tambah Pegawai
        </a>
    </div>

    @if (session('status') === 'tambah')
        <p class="text-emerald-700 font-medium mb-4">Pegawai berhasil ditambahkan.</p>
    @elseif (session('status') === 'ubah')
        <p class="text-emerald-700 font-medium mb-4">Data pegawai berhasil diubah.</p>
    @elseif (session('status') === 'hapus')
        <p class="text-emerald-700 font-medium mb-4">Pegawai berhasil dihapus.</p>
    @endif

    @if ($errors->any())
        <ul class="text-red-500 mb-4 list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Form Pencarian & Filter -->
    <form method="GET" action="{{ route('pegawai.index') }}" class="flex items-center space-x-3 mb-6">
        <input type="text" name="q"
               placeholder="Cari nama pegawai"
               value="{{ $q }}"
               class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <select name="posisi" class="border border-gray-300 rounded-lg px-4 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">Semua posisi</option>
            @foreach ($daftarPosisi as $posisi)
                <option value="{{ $posisi }}"
                    {{ $filter === $posisi ? 'selected' : '' }}>
                    {{ $posisi }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium transition border border-gray-300">Cari</button>
    </form>

    <!-- Tabel Data -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-blue-50 text-blue-900 text-sm font-semibold border-b">
                    <th class="p-3.5">Nama</th>
                    <th class="p-3.5">Posisi</th>
                    <th class="p-3.5">Jabatan Kerja</th>
                    <th class="p-3.5">Kontak</th>
                    <th class="p-3.5">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @forelse ($pegawai as $data)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3.5 font-medium">{{ $data->nama }}</td>
                        <td class="p-3.5">{{ $data->posisi }}</td>
                        <td class="p-3.5">{{ $data->jabatan_kerja }}</td>
                        <td class="p-3.5">{{ $data->kontak }}</td>
                        <td class="p-3.5">
                            <div class="flex items-center space-x-2">
                                <a class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1.5 rounded-md text-xs font-medium no-underline"
                                   href="{{ route('pegawai.edit', $data->id_pegawai) }}">
                                    Ubah
                                </a>

                                <form method="POST"
                                      action="{{ route('pegawai.destroy', $data->id_pegawai) }}"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-md text-xs font-medium cursor-pointer" type="submit">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500">Belum ada data pegawai.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection