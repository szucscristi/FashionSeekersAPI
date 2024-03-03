<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\FormController;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\API\UserController;

Route::post('/login', [App\Http\Controllers\API\UserController::class, 'login']);
Route::post('/register', [App\Http\Controllers\API\UserController::class, 'register']);
Route::post('/logout', [App\Http\Controllers\API\UserController::class, 'logout']);

Route::get('/categorii', [CategoriesController::class, 'index']);
Route::get('/categorii/{id}', [CategoriesController::class, 'show']);
//Route::get('/forms', [FormController::class, 'index']);
Route::post('/forms', [FormController::class, 'store']);
Route::get('/toatecategoriile', [CategoriesController::class, 'getCategories']);

Route::get('/produse', [ProductsController::class, 'index']);
Route::get('/produse/{id}', [ProductsController::class, 'show']);

Route::get('/{maincategory}/{secondcategory}', [ProductsController::class, 'getProductsByCategory']);


Route::get('/coscumparaturi', [ShoppingCartController::class, 'index']);

Route::get('api/coscumparaturi', [ShoppingCartController::class, 'getCartItems']);

Route::post('/user-history', [UserController::class, 'details']);
Route::post('/crud', [UserController::class, 'details']);

Route::match(['GET', 'POST'], 'send-mail', function (Request $request) {
    $cartItems = $request->input('cartItems', []);

    $details = [
        'title' => 'Comanda dumneavoastra a fost plasata cu succes!',
        'body' => 'Detalii comanda:',
    ];

    $mail = new MyTestMail($details, $cartItems);
    $mail->to('cristian.stefan.szucs@gmail.com');

    Mail::send($mail);
    return response()->json(['message' => 'Email sent successfully']);
});