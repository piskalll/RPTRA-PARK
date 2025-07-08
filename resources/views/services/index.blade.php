@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">Daftar Layanan Taman</h2>
        <a href="{{ auth()->user()->role === 'staff' ? route('staff.services.create') : route('services.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Tambah Layanan</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th scope="col" class="px-6 py-3">#</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Deskripsi</th>
                    <th scope="col" class="px-6 py-3">Gambar</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                    <tr class="bg-white text-black border-b :bg-gray-800 :border-gray-700 border-gray-200 hover:bg-gray-50 :hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $service->name }}</td>
                        <td class="px-6 py-4">{{ Str::limit($service->description, 50) }}</td>
                        <td class="px-6 py-4">
                            @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" class="w-20 rounded">
                            @endif
                        </td>
                        @if(auth()->user()->role === 'admin')
                            <td class="px-6 py-4">
                                <a href="{{ route('services.edit', $service) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('services.destroy', $service) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                            @endif
                            {{-- Menu khusus Staff --}}
                            @if(auth()->user()->role === 'staff')
                                <td class="px-6 py-4">
                                    <a href="{{ route('staff.services.edit', $service) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('staff.services.destroy', $service) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            @endif
                    </tr>
                @empty
                    <tr><td colspan="5" class="p-4 text-center text-gray-500">Belum ada layanan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
</div>
@endsection
