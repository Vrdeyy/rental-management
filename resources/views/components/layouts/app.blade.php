<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental System</title>

    <!-- Tailwind CDN (dev mode, jangan sok production) -->
    <script src="https://cdn.tailwindcss.com"></script>

    @livewireStyles
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-200 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white/90 backdrop-blur shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-lg font-semibold tracking-wide text-blue-600">
                RentalApp
            </a>

            <div class="flex items-center gap-6 text-sm font-medium">
                <a href="/" class="text-gray-600 hover:text-blue-600 transition">
                    Home
                </a>
                <a href="/admin" class="text-gray-600 hover:text-blue-600 transition">
                    Admin
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 py-10">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="mt-auto border-t bg-white/70">
        <div class="max-w-7xl mx-auto px-6 py-4 text-xs text-gray-500 text-center">
            © {{ date('Y') }} RentalApp. Hidup ini berat, sewa aja dulu.
        </div>
    </footer>

    @livewireScripts
</body>
</html>
