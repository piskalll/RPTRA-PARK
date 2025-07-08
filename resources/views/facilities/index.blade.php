@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Fasilitas</h1>
        <a href="{{ route('facilities.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">+ Tambah Fasilitas</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($facilities as $facility)
            <div class="bg-white rounded shadow p-4">
                @if($facility->image)
                    <img src="{{ asset('storage/' . $facility->image) }}" class="w-full h-40 object-cover rounded mb-3">
                @endif
                <h2 class="text-xl font-semibold">{{ $facility->name }}</h2>
                <p class="text-sm text-gray-600 mb-3">{{ $facility->description }}</p>
                <div class="flex gap-2">
                    <a href="{{ route('facilities.edit', $facility) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('facilities.destroy', $facility) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
