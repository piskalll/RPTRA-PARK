@extends('layouts.public')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-semibold mb-4">Detail Reservasi</h1>
    <table class="mb-4">
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
    <a href="{{ route('reservations.print', $reservation) }}" target="_blank" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-900">Cetak Bukti Reservasi</a>
</div>
@endsection