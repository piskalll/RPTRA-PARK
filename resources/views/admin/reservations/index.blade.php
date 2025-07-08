@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Pemesanan Fasilitas</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="bg-gray-100 text-left">
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Instansi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Telepon
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fasilitas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Reservasi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jam Mulai
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jam Selesai
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah Orang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jenis
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Edit
                    </th>
                </tr>
            </thead>
            <tbody>
                    @forelse ($reservations as $reservation)
                    <tr class="bg-white text-black border-b :bg-gray-800 :border-gray-700 border-gray-200 hover:bg-gray-50 :hover:bg-gray-600">
                        <th class="px-6 py-4">{{ $reservation->name }}</th>
                        <td class="px-6 py-4">{{ $reservation->instance ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $reservation->address ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $reservation->email }}</td>
                        <td class="px-6 py-4">{{ $reservation->phone ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $reservation->facility->name ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $reservation->reservation_date }}</td>
                        <td class="px-6 py-4">{{ $reservation->hour_start ? \Carbon\Carbon::parse($reservation->hour_start)->format('H:i') : '-' }}</td>
                        <td class="px-6 py-4">{{ $reservation->hour_end ? \Carbon\Carbon::parse($reservation->hour_end)->format('H:i') : '-' }}</td>
                        <td class="px-6 py-4">{{ $reservation->number_of_people }}</td>
                        <td class="px-6 py-4">{{ ucfirst($reservation->indoor_outdoor) }}</td>
                        <td>
                            @if(auth()->user()->role === 'staff')
                                <a href="{{ route('staff.reservations.show', $reservation->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded">Lihat</a>
                            @else
                                <a href="{{ route('admin.reservations.show', $reservation->id) }}" class="text-blue-600 hover:underline mr-2">Lihat</a>
                                <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline mr-2" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="13" class="px-6 py-4">Belum ada pemesanan.</td></tr>
                @endforelse
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $reservations->links() }}
    </div>
</div>
@endsection
