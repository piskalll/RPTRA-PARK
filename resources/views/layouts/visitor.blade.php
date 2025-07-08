<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Informasi Taman</title>

    <link rel="stylesheet" href="{{ asset('storage/assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    <style>
    /* Hide scrollbar but allow scroll */
    body {
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none;  /* IE and Edge */
        overflow-y: scroll; /* Always show scroll area, but hide bar */
    }
    body::-webkit-scrollbar {
        display: none; /* Chrome, Safari, Opera */
    }
</style>
</head>

<body class="overflow-x-hidden text-gray-800 flex flex-col min-h-screen">    
    <nav class="no-print absolute bg-opacity-20 top-0 left-0 w-full z-30 bg-transparent text-white transition-all duration-300">
    <div class="container mx-auto flex flex-wrap items-center justify-between p-4">
        <a href="{{ route('home') }}" class="flex items-center space-x-3">
            <img src="{{ asset('storage/image/logo.svg') }}" class="h-10" alt="Logo" />
            <span class="text-xl font-bold drop-shadow">Mutiara Rawa Binong</span>
        </a>
        <div class="flex items-center space-x-4">
            <ul class="hidden md:flex space-x-2 text-sm font-medium">
                <li class="text-white md:mr-12 hover:text-blue-600">
                    <a href="{{ route('visitor.articles.index') }}">
                        Artikel
                    </a>
                </li>
                <li class="text-white md:mr-12 hover:text-blue-600">
                    <a href="{{ route('public.facilities') }}">
                        Fasilitas
                    </a>
                </li>
            </ul>
            <a href="{{ route('login') }}"
                class="px-4 py-2 bg-white/80 text-emerald-700 font-semibold rounded-lg shadow hover:bg-emerald-600 hover:text-white transition drop-shadow">
                Login
            </a>
        </div>
    </div>
</nav>

    <!-- Main Content -->
    <main class="container mx-auto flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="no-print w-full">
        <div class="relative w-full">
            <!-- Background image with blur -->
            <div class="absolute inset-0 w-full h-full bg-cover bg-center blur-sm opacity-70"
                style="background-image: url('{{ asset('storage/image/banner1.jpeg') }}');"></div>
            <!-- Overlay for better readability -->
            <div class="absolute inset-0 bg-green-900/60"></div>
            <!-- Footer content -->
            <div class="relative z-10 text-white text-center py-4 font-semibold">
                &copy; {{ date('Y') }} Mutiara Rawa Binong
            </div>
        </div>
    </footer>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>