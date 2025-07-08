@extends('layouts.public')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-4">
    <h1 class="text-4xl font-bold text-green-700 mb-4">{{ $article->title }}</h1>
    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="" class="w-full h-64 object-cover rounded mb-6">
    <div class="text-gray-800 leading-relaxed">
        {!! nl2br(e($article->content)) !!}
    </div>
</div>
@endsection