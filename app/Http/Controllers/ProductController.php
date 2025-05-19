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
}
