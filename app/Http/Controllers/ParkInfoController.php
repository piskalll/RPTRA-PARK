<?php

namespace App\Http\Controllers;

use App\Models\ParkInfo;
use Illuminate\Http\Request;

class ParkInfoController extends Controller
{
    public function index()
    {
        $infos = ParkInfo::latest()->paginate(10);
        
        return view('parkinfos.index', compact('infos'));
    }

    public function create()
    {
        return view('parkinfos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        ParkInfo::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        if (auth()->user()->role === 'staff') {
            return redirect()->route('staff.parkinfos.index')->with('success', 'Informasi taman berhasil ditambahkan.');
        }
        return redirect()->route('parkinfo.index')->with('success', 'Informasi taman berhasil ditambahkan.');
    }

    public function edit(ParkInfo $parkinfo)
    {
        return view('parkinfos.edit', compact('parkinfo'));
    }

    public function update(Request $request, ParkInfo $parkinfo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $parkinfo->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        
        if (auth()->user()->role === 'staff') {
            return redirect()->route('staff.parkinfos.index')->with('success', 'Informasi taman berhasil diperbarui.');
        }
        return redirect()->route('parkinfo.index')->with('success', 'Informasi taman berhasil diperbarui.');
    }

    public function destroy(ParkInfo $parkinfo)
    {
        $parkinfo->delete();
        if (auth()->user()->role === 'staff') {
            return redirect()->route('staff.parkinfos.index')->with('success', 'Informasi taman berhasil dihapus.');
        }
        return redirect()->route('parkinfo.index')->with('success', 'Informasi taman berhasil dihapus.');
    }
}
