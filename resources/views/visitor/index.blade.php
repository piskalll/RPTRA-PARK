@extends('layouts.visitor')

@section('content')
<div class="max-w-6xl mx-auto p-4 bg-gray rounded shadow">
    <h2 class="text-2xl font-semibold">Artikel Berita</h2>
    <!-- <form method="GET" class="mb-6 grid grid-cols-1 md:grid-cols-4 gap-4">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari artikel..." class="border p-2 rounded col-span-2"
        <select name="kategori" class="border p-2 rounded">
            <option value="">-- Semua Kategori --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('kategori') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <select name="tag" class="border p-2 rounded">
            <option value="">-- Semua Tag --</option>
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}" {{ request('tag') == $tag->id ? 'selected' : '' }}>
                    {{ $tag->name }}
                </option>
            @endforeach
        </select>

        <button class="bg-blue-600 text-white px-4 py-2 rounded col-span-1 md:col-auto">Filter</button>
    </form> -->

    @forelse ($articles as $article)
        <div class="flex-column mb-6 p-4 bg-white rounded shadow">
            <div class="w-64">
                <img src="{{ asset('storage/thumbnails/'.$article->thumbnail) }}" alt="" class="aspect-video">
            </div>
            <div class="w-32">
                <h2 class="text-xl font-bold mb-1">
                <a href="{{ route('articles.show', $article) }}" class="text-blue-700 hover:underline">
                    {{ $article->title }}
                </a>
            </h2>
            <p class="text-sm text-gray-500 mb-2">
                {{ $article->created_at->format('d M Y') }} | Kategori: {{ $article->category->name ?? '-' }}
            </p>
            <p>{{ Str::limit(strip_tags($article->content), 120) }}</p>
            </div>   
        </div>
    @empty
        <p>Tidak ada artikel ditemukan.</p>
    @endforelse

    <div class="mt-4">
        {{ $articles->links() }}
    </div>
</div>
@endsection
