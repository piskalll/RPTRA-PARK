@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow rounded">
    <h2 class="text-xl font-bold mb-4">Tambah Artikel</h2>
    @include('articles.form')
</div>
@endsection
