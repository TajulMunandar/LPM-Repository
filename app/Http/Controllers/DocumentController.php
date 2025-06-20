<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = 'Documents';
        try {
            $documents = Document::latest()->get();
            return view('dashboard.pages.document', compact('documents', 'page'));
        } catch (\Exception $e) {
            Log::error('Error fetching documents: ' . $e->getMessage());
            return back()->with('error', 'Gagal memuat data dokumen.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = 'Create Document';
        return view('dashboard.documents.create')->with(compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable',
            'jenis' => 'required|integer'
        ]);

        try {
            $data = $request->only(['judul', 'deskripsi', 'link', 'jenis']);
            $data['slug'] = Str::slug($request->judul);

            if ($request->hasFile('gambar')) {
                $data['gambar'] = $request->file('gambar')->store('documents', 'public');
            }

            Document::create($data);
            return redirect()->route('documents.index')->with('success', 'Dokumen berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Error creating document: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal menambahkan dokumen.'  . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $page = 'Show Document';
        try {
            $document = Document::findOrFail($id);
            return view('dashboard.documents.show', compact('document', 'page'));
        } catch (\Exception $e) {
            Log::error('Error showing document: ' . $e->getMessage());
            return back()->with('error', 'Dokumen tidak ditemukan.');
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = 'Edit Document';
        // Validate the ID format
        try {
            $document = Document::findOrFail($id);
            return view('dashboard.documents.edit', compact('document', 'page'));
        } catch (\Exception $e) {
            Log::error('Error editing document: ' . $e->getMessage());
            return back()->with('error', 'Dokumen tidak ditemukan.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable',
            'jenis' => 'required|integer'
        ]);

        try {
            $document = Document::findOrFail($id);
            $document->judul = $request->judul;
            $document->deskripsi = $request->deskripsi;
            $document->slug = Str::slug($request->judul);
            $document->link = $request->link;
            $document->jenis = $request->jenis;

            if ($request->hasFile('gambar')) {
                $document->gambar = $request->file('gambar')->store('documents', 'public');
            }

            $document->save();

            return redirect()->route('documents.index')->with('success', 'Dokumen berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Error updating document: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal memperbarui dokumen.' . $e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $document = Document::findOrFail($id);
            $document->delete();

            return redirect()->route('documents.index')->with('success', 'Dokumen berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Error deleting document: ' . $e->getMessage());
            return back()->with('error', 'Gagal menghapus dokumen.');
        }
    }
}
