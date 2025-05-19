<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //store cart
    public function store(Product $product)
    {
        $cart = session()->get('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "image" => $product->image,
                "name" => $product->name,
                "price" => $product->price,
                "type" => $product->type,
                "quantity" => 1,
            ];
        }

        session()->put('cart', $cart);
        smilify('success', 'Product added to cart successfully!');
        return redirect()->back();
    }

    //update cart
    public function update(Product $product, Request $request)
    {
        $cart = session()->get('cart');

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $request->quantity;
        }
        
        if ($request->quantity <= 0) {
            unset($cart[$product->id]);
        }
        
        session()->put('cart', $cart);
        return redirect()->back();
    }
}
