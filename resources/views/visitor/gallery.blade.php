@extends('layouts.visitor')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Galeri Taman</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse ($galleries as $gallery)
            <div class="bg-white shadow rounded overflow-hidden">
                <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold">{{ $gallery->title }}</h2>
                    <p class="text-sm text-gray-600 mt-2">{{ $gallery->description }}</p>
                </div>
            </div>
        @empty
            <p>Tidak ada gambar di galeri saat ini.</p>
        @endforelse
    </div>
</div>
@endsection
