<?php

namespace App\Http\Controllers;

use App\Models\basket_items;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $user = auth()->user();
        $basketItems = $user->basketItems()->whereNull('order_id')->get();

        if ($basketItems->isEmpty()) {
            return back()->with(['errorBasket' => 'Корзина пуста или все товары уже оформлены в заказы']);
        }

        foreach ($basketItems as $item) {
            $existingOrderItem = basket_items::where('user_id', $user->id)
                ->where('product_id', $item->product_id)
                ->whereHas('order', function($query) {
                    $query->whereIn('status', ['В обработке', 'Отправлен']);
                })
                ->first();

            if ($existingOrderItem) {
                return back()->with(['errorOrderExists' => 'Заказ с такими товарами уже существует и находится в статусе "В обработке" или "Отправлен"']);
            }
        }

        $order = Order::create([
            'user_id' => $user->id,
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => 'В обработке'
        ]);

        foreach ($basketItems as $item) {
            $item->order_id = $order->id;
            $item->save();
        }

        return back()->with(['successOrderCreate' => 'Заказ создан']);
    }




    public function getUserOrder()
    {
        $orders = Order::where('user_id', auth()->id())->with('basketItems')->get();

        return view('ordersUser', ['orders' => $orders]);
    }

    public function getAllOrders()
    {
        $orders = Order::all();
        return view('admin.tableOrders', ['orders' => $orders]);
    }

    public function changeStatus(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'status' => 'required|in:В обработке,Отправлен,Получен',
        ]);

        $order = Order::findOrFail($validated['order_id']);

        $order->update([
            'status' => $validated['status'],
        ]);

        return back()->with('success', 'Статус заказа успешно изменён!');
    }


}
