
@extends('layouts.app')

@section('title', 'Vendor List')
@section('heading', 'Vendor List')

@section('content')

    @if (session('pesan'))
        <div class="success" id="pesan-sukses">
            {{ session('pesan') }}
        </div>
    @endif

    <div class="content-heading">
        <div>
            <h1>Vendor List</h1>
            <p class="description">
                Daftar supplier bahan baku yang terdaftar dalam sistem.
            </p>
        </div>

        <a href="{{ url('/tambah') }}" class="btn-tambah">
            + Tambah Supplier
        </a>
    </div>

    <!-- PENCARIAN SUPPLIER -->
    <form action="{{ url('/supplier') }}" method="GET" class="header-search">
        <input
            type="text"
            name="keyword"
            placeholder="Cari supplier..."
            value="{{ $keyword }}"
        >
        <button type="submit">Cari</button>
    </form>

    <!-- TABEL SUPPLIER -->
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Vendor</th>
                    <th>Jenis Pasokan</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($suppliers as $supplier)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="vendor-name">{{ $supplier->nama_supplier }}</td>
                        <td>{{ $supplier->jenis_pasokan }}</td>
                        <td>{{ $supplier->alamat }}</td>
                        <td>{{ $supplier->no_telepon }}</td>

                        <td>
                            <div class="actions">
                                <a href="{{ url('/edit/' . $supplier->id) }}"
                                   class="btn-edit">
                                    Edit
                                </a>

                                <form
                                    action="{{ url('/hapus/' . $supplier->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus supplier ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-hapus">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty">
                            Belum ada data supplier.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- NOTIFIKASI BERHASIL -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const pesan = document.getElementById('pesan-sukses');

            if (pesan) {
                setTimeout(function () {
                    pesan.style.transition = 'opacity 0.5s ease';
                    pesan.style.opacity = '0';

                    setTimeout(function () {
                        pesan.remove();
                    }, 500);
                }, 3000);
            }
        });
    </script>

@endsection
