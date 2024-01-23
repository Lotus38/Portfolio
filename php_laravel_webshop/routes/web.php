<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\productsController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\betaalController;
use App\Http\Controllers\klantController;
use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware;


//login en signup
Route::middleware('auth')->group(function () {
    Route::get('/products', [productsController::class, 'showName'])->name("log.in");});

Route::get('/', [loginController::class, 'home'])->name("login.home");
Route::post('/signup', [loginController::class, 'signup'])->name("sign.up");
Route::post('/login', [loginController::class, 'login'])->name("login.try");
Route::post('/uitloggen', [loginController::class, 'logout'])->name('uitloggen');

//productpagina
Route::get('/productpage', [productsController::class, 'showProducts'])->name("showProductpage");
Route::post('/add-to-cart', [productsController::class, 'winkelWagen'])->name("add.Cart");
Route::post('/remove-from-cart', [productsController::class, 'removeFromCart'])->name('remove.Cart');

//checkout
Route::post('/checkout', [checkoutController::class, 'showCart'])->name('check.out');
Route::get('/checkout', [checkoutController::class, 'showCart'])->name('check');
Route::post('/add-to-checkcart', [checkoutController::class, 'cartplus'])->name("addcheck.Cart");
Route::post('/remove-from-checkcart', [checkoutController::class, 'cartmin'])->name("removecheck.Cart");

//betaling
Route::post('/naar-betalen', [betaalController::class, 'betaaloverzicht'])->name("naar.betalen");
Route::get('/betaal-overzicht');
Route::post('/betaling', [betaalController::class, 'betaald'])->name("afgerond");
Route::get('/betaald', [betaalController::class, 'bedankt'])->name("klaar");

//klantpagina
Route::get('/klant', [klantController::class, 'showKlant'])->name("klant.show");
Route::post('/klant/adres', [klantController::class, 'adres'])->name("city");
Route::get('/orders', [klantController::class, 'viewOrders'])->name("showOrders");
Route::get('/viewOrdered/{order}',[klantController::class, 'viewOrdered'])->name("ordered.products");

//admin
Route::middleware('CheckRole')->group(function () {
    route::get('/admin', [adminController::class, 'showAdmin'])->name("ad.page");
    route::get('/new-orders', [adminController::class, 'shownewOrders'])->name('neworders.show');
    route::get('/orderedproducts/{order_id}', [adminController::class, 'showOrdered'])->name('show.ordered');
    route::get('/assignRoles', [adminController::class, 'showRoles'])->name('roles.show');
    route::get('/changeRoles/{customer_id}', [adminController::class, 'changeRoles'])->name('change.role');
    route::post('/change', [adminController::class, 'change'])->name('assign.role');
    Route::get('/product-terminal', [adminController::class, 'viewLinks'])->name('product.terminal');
    route::get('/viewproducts', [adminController::class, 'viewProducts'])->name('update.products');
    route::get('/manageproduct/{id}', [adminController::class, 'changeProduct'])->name('change.product');
    route::delete('/deleteproduct/{product}', [adminController::class, 'deleteProduct'])->name('product.delete');
    route::patch('/updateproduct/{product}', [adminController::class, 'updateProduct'])->name('product.update');
    route::get('/addproduct', [adminController::class, 'addProduct'])->name('product.add');
    route::post('/addingproduct', [adminController::class, 'storeProduct'])->name('product.store');
});