<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->take(3)->get();
        return view('main.pages.index', compact('beritas'));;
    }
}
