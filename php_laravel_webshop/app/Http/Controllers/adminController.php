<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderedProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class adminController extends Controller{

    public function showAdmin(){
        return view('/admin');
    }

    public function shownewOrders(){

        $orders = Order::orderBy('created_at', 'desc')->get();

        return view('/new-orders', ['orders' => $orders]);
    }

    public function showOrdered($order_id){

        $order = Order::find($order_id);
        $orderedProducts = OrderedProduct::where('order_id', $order->id)
            ->with(['product' => function ($query) {
            $query->withTrashed();
            }])->get();
        return view("/orderedproducts", compact('order', 'orderedProducts'));
    }

    public function showRoles(){

        $users = \App\Models\Customer::all();

        return view('/assignRoles', compact('users'));
    }

    public function changeRoles($customer_id){

        $user = Customer::find($customer_id);

        return view('/changeRoles', compact('user'));
    }

    public function change(Request $request){
        $customer_id = $request->input('customer_id');
        $user = Customer::find($customer_id);
    
        if ($user) {
            $roles = $request->input('roles', []); // Haal een array van geselecteerde rollen op uit het formulier.
    
            // Revoke (intrekken) alle bestaande rollen van de gebruiker.
            $user->syncRoles([]);
    
            // Ken de geselecteerde rollen toe.
            if (in_array('customer', $roles)) {
                $user->assignRole('customer');
            }
            if (in_array('admin', $roles)) {
                $user->assignRole('admin');
            }
        }
    
        return redirect()->route('change.role', $customer_id);
    }

    public function viewProducts(){

        $products = Product::all();

        return view('/viewproducts', compact('products'));
    }

    public function changeProduct($product){
        
        $productChange = Product::find($product);

        return view('/manageproduct', ['product'=> $productChange]);
    }

    public function deleteProduct($product){

        $product = Product::find($product);

        if ($product) {
            $product->delete();
            }

        return redirect()->route('update.products');
    }

    public function updateProduct(Request $request, $product){

        $product = Product::find($product);

        if ($product) {
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->stock = $request->input('stock');
            $product->save();
        }

        return redirect()->route('change.product', ['id' => $product]);
    }
    public function storeProduct(Request $request) {
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->save();
    
        return redirect()->route('product.add')->with('Toegevoegd', 'Product is Succesvol Toegevoegd aan de Database');
    }

    public function viewLinks(){

        return view('product-terminal');

    }

    public function addProduct(){

        return view('addproduct');
    }

}