@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Edit Layanan Taman</h2>
    @include('services.form', ['service' => $service])
</div>
@endsection
