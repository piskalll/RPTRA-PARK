@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Daftar Galeri</h1>

    <div class="mb-4 text-right">
        <a href="{{ auth()->user()->role === 'staff' ? route('staff.galleries.create') : route('galleries.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Tambah Galeri</a>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="bg-gray-100 text-left">
                    <th scope="col" class="px-6 py-3">Gambar</th>
                    <th scope="col" class="px-6 py-3">Judul</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($galleries as $gallery)
                <tr class="bg-white text-black border-b :bg-gray-800 :border-gray-700 border-gray-200 hover:bg-gray-50 :hover:bg-gray-600">
                    <td class="px-6 py-4">
                        <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="w-20 h-16 object-cover rounded">
                    </td>
                    <td class="px-6 py-4">{{ $gallery->caption }}</td>
                    <td class="p-4 space-x-2">
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('galleries.edit', $gallery->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                            <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline mr-2">Hapus</button>
                            </form>
                        @elseif(auth()->user()->role === 'staff')
                            <a href="{{ route('staff.galleries.edit', $gallery->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                            <form action="{{ route('staff.galleries.destroy', $gallery->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline mr-2">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
