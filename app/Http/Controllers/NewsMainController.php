<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class NewsMainController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(5); // Ganti 5 sesuai jumlah per halaman
        return view('main.pages.berita', compact('beritas'));
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id); // Atau bisa pakai slug: where('slug', $id)->firstOrFail()
        return view('main.pages.berita-detail', compact('berita'));
    }
}
