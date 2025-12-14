<?php

namespace App\Http\Controllers;

use App\Models\basket_items;
use App\Models\basketitems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function createBasketItem($productId)
    {
        basket_items::create([
           'product_id' => $productId,
            'user_id' => Auth::user()->id,
            'countProducts' => 1
        ]);

        return back()->with('successBasket', 'Товар добален в корзину');
    }

    public function getBasketItems()
    {
        $basketItems = basket_items::where('user_id', Auth::user()->id)
            ->with('product')
            ->get();

        return view('basket', ['basketItems' => $basketItems]);
    }
    public function decreaseProductCount($basketId)
    {
        $basketItem = basket_items::findOrFail($basketId);

        if ($basketItem->countProducts > 1) {
            $basketItem->decrement('countProducts');
        } else {
            $basketItem->delete();
        }

        return back()->with('success', 'Количество товара уменьшено.');
    }

    public function increaseProductCount($basketId)
    {
        $basketItem = basket_items::findOrFail($basketId);

        $basketItem->increment('countProducts');

        return back()->with('success', 'Количество товара увеличено.');
    }



}
