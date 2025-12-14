<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(CreateProductRequest $request)
    {
        $requests = $request->validated();

        $photo = $request->file('image_product')->store('public');
        $requests['image_product'] = explode('/', $photo)[1];

        Product::create($requests);

        return redirect()->back()->with(['successCreateProduct' => 'Продукт успешно создан!']);
    }

    public function removeProduct($productId)
    {
        Product::where('id', $productId)->delete();
        return back();
    }

    public function getProductsAdmin()
    {
        $products = Product::all();

        return view('admin.tableProducts', ['products' => $products]);
    }

    public function getCardProducts(Product $productID)
    {
        $products = Product::find($productID->id);

        $reviews = Review::where('product_id', $productID->id)->get();

        return view('card-product', compact('products','reviews'));
    }
}
