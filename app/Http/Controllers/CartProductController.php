<?php

namespace App\Http\Controllers;

use App\Cart_Product;
use App\Cart;
use App\Product;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CartProductController extends Controller
{
    public function agregar(Request $request){

        $product_id = $request->product_id;
            
        $nuevoCarrito = new Cart;
        $nuevoCarrito->user_id = Auth::user()->id;
        $nuevoCarrito->save();
        $cart_id = $nuevoCarrito->id;
        

        $relacion = new Cart_Product;
        $relacion->product_id = $product_id;
        $relacion->cart_id = $cart_id;
        $relacion->save();

        return redirect('/index');
    }

        
}
