
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="auth-page">
        <div class="auth-container">

            <h2>Login</h2>
            <p class="auth-description">
                Silakan masuk ke akun Management System Anda.
            </p>

            @if ($errors->any())
                <div class="auth-error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="/login" method="POST" class="auth-form">
                @csrf

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
                           placeholder="Masukkan password"
                           required>
                </div>

                <button type="submit">Masuk</button>
            </form>

            <p class="auth-link">
                Belum punya akun?
                <a href="/register">Daftar di sini</a>
            </p>

        </div>
    </div>

</body>
</html>
