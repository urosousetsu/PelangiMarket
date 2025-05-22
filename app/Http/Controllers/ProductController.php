<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //fetch suku cadang
    public function fetchSukuCadang()
    {
        $allSukuCadang = Product::where('type', 'SUKU CADANG MOTOR')->get();
        return view('sparepart', compact('allSukuCadang'));
    }

    //fetch aksesoris
    public function fetchAksesoris()
    {
        $allAksesoris = Product::where('type', 'AKSESORIS MOTOR')->get();
        return view('accessories', compact('allAksesoris'));
    }

    //search sparepart
    public function searchSparepart(Request $request)
    {
        $query = $request->input('q');

        $allSukuCadang = Product::where('type', 'SUKU CADANG MOTOR')
            ->where('name', 'like', '%' . $query . '%')
            ->get();

        return view('sparepart', compact('allSukuCadang'));
    }

    //search aksesoris
    public function searchAksesoris(Request $request)
    {
        $query = $request->input('q');

        $allAksesoris = Product::where('type', 'AKSESORIS MOTOR')
            ->where('name', 'like', '%' . $query . '%')
            ->get();

        return view('accessories', compact('allAksesoris'));
    }
}
