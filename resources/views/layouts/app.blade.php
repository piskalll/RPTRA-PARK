<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - @yield('title', 'Dashboard')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class=" bg-gray-100 text-gray-800">

    {{-- Navbar --}}
    <nav class="no-print bg-white shadow fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-4">
                    <a href="{{ auth()->user()->role === 'admin' ? route('dashboard') : route('staff.staffdashboard') }}" class="text-xl font-bold text-blue-600">
                        {{ auth()->user()->role === 'admin' ? 'Admin Panel' : 'Staff Panel' }}
                    </a>

                    {{-- Menu khusus Admin --}}
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('users.index') }}" class="hover:underline">Pengguna</a>
                        <a href="{{ route('parkinfo.index') }}" class="hover:underline">Informasi Taman</a>
                        <a href="{{ route('services.index') }}" class="hover:underline">Inventaris</a>
                        <a href="{{ route('facilities.index') }}" class="hover:underline">Fasilitas</a>
                        <a href="{{ route('admin.reservations.index') }}" class="hover:underline">Reservasi</a>
                        <a href="{{ route('articles.index') }}" class="hover:underline">Artikel</a>
                        <a href="{{ route('galleries.index') }}" class="hover:underline">Galeri</a>
                    @endif

                    {{-- Menu khusus Staff --}}
                    @if(auth()->user()->role === 'staff')
                        <a href="{{ route('staff.parkinfos.index') }}" class="hover:underline">Informasi Taman</a>
                        <a href="{{ route('staff.services.index') }}" class="hover:underline">Inventaris</a>
                        <a href="{{ route('staff.reservations.index') }}" class="hover:underline">Reservasi</a>
                        <a href="{{ route('staff.articles.index') }}" class="hover:underline">Artikel</a>
                        <a href="{{ route('staff.galleries.index') }}" class="hover:underline">Galeri</a>
                    @endif
                </div>

                <div class="flex items-center space-x-4">
                    <span class="text-sm hidden md:inline">Halo, {{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button class="text-red-600 hover:underline text-sm">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <main class="pt-20 px-4">
        @yield('content')
    </main>

</body>
</html>
