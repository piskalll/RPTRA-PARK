@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Informasi Taman</h1>
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('parkinfo.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Tambah Info</a>
        @elseif(auth()->user()->role === 'staff')
            <a href="{{ route('staff.parkinfos.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Tambah Info</a>
        @endif
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th scope="col" class="px-6 py-3">Judul</th>
                <th scope="col" class="px-6 py-3">Dibuat</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($infos as $info)
            <tr class="bg-white text-black border-b :bg-gray-800 :border-gray-700 border-gray-200 hover:bg-gray-50 :hover:bg-gray-600">
                <td class="px-6 py-4">{{ $info->title }}</td>
                <td class="px-6 py-4">{{ $info->created_at->format('d M Y') }}</td>
                @if(auth()->user()->role === 'admin')
                        <td class="px-6 py-4">
                            <a href="{{ route('parkinfo.edit', $info) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('parkinfo.destroy', $info) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                        @endif
                        {{-- Menu khusus Staff --}}
                        @if(auth()->user()->role === 'staff')
                            <td class="px-6 py-4">
                                <a href="{{ route('staff.parkinfos.edit', $info) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('staff.parkinfos.destroy', $info) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        @endif
                
            </tr>
            @empty
            <tr><td colspan="3" class="p-4 text-center">Belum ada informasi taman.</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>
@endsection
