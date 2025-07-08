@extends('layouts.public')

@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded shadow" id="print-area">
    <div class="text-center mb-4">
        {{-- Optional: Add your logo --}}
        <!-- <img src="{{ asset('storage/image/logo.svg') }}" alt="Logo" class="mx-auto mb-2" style="max-height:60px;"> -->
        <h1 class="text-xl font-bold uppercase">RPTRA Mutiara Rawa Binong</h1>
        <div class="text-sm text-gray-600 mb-2">Jl. Raya Rawa Binong RT 001 RW 10, Lubang Buaya, Cipayung, Kota Jakarta Timur.</div>
        <hr class="my-4 border-t-2 border-gray-300">
    </div>
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold uppercase mb-1">Surat Bukti Reservasi Fasilitas</h2>
        <div class="text-sm text-gray-600">Nomor: {{ 'RSV/' . str_pad($reservation->id, 5, '0', STR_PAD_LEFT) . '/' . \Carbon\Carbon::parse($reservation->created_at)->format('Y') }}</div>
        <hr class="my-4 border-t-2 border-gray-300">
    </div>

    <div class="mb-6">
        <p>Dari,</p>
        <p><strong>{{ $reservation->name }}</strong></p>
        @if($reservation->instance)
            <p>{{ $reservation->instance }}</p>
        @endif
        <p>{{ $reservation->address ?: '-' }}</p>
    </div>

    <div class="mb-6">
        <p>Dengan ini saya membuat reservasi atas :</p><br>
        <table class="w-full mb-4">
            <tr><td>Nama</td><td>: {{ $reservation->name }}</td></tr>
            <tr><td>Instansi</td><td>: {{ $reservation->instance ?: '-' }}</td></tr>
            <tr><td>Alamat</td><td>: {{ $reservation->address ?: '-' }}</td></tr>
            <tr><td>Email</td><td>: {{ $reservation->email }}</td></tr>
            <tr><td>Telepon</td><td>: {{ $reservation->phone ?: '-' }}</td></tr>
            <tr><td>Fasilitas</td><td>: {{ $reservation->facility->name ?? '-' }}</td></tr>
            <tr><td>Tanggal Reservasi</td><td>: {{ $reservation->reservation_date }}</td></tr>
            <tr><td>Jam Mulai</td><td>: {{ $reservation->hour_start ? \Carbon\Carbon::parse($reservation->hour_start)->format('d-m-Y H:i') : '-' }}</td></tr>
            <tr><td>Jam Selesai</td><td>: {{ $reservation->hour_end ? \Carbon\Carbon::parse($reservation->hour_end)->format('d-m-Y H:i') : '-' }}</td></tr>
            <tr><td>Jumlah Orang</td><td>: {{ $reservation->number_of_people }}</td></tr>
            <tr><td>Jenis</td><td>: {{ ucfirst($reservation->indoor_outdoor) }}</td></tr>
            <tr><td>Status</td><td>: {{ ucfirst($reservation->status) }}</td></tr>
            <tr><td>Catatan</td><td>: {{ $reservation->notes ?: '-' }}</td></tr>
        </table>
    </div>

    <div class="flex justify-end mt-8 mb-16">
        <div class="text-right">
            <p>{{ config('app.location', 'Jakarta') }}, {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
            <p class="mb-12">Petugas Reservasi</p>
            <p style="margin-top:60px;"><strong>__________________________</strong></p>
        </div>
    </div>
</div>

<div class="mt-4 flex space-x-2 no-print">
    <button onclick="window.print()" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-900">Print</button>
</div>

<style>
@media print {
    .no-print, .no-print * {
        display: none !important;
    }
    body {
        background: #fff !important;
    }
    #print-area {
        box-shadow: none !important;
        border: none !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    #print-area table {
        width: 100% !important;
        border-collapse: collapse !important;
    }
    #print-area td {
        padding: 2px 4px !important;
        border: none !important;
    }
}
</style>
@endsection