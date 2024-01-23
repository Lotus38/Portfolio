<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class productsController extends Controller{

    public function showName(Request $request){
        
         
        // Check if a user is authenticated
        if (Auth::check()) {
            // User is logged in, so we can safely access their information
            $user = Auth::user();
            $name = $user->first_name;
        } else {
            // User is not logged in, set $first_name to null or provide a default value
            $name = null;
        }

        return view('products', compact('name'));
    }
    
    public function showProducts(Request $request){
        
         
        // Check if a user is authenticated
        if (Auth::check()) {
            // User is logged in, so we can safely access their information
            $user = Auth::user();
            $name = $user->first_name;
        } else {
            // User is not logged in, set $first_name to null or provide a default value
            $name = null;

            return redirect(route('login.home'))->with('no-login', 'Log in voor toegang tot de webshop');
        }

        $products = Product::all();

        $userId = auth()->user()->id;
      
        return view('productpage', compact('products','userId'));

    }

    public function winkelWagen(Request $request){
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
        
        return redirect('/productpage');
    }
    
    public function removeFromCart(Request $request)
{   
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
    
    return redirect('/productpage');
}    
}