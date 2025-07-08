@extends('layouts.app')
@props(['article' => null,])

@php
    $isEdit = isset($article);
    $user = auth()->user();
    if ($user->role === 'staff') {
        $formAction = $isEdit
            ? route('staff.articles.update', $article)
            : route('staff.articles.store');
    } else {
        $formAction = $isEdit
            ? route('articles.update', $article)
            : route('articles.store');
    }
@endphp

<form action="{{ $formAction }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div>
        <label class="block font-medium mb-1">Judul Artikel</label>
        <input type="text" name="title" class="w-full border rounded p-2" value="{{ old('title', $article->title ?? '') }}" required>
    </div>

    <div>
        <label class="block font-medium mb-1">Isi Artikel</label>
        <textarea name="content" rows="6" class="w-full border rounded p-2" required>{{ old('content', $article->content ?? '') }}</textarea>
    </div>

    <div>
        <label class="block font-medium mb-1">Status</label>
        <select name="status" class="w-full border rounded p-2">
            <option value="draft" {{ old('status', $article->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="published" {{ old('status', $article->status ?? '') == 'published' ? 'selected' : '' }}>Published</option>
        </select>
    </div>

    <div>
        <label class="block font-medium mb-1">Thumbnail</label>
        <input type="file" name="thumbnail" class="w-full border p-2 rounded" accept="image/*">
        @if($isEdit && $article->thumbnail)
            <img src="{{ asset('storage/' . $article->thumbnail) }}" class="mt-2 w-40 rounded shadow">
        @endif
    </div>

    <div>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            {{ $isEdit ? 'Update Artikel' : 'Simpan Artikel' }}
        </button>
    </div>
</form>