<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-gray-100" style="background-image: url('{{ asset('storage/image/bgjpg.jpg') }}'); background-size: cover; background-position: center;">
    <form method="POST" action="/login" class="bg-white p-6 rounded shadow-md w-96 bg-opacity-30">
        @csrf
        <h2 class="text-xl font-bold mb-4">Login</h2>

        @if($errors->any())
            <div class="mb-4 text-red-600">{{ $errors->first() }}</div>
        @endif

        <div class="mb-4">
            <labe class="font-bold"l>Email</labe>
            <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded" value="{{ old('email') }}">
        </div>

        <div class="mb-4">
            <label class="font-bold">Password</label>
            <input type="password" name="password" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <button class="w-full bg-blue-500 text-white p-2 rounded">Login</button>
    </form>
</body>
</html>
