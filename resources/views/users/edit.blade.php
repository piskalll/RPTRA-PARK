@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold mb-6">Edit Pengguna</h1>

    <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium mb-1">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Role</label>
            <select name="role" required class="w-full border px-3 py-2 rounded">
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="staff" {{ $user->role === 'staff' ? 'selected' : '' }}>Staff</option>
            </select>
        </div>

        <div class="flex justify-between">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Update</button>
            <a href="{{ route('users.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
@endsection
