<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return response()->json($categories);
    }
    
    public function show($id)
    {
        $categories = Categories::find($id);

        if (!$categories) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        return response()->json($categories);
    }
    public function getCategories()
    {
        $categoriesModel = new Categories();
        $categories = $categoriesModel->getCategories();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $categories = new Categories();
        $categories->nume = $request->input('nume');
        $categories->save();
        
        return response()->json($categories, 201);
    }
}
