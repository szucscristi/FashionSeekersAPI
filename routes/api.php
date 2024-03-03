<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\API\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categorii', [CategoriesController::class, 'index']);
Route::get('/categorii/{id}', [CategoriesController::class, 'show']);
Route::get('/toatecategoriile', [CategoriesController::class, 'getCategories']);
Route::get('/produse', [ProductsController::class, 'index']);
Route::get('/produse/{id}', [ProductsController::class, 'show']);
//Route::get('/forms', [FormController::class, 'index']);
Route::post('/forms', [FormController::class, 'store']);
Route::get('/{maincategory}/{secondcategory}', [ProductsController::class, 'getProductsByCategory']);

Route::post('/user-history', [UserController::class, 'details']);
Route::post('/crud', [UserController::class, 'details']);


Route::get('/coscumparaturi', [ShoppingCartController::class, 'index']);

Route::resource('blogs', BlogController::class);


Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', [UserController::class, 'details']);
    Route::post('logout', [UserController::class, 'logout']);
});



Route::post('login', 'AuthController@login');
Route::middleware(['auth:api', 'role'])->group(function() {

});