
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Management System')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="app-layout">

        <aside class="sidebar">
            <h2>Management System</h2>

            <nav>
                <a href="/dashboard"
                   class="{{ request()->is('dashboard') || request()->is('/') ? 'active' : '' }}">
                    Dashboard
                </a>

                <a href="/supplier"
                   class="{{ request()->is('supplier') || request()->is('tambah') || request()->is('edit/*') ? 'active' : '' }}">
                    Supplier
                </a>

                <a href="#">Menu</a>
                <a href="#">Meja & Area</a>
                <a href="#">Staff</a>
            </nav>
        </aside>

        <main class="main-content">

            <header class="topbar" style="display: flex; justify-content: space-between; align-items: center;">
                <h3>@yield('heading', 'Dashboard')</h3>

                <div style="display: flex; align-items: center; gap: 15px;">
                    <span>Halo, {{ Auth::user()->name }}</span>

                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" style="background: #dc2626; color: white; border: none; padding: 10px 16px; border-radius: 6px; cursor: pointer;">
                            Logout
                        </button>
                    </form>
                </div>
            </header>

            <section class="content">
                @yield('content')
            </section>

        </main>
    </div>

</body>
</html>
