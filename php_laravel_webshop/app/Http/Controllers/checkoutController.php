<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class checkoutController extends Controller{

    public function showCart(Request $request){
        
        if (Auth::check()) {
            $userId = auth()->user()->id;
            
            return view('/checkout', compact('userId'));
        } else {
            
            return redirect(route('login.home'));
        }
    }

    public function cartplus(Request $request){
        $quantities = $request->input('quantity');
        $productIds = $request->input('product_id');
    
        $userId = auth()->user()->id;
        $cart = session("cart.$userId", []);
    
        foreach ($productIds as $productId) {
            $quantity = $quantities[$productId];
            if (array_key_exists($productId, $cart)) {
                $cart[$productId] += $quantity;
            } else {
                $cart[$productId] = $quantity;
            }
        }
    
        session(["cart.$userId" => $cart]);
    
        return view('/checkout', compact('userId'));

    }

    public function cartmin(Request $request){
        $productId = $request->input('product_id');
        $quantityToRemove = $request->input('quantity')[$productId];
        
        $userId = auth()->user()->id;
        $cart = session("cart.$userId", []);
    
        if (array_key_exists($productId, $cart)) {
            
            if ($quantityToRemove >= $cart[$productId]) {
                unset($cart[$productId]);
            } else {
                $cart[$productId] -= $quantityToRemove;
            }
    }
    
    session(["cart.$userId" => $cart]);
    
    return view('/checkout', compact('userId'));

    }    
}