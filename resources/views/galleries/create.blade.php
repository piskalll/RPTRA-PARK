@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Tambah Galeri</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ auth()->user()->role === 'staff' ? route('staff.galleries.store') : route('galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block font-medium">Judul</label>
            <input type="text" name="caption" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label class="block font-medium">Gambar</label>
            <input type="file" name="image" accept="image/*" class="w-full">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
