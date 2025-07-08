@extends('layouts.public')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-24">
    <h1 class="text-3xl font-bold mb-6 text-center">Fasilitas Taman</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse ($facilities as $facility)
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-4">
                @if ($facility->image)
                    <img src="{{ asset('storage/' . $facility->image) }}" alt="{{ $facility->name }}" class="w-full h-48 object-cover rounded mb-4">
                @endif

                <h2 class="text-xl font-semibold mb-2">{{ $facility->name }}</h2>
                <p class="text-gray-600 mb-3">{{ Str::limit($facility->description, 100) }}</p>
                
                <a href="{{ route('reservations.create', $facility->id) }}" class="text-white bg-green-600 hover:bg-green-700 px-4 py-2 rounded">
                    Pesan Fasilitas
                </a>
            </div>
        @empty
            <p class="col-span-3 text-center text-gray-500">Belum ada fasilitas tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
