<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function viewCatalog(Request $request)
    {
        $sortByPrice = $request->query('sort_price', 'asc');
        $categoryID = $request->query('category', '');

        $productQuery = Product::where('id', '>', 0);

        if($categoryID) {
            $productQuery->where('category_id', $categoryID);
        }
        $productQuery->orderBy('price_product', $sortByPrice);

        $products = $productQuery->get();
        $categories = Category::all();

        return view('catalog', ['products' => $products],['categories' => $categories]);
    }
}
