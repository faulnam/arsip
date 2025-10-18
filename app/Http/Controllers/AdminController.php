<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Archive;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        // Data untuk Chart - Status Event
        $eventSelesai = Event::where('status', 'Selesai')->count();
        $eventBerlangsung = Event::where('status', 'Sedang Berlangsung')->count();
        $eventMendatang = Event::where('status', 'Akan Datang')->count();
        
        // Data untuk Chart - Aktivitas Bulanan (6 bulan terakhir)
        $monthlyData = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $monthlyData[] = [
                'month' => $month->format('M Y'),
                'archives' => Archive::whereYear('created_at', $month->year)
                    ->whereMonth('created_at', $month->month)->count(),
                'events' => Event::whereYear('date_start', $month->year)
                    ->whereMonth('date_start', $month->month)->count(),
            ];
        }

        return view('admin.dashboard', compact(
            'eventSelesai',
            'eventBerlangsung', 
            'eventMendatang',
            'monthlyData'
        ));
    }
}
