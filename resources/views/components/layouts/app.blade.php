<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentalApp | Premium Rental System</title>
    
    <!-- Google Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); }
    </style>
    @livewireStyles
</head>
<body class="min-h-screen bg-[#f8fafc] text-[#1e293b]">

    <!-- Navbar Modern -->
    <nav class="sticky top-0 z-50 glass border-b border-white/20 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="group flex items-center gap-2">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-blue-200 group-hover:scale-110 transition">R</div>
                <span class="text-xl font-bold tracking-tight text-slate-800">Rental<span class="text-blue-600">App</span></span>
            </a>

            <div class="hidden md:flex items-center gap-8 text-sm font-semibold uppercase tracking-wider">
                <a href="/" class="text-slate-600 hover:text-blue-600 transition">Explore</a>
                <a href="/admin" class="px-5 py-2.5 bg-slate-900 text-white rounded-full hover:bg-blue-600 transition shadow-md">Admin Portal</a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-12">
        {{ $slot }}
    </main>

    <footer class="mt-20 border-t border-slate-200/60 bg-white py-12">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-slate-400 text-sm font-medium">© 2026 Admin Rental. All rights reserved.</p>
            <p class="mt-2 text-slate-300 text-[10px] uppercase tracking-[0.2em]">Crafted by Vrdeyy</p>
        </div>
    </footer>

    @livewireScripts
</body>
</html>