
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="auth-page">
        <div class="auth-container">

            <h2>Buat Akun</h2>
            <p class="auth-description">
                Daftarkan akun untuk mengakses Management System.
            </p>

            @if ($errors->any())
                <div class="auth-error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="/register" method="POST" class="auth-form">
                @csrf

                <div>
                    <label>Nama Lengkap</label>
                    <input type="text" name="name"
                           value="{{ old('name') }}"
                           placeholder="Masukkan nama lengkap"
                           required>
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" name="email"
                           value="{{ old('email') }}"
                           placeholder="Masukkan email"
                           required>
                </div>

                <div>
                    <label>Password</label>
                    <input type="password" name="password"
                           placeholder="Minimal 8 karakter"
                           required>
                </div>

                <div>
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation"
                           placeholder="Ulangi password"
                           required>
                </div>

                <button type="submit">Daftar</button>
            </form>

            <p class="auth-link">
                Sudah punya akun?
                <a href="/login">Login di sini</a>
            </p>

        </div>
    </div>

</body>
</html>
