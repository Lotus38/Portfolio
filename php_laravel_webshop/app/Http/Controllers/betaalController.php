<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderedProduct;
use Illuminate\Support\Facades\Auth;

class betaalController extends Controller{

    public function betaaloverzicht(Request $request){

        if (Auth::check()) {
            $userId = auth()->user()->id;
            $cart = session("cart.$userId", []);
            return view('betaal-overzicht', compact('cart', 'userId'));
        } else {
            
            return redirect(route('login.home'));
        }
    }

    public function betaald(Request $request){

        if (Auth::check()) {
            
            $userId = auth()->user()->id;
            $cart = session("cart.$userId", []);
            
            if (empty($cart)) {
                return redirect(route('check'))->with('winkelwagen_leeg', 'Je winkelwagen is leeg.');
            }

            $order = \App\Models\Order::create(['customer_id'=> $userId, 'total_amount' => 0.00 ]);
            
            foreach ($cart as $productId => $quantity) {
                $product = \App\Models\Product::find($productId);
    
                if ($product) {
                    
                    $orderedProduct = new OrderedProduct([
                        'product_id' => $productId,
                        'amount' => $quantity,
                        'order_id' => $order->id,
                        'price_per_unit' => 0.00,
                    ]);

                    $order->orderedProducts()->save($orderedProduct);

                    $new_stock = $product->stock - $quantity;
                    $product->update(['stock' => $new_stock]);
                }
            }

            session()->forget("cart.$userId");
    
            return redirect('/betaald')->with('betaling_gelukt', 'Betaling is geslaagd, bedankt voor uw aankoop. Wij streven ernaar uw bestelling z.s.m. te verzenden.');
        } else {
            return redirect(route('login.home'));
        }
    }

    public function bedankt(){
        return view('/betaald');
    }
}