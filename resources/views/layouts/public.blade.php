<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Taman</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-800">
    <header class="no-print shadow mb-2">
    <div class="relative flex max-w-screen-xl flex-col overflow-hidden px-4 py-4 md:mx-auto md:flex-row md:items-center">
        <a href="{{ route('home') }}" class="flex items-center whitespace-nowrap text-2xl font-black">
        <img src="{{ asset('storage/image/logo.svg') }}" alt="logo" class="h-10 mr-2">
        <span class="text-black">Mutiara Rawa Binong</span>
        </a>
        <input type="checkbox" class="peer hidden" id="navbar-open" />
        <label class="absolute top-5 right-7 cursor-pointer md:hidden" for="navbar-open">
        <span class="sr-only">Toggle Navigation</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        </label>
        <nav aria-label="Header Navigation" class="peer-checked:mt-8 peer-checked:max-h-56 flex max-h-0 w-full flex-col items-center justify-between overflow-hidden transition-all md:ml-24 md:max-h-full md:flex-row md:items-start">
        <ul class="flex flex-col items-center space-y-2 md:ml-auto md:flex-row md:space-y-0">
            <li class="text-gray-600 md:mr-12 hover:text-blue-600"><a href="{{ route('visitor.articles.index') }}">Artikel</a></li>
            <li class="text-gray-600 md:mr-12 hover:text-blue-600"><a href="{{ route('public.facilities') }}">Fasilitas</a></li>
            <li class="text-gray-600 md:mr-12 hover:text-blue-600">
                <a href="{{ route('login') }}">
                    <button class="rounded-md border-2 border-blue-600 px-6 py-1 font-medium text-blue-600 transition-colors hover:bg-blue-600 hover:text-white" href="{{ route('login') }}">Login</button>
                </a>
            </li>
        </ul>
        </nav>
    </div>
    </header>


    <main>
        @yield('content')
    </main>

    <footer class="no-print bg-white text-center py-4 mt-12 border-t">
        <p class="text-sm text-gray-500">© {{ date('Y') }} Portal Taman</p>
    </footer>
</body>
</html>
