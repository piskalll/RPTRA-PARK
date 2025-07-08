@extends('layouts.public')

@section('content')
<div class="max-w-6xl mx-auto py-24 px-4">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Semua Artikel</h2>
    <div class="grid md:grid-cols-3 gap-6">
        @foreach($articles as $article)
            <a href="{{ route('visitor.articles.show', $article->id) }}" class="bg-white p-4 rounded shadow hover:shadow-lg">
                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="" class="h-40 w-full object-cover rounded mb-3">
                <h3 class="text-lg font-semibold text-gray-800">{{ $article->title }}</h3>
                <p class="text-sm text-gray-600">{{ Str::limit($article->content, 100) }}</p>
            </a>
        @endforeach
    </div>
    <div class="mt-6">
        {{ $articles->links() }}
    </div>
</div>
@endsection