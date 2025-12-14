<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequests;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function addReview(ReviewRequests $request, Product $productID)
    {
        $requests = $request->validated();
        $products = Product::find($productID->id);
        $requests ['product_id'] = $products->id;

        Review::create($requests);

        return redirect()->back();
    }


}
