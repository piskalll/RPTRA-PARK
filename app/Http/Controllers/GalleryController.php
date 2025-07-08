<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'caption' => $request->caption,
            'image_path' => $path,
        ]);

        if (auth()->user()->role === 'staff') {
        return redirect()->route('staff.galleries.index')->with('success', 'Gambar berhasil ditambahkan');
        }
        return redirect()->route('galleries.index')->with('success', 'Gambar berhasil ditambahkan');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image_path);
        $gallery->delete();

        if (auth()->user()->role === 'staff') {
        return redirect()->route('staff.galleries.index')->with('success', 'Gambar dihapus');
        }
        return redirect()->route('galleries.index')->with('success', 'Gambar dihapus');
    }

    public function edit(Gallery $gallery)
    {
        return view('galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'caption' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['caption']);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image_path) {
                Storage::disk('public')->delete($gallery->image_path);
            }

            $data['image_path'] = $request->file('image')->store('galleries', 'public');
        }

        $gallery->update($data);

        if (auth()->user()->role === 'staff') {
        return redirect()->route('staff.galleries.index')->with('success', 'Galeri berhasil diperbarui.');
        }
        return redirect()->route('galleries.index')->with('success', 'Galeri berhasil diperbarui.');
    }
}

