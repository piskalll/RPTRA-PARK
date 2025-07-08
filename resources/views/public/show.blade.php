@extends('layouts.public')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <a href="{{ route('public.park-infos') }}" class="text-blue-500 hover:underline mb-4 inline-block">← Kembali ke Informasi Taman</a>

    <h1 class="text-3xl font-bold mb-4">{{ $parkInfo->title }}</h1>
    <p class="text-sm text-gray-500 mb-6">Diterbitkan pada {{ $parkInfo->created_at->translatedFormat('d F Y') }}</p>

    <div class="prose max-w-none">
        {!! nl2br(e($parkInfo->description)) !!}
    </div>
</div>
@endsection
