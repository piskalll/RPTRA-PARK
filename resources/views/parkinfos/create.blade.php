@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-md mt-6">
    <h2 class="text-2xl font-semibold mb-4">Tambah Informasi Taman</h2>

    <form action="{{ auth()->user()->role === 'staff' ? route('staff.parkinfos.store') : route('parkinfo.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200 focus:border-green-300" required>
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Isi</label>
            <textarea name="content" id="content" rows="6"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200 focus:border-green-300"
                required>{{ old('content') }}</textarea>
        </div>

        @if (auth()->user()->role === 'staff')
            <div class="flex justify-end gap-2">
                <a href="{{ route('staff.parkinfos.index') }}"
                    class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Batal</a>
                <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Simpan</button>
            </div>
        @endif
        @if (auth()->user()->role === 'admin')
            <div class="flex justify-end gap-2">
                <a href="{{ route('parkinfo.index') }}"
                    class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Batal</a>
                <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Simpan</button>
            </div>
        @endif
    </form>
</div>
@endsection
