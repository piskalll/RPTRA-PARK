@extends('layouts.public')

@section('content')
<div class="max-w-xl mx-auto bg-white py-24 rounded shadow">
    <h1 class="text-2xl font-semibold mb-4">Pesan Fasilitas: {{ $facility->name }}</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservations.store', $facility) }}" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1">Nama</label>
                <input type="text" name="name" class="w-full border rounded p-2" value="{{ old('name') }}" required>
            </div>
            <div>
                <label class="block mb-1">Instansi (opsional)</label>
                <input type="text" name="instance" class="w-full border rounded p-2" value="{{ old('instance') }}">
            </div>
            <div>
                <label class="block mb-1">Alamat (opsional)</label>
                <input type="text" name="address" class="w-full border rounded p-2" value="{{ old('address') }}">
            </div>
            <div>
                <label class="block mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded p-2" value="{{ old('email') }}">
            </div>
            <div>
                <label class="block mb-1">No. Telepon (opsional)</label>
                <input type="text" name="phone" class="w-full border rounded p-2" value="{{ old('phone') }}">
            </div>
            <div>
                <label class="block mb-1">Tanggal</label>
                <input type="date" name="reservation_date" class="w-full border rounded p-2" value="{{ old('reservation_date') }}" required>
            </div>
            <div>
                <label class="block mb-1">Jumlah Orang</label>
                <input type="number" name="number_of_people" class="w-full border rounded p-2" value="{{ old('number_of_people') }}" min="1" required>
            </div>
            <div>
                <label class="block mb-1">Jam Mulai (opsional)</label>
                <input type="datetime-local" name="hour_start" class="w-full border rounded p-2" value="{{ old('hour_start') }}">
            </div>
            <div>
                <label class="block mb-1">Jam Selesai (opsional)</label>
                <input type="datetime-local" name="hour_end" class="w-full border rounded p-2" value="{{ old('hour_end') }}">
            </div>
            <div>
                <label class="block mb-1">Jenis Reservasi</label>
                <select name="indoor_outdoor" class="w-full border rounded p-2">
                    <option value="indoor" {{ old('indoor_outdoor') == 'indoor' ? 'selected' : '' }}>Indoor</option>
                    <option value="outdoor" {{ old('indoor_outdoor') == 'outdoor' ? 'selected' : '' }}>Outdoor</option>
                </select>
            </div>
            <div class="md:col-span-2">
                <label class="block mb-1">Catatan (opsional)</label>
                <textarea name="notes" class="w-full border rounded p-2">{{ old('notes') }}</textarea>
            </div>
            <input type="hidden" name="status" value="pending">
            <div class="md:col-span-2">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 w-full md:w-auto">Kirim Pesanan</button>
            </div>
        </div>
    </form>
</div>
@endsection
