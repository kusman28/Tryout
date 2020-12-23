<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        // return Cart::content();
        return view('cart');
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);
        Cart::add([
            'id' => $product->id, 
            'name' => $product->name, 
            'qty' => 1, 
            'price' => $product->unit_price,
            'weight' => $product->size,
        ]);
        
        return redirect()->route('cart')->withSuccess('Product has been successfully added to the Cart.');
    }

    public function remove($id)
    {
        Cart::remove($id);
        return back();
    }

}
