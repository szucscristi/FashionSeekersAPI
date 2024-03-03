<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return response()->json($products);
    }

    public function show($id)
    {
        $products = Products::find($id);

        if (!$products) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($products);
    }

    public function store(Request $request)
    {
        $products = new Products();
        $products->denumire = $request->input('denumire');
        $products->descriere = $request->input('descriere');
        $products->pret = $request->input('pret');
        $products->categorie_produs = $request->input('id_categorie');
        $products->alegere = $request->input('alegere');
        $products->imagine = $request->input('imagine');
        $products->save();

        return response()->json($products, 201);
    }

    public function getProductsByCategory($maincategory, $secondcategory)
    {
        if ($maincategory == 'all')
            $products = Products::all();
        else {
            $products = Products::where('alegere', $maincategory)
                ->where('id_categorie', $secondcategory)
                ->get();
        }

        return response()->json($products);
    }
}
