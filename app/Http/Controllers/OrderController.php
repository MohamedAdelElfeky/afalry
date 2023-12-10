<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $paginate = \env('PAGINATE', 25);
        $orders = Order::paginate($paginate);
        return view('pages.dashboards.orders.index', [
            'orders' => OrderResource::collection($orders),
        ]);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        try {
            $order->delete();
            return response()->json(['message' => 'Order deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting Order'], 500);
        }
    }
}
