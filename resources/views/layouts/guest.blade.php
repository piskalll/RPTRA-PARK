<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Berita' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

    <header class="bg-white shadow">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">
                <a href="{{ route('home') }}">Portal Berita</a>
            </h1>
            <nav>
                <a href="{{ route('home') }}" class="text-blue-600 hover:underline mx-2">Beranda</a>
                <a href="{{ route('articles.public') }}" class="text-blue-600 hover:underline mx-2">Artikel</a>
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline mx-2">Login</a>
            </nav>
        </div>
    </header>

    <main class="max-w-6xl mx-auto p-4">
        @yield('content')
    </main>

    <footer class="bg-white border-t mt-10 py-4 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} Portal Berita. Semua hak dilindungi.
    </footer>

</body>
</html>
