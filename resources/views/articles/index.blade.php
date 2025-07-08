@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Daftar Artikel</h1>

    <div class="mb-4 text-right">
        <a href="{{ route('articles.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-4 rounded">Tambah Artikel</a>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="bg-gray-100 text-left">
                    <th scope="col" class="px-6 py-3">Judul</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr class="bg-white text-black border-b :bg-gray-800 :border-gray-700 border-gray-200 hover:bg-gray-50 :hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $article->title }}</td>
                        <td class="px-6 py-4 capitalize">{{ $article->status }}</td>
                        @if(auth()->user()->role === 'admin')
                        <td class="px-6 py-4">
                            <a href="{{ route('articles.edit', $article) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                            <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin hapus?')" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                        @endif
                        {{-- Menu khusus Staff --}}
                        @if(auth()->user()->role === 'staff')
                            <td class="px-6 py-4">
                                <a href="{{ route('staff.articles.edit', $article) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                                <form action="{{ route('staff.articles.destroy', $article) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus?')" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        @endif
                        </tr>
                    @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $articles->links() }}
        </div>
    </div>
</div>
@endsection