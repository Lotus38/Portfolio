<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class klantController extends Controller{

    public function showKlant(Request $request){
        
        $klant = auth::user();
        
        return view('/klant', ['klant' => $klant]);

    }

    public function adres(Request $request)
{
    $validatedData = request()->validate([
        'city' => 'required|string',
    ]);

    $klant = Customer::find(Auth::user()->id);

    
    $klant->update(['city' => request('city'),]);

    return redirect()->route('klant.show', ['klant' => $klant])
            ->with('success', 'Het adres is bijgewerkt.');
    
    }

    public function viewOrders(Request $request){

        $user = auth()->user();
        $userId = $user->id;
        $orders = \App\Models\Order::where('customer_id', $userId)->get();

        return view('orders', compact('orders'));

    }

    public function viewOrdered(Request $request, $order){

        $orderedProducts = \App\Models\OrderedProduct::where('order_id', $order)
            ->with(['product' => function ($query) {
            $query->withTrashed();
            }])->get();
        
        return view('viewOrdered', compact('orderedProducts','order'));

    }
}