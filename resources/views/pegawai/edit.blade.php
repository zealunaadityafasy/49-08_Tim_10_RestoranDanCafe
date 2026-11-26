
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Pegawai</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; padding: 30px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 25px; border-radius: 10px; }
        input { display: block; width: 100%; box-sizing: border-box; padding: 10px; margin: 8px 0 18px; }
        button, a { padding: 10px 14px; border: none; border-radius: 5px; text-decoration: none; cursor: pointer; }
        button { background: #176b45; color: white; }
        a { background: #ddd; color: black; }
    </style>
</head>
<body>
<div class="container">
    <h1>Ubah Pegawai</h1>

    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST"
          action="{{ route('pegawai.update', $pegawai->id_pegawai) }}">
        @csrf
        @method('PUT')

        <label>Nama</label>
        <input type="text" name="nama"
               value="{{ old('nama', $pegawai->nama) }}" required>

        <label>Posisi</label>
        <input type="text" name="posisi"
               value="{{ old('posisi', $pegawai->posisi) }}" required>

        <label>Jabatan Kerja</label>
        <input type="text" name="jabatan_kerja"
               value="{{ old('jabatan_kerja', $pegawai->jabatan_kerja) }}" required>

        <label>Kontak</label>
        <input type="text" name="kontak"
               value="{{ old('kontak', $pegawai->kontak) }}" required>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('pegawai.index') }}">Kembali</a>
    </form>
</div>
</body>
</html>
