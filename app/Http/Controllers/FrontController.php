<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $baseQuery = Resident::where('life_status', 'hidup');

        $totalPenduduk = $baseQuery->clone()->count();
        $totalBalita = $baseQuery->clone()->where('age_category', 'Balita')->count();
        $totalAnakAnak = $baseQuery->clone()->where('age_category', 'Anak-anak')->count();
        $totalRemaja = $baseQuery->clone()->where('age_category', 'Remaja')->count();
        $totalDewasa = $baseQuery->clone()->where('age_category', 'Dewasa')->count();
        $totalLansia = $baseQuery->clone()->where('age_category', 'Lansia')->count();

        return view('welcome', compact(
            'totalPenduduk',
            'totalBalita',
            'totalAnakAnak',
            'totalRemaja',
            'totalDewasa',
            'totalLansia'
        ));
    }
}