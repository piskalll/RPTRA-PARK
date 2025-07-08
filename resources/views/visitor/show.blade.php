@extends('layouts.visitor')

@section('content')
<div class="max-w-3xl mx-auto p-4 bg-white rounded shadow">
    <h1 class="text-3xl font-bold mb-2">{{ $article->title }}</h1>
    <p class="text-sm text-gray-500 mb-4">
        {{ $article->created_at->format('d M Y') }} | Kategori: {{ $article->category->name ?? '-' }}
    </p>

    @if ($article->thumbnail)
        <img src="{{ asset('storage/' . $article->thumbnail) }}" class="w-full rounded mb-4">
    @endif

    <div class="prose max-w-full">
        {!! nl2br(e($article->content)) !!}
    </div>

    @if ($article->tags->count())
        <div class="mt-6">
            <strong>Tags:</strong>
            @foreach ($article->tags as $tag)
                <span class="inline-block bg-gray-200 text-sm px-2 py-1 rounded mr-2">{{ $tag->name }}</span>
            @endforeach
        </div>
    @endif
</div>
@endsection
