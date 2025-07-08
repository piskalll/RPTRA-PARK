@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Edit Galeri</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ auth()->user()->role === 'staff' ? route('staff.galleries.update', $gallery->id) : route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium mb-1">Judul</label>
            <input type="text" name="caption" value="{{ old('caption', $gallery->caption) }}" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-medium mb-1">Gambar Saat Ini</label>
            <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="gambar" class="w-40 h-32 object-cover rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Ganti Gambar (opsional)</label>
            <input type="file" name="image" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('galleries.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
