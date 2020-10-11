<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use Auth;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        // cart ada ? 1 where => user = 1 => rangga = tampilkan
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('cart.index', compact('carts'));
    }

    public function store(Request $request, $id){

        $duplicate = Cart::where('product_id', $request->id)->first();

        if($duplicate){
            return redirect('/cart')->with('error', "Barang sudah ada di cart");
        }

        $product = Product::find($id);
        Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
            'qty' => 1
        ]);
        return redirect('/cart')->with('success', "Berhasil menambahkan barang di cart");
    }

    public function update(Request $request, $id){
        Cart::where('id', $id)->update([
            'qty' => $request->quantity
        ]);
        return response()->json([
            'success' => true
        ]);
    }
}
