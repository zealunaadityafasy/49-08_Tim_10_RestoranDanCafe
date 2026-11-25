<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>RESTORAN SXIO</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/sxio.css') }}">
  <style>
    body {
      background-image: url("{{ asset('img/latar-sxio.svg') }}");
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
    }
    .kategori{color:#fff;text-align:center;margin:30px 0 10px;text-shadow:0 2px 6px #000}
    .grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(230px,1fr));gap:18px;
          max-width:1100px;margin:0 auto 30px;padding:0 16px}
    .kartu{background:rgba(0,0,0,.6);color:#fff;border:1px solid #ffffff55;border-radius:10px;overflow:hidden}
    .kartu .foto{width:100%;height:160px;object-fit:cover;display:block;background:#222}
    .kartu .kosong{height:160px;display:grid;place-items:center;font-size:42px;background:#222}
    .kartu .isi{padding:12px 14px}
    .kartu h3{margin:0 0 4px}
    .harga{color:#f4c15d;font-weight:bold}
    .desk{font-size:14px;opacity:.9;margin:8px 0}
    .badge{display:inline-block;padding:2px 9px;border-radius:999px;font-size:12px;font-weight:bold}
    .halal{background:#1b7a3d}
    .non{background:#c0392b}
    .alergen{font-size:12px;margin-top:6px;opacity:.85}
  </style>
</head>
<body>
  <main>
    <div class="header">
      <img src="{{ asset('img/logo.svg') }}" alt="Logo SXIO" class="profile">
      <h1>LIST MENU RESTORAN SXIO</h1>
    </div>

    @foreach ($data as $kategori => $items)
      <h2 class="kategori">{{ strtoupper($kategori) }}</h2>
      <div class="grid">
        @foreach ($items as $m)
          <div class="kartu">
            @if ($m->foto)
              <img class="foto" src="{{ asset('uploads/' . $m->foto) }}" alt="{{ $m->nama }}">
            @else
              <div class="kosong">🍽️</div>
            @endif
            <div class="isi">
              <h3>{{ $m->nama }}</h3>
              <div class="harga">Rp {{ number_format($m->harga, 0, ',', '.') }}</div>
              @if (!empty($m->deskripsi))
                <p class="desk">{{ $m->deskripsi }}</p>
              @endif
              <span class="badge {{ $m->halal === 'Halal' ? 'halal' : 'non' }}">{{ $m->halal }}</span>
              @if ($m->alergen)
                <div class="alergen">⚠ Alergen: {{ $m->alergen }}</div>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    @endforeach
  </main>
</body>
</html>