<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $shopping = ShoppingCart::all();
        return response()->json($shopping);
    }
    
    public function show($id)
    {
        $shopping = ShoppingCart::find($id);

        if (!$shopping) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($shopping);
    }
    /*public function addToCart(Request $request)
    {
        $product = $request->input('product');
        $price = $request->input('price');


        $cartItem = new ShoppingCart();
        $cartItem->product_name = $product;
        $cartItem->price = $price;
        $cartItem->save();


    }

    public function removeFromCart($itemId)
    {
        // Find the cart item by ID and delete it
        ShoppingCart::findOrFail($itemId)->delete();

        // Return a response or redirect as needed
    }

    public function getCartItems()
    {
        $cartItems = ShoppingCart::all()->toArray();
    
        return $cartItems;
    }*/
    

}