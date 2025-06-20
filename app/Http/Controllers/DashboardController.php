<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Document;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = 'Dashboard';
        $startDate = now()->subDays(6)->startOfDay();
        $endDate = now()->endOfDay();

        $documents = Document::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        // Format label & data untuk chart
        $labels = [];
        $data = [];

        // Bikin semua tanggal dulu (biar tetap muncul meskipun kosong)
        for ($i = 0; $i < 7; $i++) {
            $date = $startDate->copy()->addDays($i)->format('Y-m-d');
            $labels[] = $date;

            $record = $documents->firstWhere('date', $date);
            $data[] = $record ? $record->total : 0;
        }

        $documentsCount = Document::count();
        $newsCount = Berita::count();
        $userCount = User::count();
        return view('dashboard.pages.index', compact('page', 'labels', 'data', 'documentsCount', 'newsCount', 'userCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
