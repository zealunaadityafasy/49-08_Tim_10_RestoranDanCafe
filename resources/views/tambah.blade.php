
@extends('layouts.app')

@section('title', 'Tambah Supplier')
@section('heading', 'Tambah Supplier')

@section('content')

<div class="form-container">

    <div class="form-header">
        <span class="form-label">SUPPLIER MANAGEMENT SYSTEM</span>
        <h1>Tambah Supplier</h1>
        <p>Masukkan informasi supplier bahan baku baru.</p>
    </div>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/tambah') }}" method="POST" class="supplier-form">
        @csrf

        <div class="form-group">
            <label>Nama Supplier</label>
            <input type="text" name="nama_supplier"
                placeholder="Masukkan nama supplier"
                value="{{ old('nama_supplier') }}" required>
        </div>

        <div class="form-group">
            <label>Jenis Pasokan</label>
            <input type="text" name="jenis_pasokan"
                placeholder="Contoh: Bahan makanan"
                value="{{ old('jenis_pasokan') }}" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat"
                placeholder="Masukkan alamat supplier"
                required>{{ old('alamat') }}</textarea>
        </div>

        <div class="form-group">
            <label>No. Telepon</label>
            <input type="text" name="no_telepon"
                placeholder="Masukkan nomor telepon"
                value="{{ old('no_telepon') }}" required>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-simpan">
                Simpan Supplier
            </button>

            <a href="{{ url('/') }}" class="btn-kembali">
                Kembali
            </a>
        </div>
    </form>

</div>

@endsection
