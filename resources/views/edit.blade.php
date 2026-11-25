
@extends('layouts.app')

@section('title', 'Edit Supplier')
@section('heading', 'Edit Supplier')

@section('content')

<div class="form-container">

    <div class="form-header">
        <span class="form-label">SUPPLIER MANAGEMENT SYSTEM</span>
        <h1>Edit Supplier</h1>
        <p>Perbarui informasi data supplier bahan baku.</p>
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

    <form action="{{ url('/edit/' . $supplier->id) }}"
          method="POST" class="supplier-form">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Supplier</label>
            <input
                type="text"
                name="nama_supplier"
                placeholder="Masukkan nama supplier"
                value="{{ old('nama_supplier', $supplier->nama_supplier) }}"
                required>
        </div>

        <div class="form-group">
            <label>Jenis Pasokan</label>
            <input
                type="text"
                name="jenis_pasokan"
                placeholder="Masukkan jenis pasokan"
                value="{{ old('jenis_pasokan', $supplier->jenis_pasokan) }}"
                required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea
                name="alamat"
                placeholder="Masukkan alamat supplier"
                required>{{ old('alamat', $supplier->alamat) }}</textarea>
        </div>

        <div class="form-group">
            <label>No. Telepon</label>
            <input
                type="text"
                name="no_telepon"
                placeholder="Masukkan nomor telepon"
                value="{{ old('no_telepon', $supplier->no_telepon) }}"
                required>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-simpan">
                Simpan Perubahan
            </button>

            <a href="{{ url('/') }}" class="btn-kembali">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection
