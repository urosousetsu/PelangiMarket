<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //cart index
    public function cartIndex()
    {
        $cart = session()->get('cart', []);

        return view('keranjang', compact('cart'));
    }
}
