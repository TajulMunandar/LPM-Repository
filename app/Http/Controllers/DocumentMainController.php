<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentMainController extends Controller
{
    public function index(Request $request)
    {
        $page = 'Dokumen';
        $query = Document::query();

        // Filter berdasarkan jenis jika ada query string
        if ($request->has('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        $documents = $query->latest()->paginate(5);
        return view('main.pages.document', compact('page', 'documents'));
    }

    public function show($id)
    {
        $document = Document::findOrFail($id); // Atau bisa pakai slug: where('slug', $id)->firstOrFail()
        return view('main.pages.document-detail', compact('document'));
    }
}
