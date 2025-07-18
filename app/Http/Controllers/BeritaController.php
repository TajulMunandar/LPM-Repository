<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = 'News';
        $beritas = Berita::all();
        return view('dashboard.pages.news')->with(compact('page', 'beritas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = 'Create News';
        return view('dashboard.berita.create')->with(compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'isi' => 'required',
                'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ]);
            $data = $request->only(['judul', 'isi']);
            $data['slug'] = Str::slug($request->judul);

            if ($request->hasFile('gambar')) {
                $data['gambar'] = $request->file('gambar')->store('berita', 'public');
            }

            Berita::create($data);
            return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Error creating berita: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal menambahkan berita.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $page = 'Show News';
        try {
            $berita = Berita::findOrFail($id);
            return view('dashboard.berita.show', compact('berita', 'page'));
        } catch (\Exception $e) {
            Log::error('Error showing berita: ' . $e->getMessage());
            return back()->with('error', 'Berita tidak ditemukan.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = 'Edit News';
        try {
            $berita = Berita::findOrFail($id);
            return view('dashboard.berita.edit', compact('berita', 'page'));
        } catch (\Exception $e) {
            Log::error('Error editing berita: ' . $e->getMessage());
            return back()->with('error', 'Berita tidak ditemukan.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'isi' => 'required',
                'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ]);
            $berita = Berita::findOrFail($id);
            $berita->judul = $request->judul;
            $berita->isi = $request->isi;
            $berita->slug = Str::slug($request->judul);

            if ($request->hasFile('gambar')) {
                $berita->gambar = $request->file('gambar')->store('berita', 'public');
            }

            $berita->save();

            return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Error updating berita: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal memperbarui berita.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $berita = Berita::findOrFail($id);
            $berita->delete();

            return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Error deleting berita: ' . $e->getMessage());
            return back()->with('error', 'Gagal menghapus berita.');
        }
    }
}
