<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory(Request $request)
    {
        $name_category = $request->input('name_category');
        Category::create([
            'name_category' => $name_category,
        ]);
        return back()->with(['succesCreateCategory' => 'Успешно создали категорию']);
    }

    public function getCategories()
    {
        $categories = Category::all();
        return view('admin.create-product', ['categories' => $categories]);
    }
}
