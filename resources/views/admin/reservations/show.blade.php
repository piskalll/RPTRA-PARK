@extends('layouts.app')

@section('content')
<div class="p-6" id="print-area">
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold uppercase mb-1">Surat Bukti Reservasi Fasilitas</h2>
        <div class="text-sm text-gray-600">Nomor: {{ 'RSV/' . str_pad($reservation->id, 5, '0', STR_PAD_LEFT) . '/' . \Carbon\Carbon::parse($reservation->created_at)->format('Y') }}</div>
        <hr class="my-4 border-t-2 border-gray-300">
    </div>

    <div class="mb-6">
        <p>Kepada Yth,</p>
        <p><strong>{{ $reservation->name }}</strong></p>
        @if($reservation->instance)
            <p>{{ $reservation->instance }}</p>
        @endif
        <p>{{ $reservation->address ?: '-' }}</p>
    </div>

    <div class="mb-6">
        <p>Dengan ini kami menginformasikan bahwa reservasi fasilitas telah diterima dengan detail sebagai berikut:</p>
        <table class="w-full mb-4">
            <tr>
                <td class="py-1 w-1/3">Nama</td>
                <td class="py-1">: {{ $reservation->name }}</td>
            </tr>
            <tr>
                <td class="py-1">Instansi</td>
                <td class="py-1">: {{ $reservation->instance ?: '-' }}</td>
            </tr>
            <tr>
                <td class="py-1">Alamat</td>
                <td class="py-1">: {{ $reservation->address ?: '-' }}</td>
            </tr>
            <tr>
                <td class="py-1">Email</td>
                <td class="py-1">: {{ $reservation->email }}</td>
            </tr>
            <tr>
                <td class="py-1">Telepon</td>
                <td class="py-1">: {{ $reservation->phone ?: '-' }}</td>
            </tr>
            <tr>
                <td class="py-1">Fasilitas</td>
                <td class="py-1">: {{ $reservation->facility->name ?? '-' }}</td>
            </tr>
            <tr>
                <td class="py-1">Tanggal Reservasi</td>
                <td class="py-1">: {{ $reservation->reservation_date }}</td>
            </tr>
            <tr>
                <td class="py-1">Jam Mulai</td>
                <td class="py-1">: {{ $reservation->hour_start ? \Carbon\Carbon::parse($reservation->hour_start)->format('d-m-Y H:i') : '-' }}</td>
            </tr>
            <tr>
                <td class="py-1">Jam Selesai</td>
                <td class="py-1">: {{ $reservation->hour_end ? \Carbon\Carbon::parse($reservation->hour_end)->format('d-m-Y H:i') : '-' }}</td>
            </tr>
            <tr>
                <td class="py-1">Jumlah Orang</td>
                <td class="py-1">: {{ $reservation->number_of_people }}</td>
            </tr>
            <tr>
                <td class="py-1">Jenis</td>
                <td class="py-1">: {{ ucfirst($reservation->indoor_outdoor) }}</td>
            </tr>
            <tr>
                <td class="py-1">Status</td>
                <td class="py-1">: {{ ucfirst($reservation->status) }}</td>
            </tr>
            <tr>
                <td class="py-1 align-top">Catatan</td>
                <td class="py-1">: {{ $reservation->notes ?: '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="flex justify-end mt-8 mb-16">
        <div class="text-right">
            <p>{{ config('app.location', 'Kota, Tanggal') }}, {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
            <p class="mb-12">Petugas Reservasi</p>
            <p style="margin-top:60px;"><strong>{{ auth()->user()->name ?? '________________' }}</strong></p>
        </div>
    </div>
</div>

<div class="mt-4 flex space-x-2 no-print">
    <a href="{{ route('admin.reservations.index') }}" class="text-blue-600 hover:underline">← Kembali ke daftar</a>
    <button onclick="window.print()" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-900">Print</button>
</div>

{{-- Print styles --}}
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