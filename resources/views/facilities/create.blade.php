@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Fasilitas</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('facilities.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block font-medium">Nama Fasilitas</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-medium">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full border border-gray-300 rounded px-3 py-2">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block font-medium">Gambar</label>
            <input type="file" name="image" class="border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
            <a href="{{ route('facilities.index') }}" class="ml-2 text-gray-600 hover:underline">Kembali</a>
        </div>
    </form>
</div>
@endsection
