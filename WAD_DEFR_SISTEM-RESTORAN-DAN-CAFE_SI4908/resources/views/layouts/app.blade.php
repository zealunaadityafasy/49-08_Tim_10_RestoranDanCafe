<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff & Pegawai</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <!-- Kontainer Full Page Tanpa Sidebar -->
    <div class="min-h-screen flex flex-col">
        
        <!-- Header Atas -->
        <header class="bg-white shadow-sm h-16 flex items-center justify-between px-8 border-b">
            <div class="text-sm font-semibold text-gray-600">
                Staff & Pegawai
            </div>
            <div class="flex items-center space-x-3">
                <span class="text-sm font-medium text-gray-700">Admin</span>
            </div>
        </header>

        <!-- Bagian Isi Halaman (Full Width) -->
        <main class="flex-1 p-8 max-w-7xl mx-auto w-full">
            @yield('content')
        </main>

    </div>

</body>
</html>