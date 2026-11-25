<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Menu - SXIO</title>
  <link rel="stylesheet" href="{{ asset('css/sxio.css') }}">
  <style>
    body { background-image: url("{{ asset('img/latar-sxio.svg') }}"); background-size: cover; background-attachment: fixed; color: #fff; }
    .form-box { max-width: 480px; margin: 40px auto; padding: 24px; background: rgba(0,0,0,.65); border: 1px solid #ffffff55; border-radius: 10px; }
    label { display: block; margin-top: 12px; font-weight: bold; }
    input, select, textarea { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
    button { margin-top: 18px; padding: 10px 18px; cursor: pointer; }
    .error { color: #ff7b7b; font-size: 13px; }
  </style>
</head>
<body>
  <div class="form-box">
    <h2>Tambah Menu</h2>

    @if ($errors->any())
      <div class="error">
        @foreach ($errors->all() as $e) <div>{{ $e }}</div> @endforeach
      </div>
    @endif

    <form action="{{ url('/menu') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <label>Nama</label>
      <input type="text" name="nama" value="{{ old('nama') }}" required>

      <label>Harga (angka saja)</label>
      <input type="number" name="harga" value="{{ old('harga') }}" required>

      <label>Kategori</label>
      <select name="kategori">
        <option>Main Course</option>
        <option>Dessert</option>
        <option>Drink</option>
      </select>

      <label>Halal</label>
      <select name="halal">
        <option>Halal</option>
        <option>Non Halal</option>
      </select>

      <label>Deskripsi</label>
      <textarea name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>

      <label>Alergen</label>
      <input type="text" name="alergen" value="{{ old('alergen', 'Tidak') }}">

      <label>Foto (opsional)</label>
      <input type="file" name="foto" accept="image/*">

      <button type="submit">Simpan</button>
      <a href="{{ url('/menu') }}" style="color:#fff;margin-left:10px;">Kembali</a>
    </form>
  </div>
</body>
</html>