@extends('layouts.app')

@section('title', 'User')

@section('content')
  <div class="max-w-6xl mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Daftar Pengguna</h1>
        <a href="{{ route('users.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Tambah User</a>
    </div>

    @if (session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Role</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="bg-white text-black border-b :bg-gray-800 :border-gray-700 border-gray-200 hover:bg-gray-50 :hover:bg-gray-600">
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">{{ $user->role }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('users.edit', $user) }}" class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus user ini?')" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection