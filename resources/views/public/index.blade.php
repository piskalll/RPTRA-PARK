@extends('layouts.visitor')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Informasi Taman</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse ($infos as $info)
            <div class="p-4 border rounded-lg hover:shadow transition">
                <h2 class="text-xl font-semibold mb-2">
                    <a href="{{ route('public.park-infos.show', $info) }}" class="text-blue-600 hover:underline">
                        {{ $info->title }}
                    </a>
                </h2>
                <p class="text-sm text-gray-500 mb-2">{{ $info->created_at->translatedFormat('d F Y') }}</p>
                <p class="text-gray-700">{{ \Str::limit(strip_tags($info->description), 120) }}</p>
            </div>
        @empty
            <p>Tidak ada informasi taman tersedia.</p>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $infos->links() }}
    </div>
</div>
@endsection
