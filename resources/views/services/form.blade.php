@props(['service' => null])

@php
    $isEdit = isset($service);
    $user = auth()->user();
    if ($user->role === 'staff') {
        $formAction = $isEdit
            ? route('staff.services.update', $service)
            : route('staff.services.store');
    } else {
        $formAction = $isEdit
            ? route('services.update', $service)
            : route('services.store');
    }
@endphp


<form action="{{ $formAction }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div>
        <label class="block font-semibold mb-1">Nama Layanan</label>
        <input type="text" name="name" value="{{ old('name', $service->name ?? '') }}" class="w-full border p-2 rounded" required>
    </div>

    <div>
        <label class="block font-semibold mb-1">Deskripsi</label>
        <textarea name="description" rows="5" class="w-full border p-2 rounded" required>{{ old('description', $service->description ?? '') }}</textarea>
    </div>

    <div>
        <label class="block font-semibold mb-1">Gambar</label>
        <input type="file" name="image" class="w-full border p-2 rounded" accept="image/*">
        @if($isEdit && $service->image)
            <img src="{{ asset('storage/' . $service->image) }}" class="mt-2 w-40 rounded shadow">
        @endif
    </div>

    <div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            {{ $isEdit ? 'Update Layanan' : 'Simpan Layanan' }}
        </button>
    </div>
</form>
