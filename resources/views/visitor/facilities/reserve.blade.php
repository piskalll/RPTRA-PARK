@extends('layouts.visitor')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Pesan Fasilitas: {{ $facility->name }}</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
    <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('public.facility.reserve.submit', $facility->id) }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="block font-medium">Nama Lengkap</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
        </div>

        <div>
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
        </div>

        <div>
            <label for="phone" class="block font-medium">No. Telepon</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
        </div>

        <div>
            <label for="reservation_date" class="block font-medium">Tanggal Pemesanan</label>
            <input type="date" name="reservation_date" id="reservation_date" value="{{ old('reservation_date') }}" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
        </div>

        <div>
            <label for="notes" class="block font-medium">Catatan (Opsional)</label>
            <textarea name="notes" id="notes" rows="3"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200">{{ old('notes') }}</textarea>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
            Kirim Pemesanan
        </button>
    </form>
</div>
@endsection
