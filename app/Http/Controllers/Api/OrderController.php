<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);
        $user = Auth::user();

        $orderContents = Order::where('user_id', $user->id)->get();

        return response()->json(OrderResource::collection($orderContents), 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'address' => 'required|string',
            'postal_code' => 'required|numeric',
            'floor_no' => 'required|integer',
            'order_total' => 'required|numeric',
            'total_profits' => 'required|numeric',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'extra_phone_number' => 'nullable|string',
            'status' => 'required|string',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric',
            'items.*.discount' => 'nullable|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $orderData = array_merge($validator->validated(), [
            'user_id' => auth()->user()->id,
        ]);
        // Create the order
        $order = Order::create($orderData);

        $itemsData = $validator->validated()['items'] ?? [];

        // Attach items to the order
        foreach ($itemsData as $itemData) {
            $order->items()->create($itemData);
        }

        return response()->json(['message' => 'تمت أضافة المنتجات إلى الطلب بنجاح '], 201);
    }

    // public function update(Request $request)
    // {
    //     // dd($request);
    //     $validator = Validator::make($request->all(), [
    //         'cart_id' => 'required|exists:carts,id',
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->errors()], 400);
    //     }

    //     $user = Auth::user();

    //     try {
    //         $cart = Cart::findOrFail($request->cart_id);

    //         if ($cart->user_id !== $user->id) {
    //             return response()->json(['error' => 'Unauthorized'], 401);
    //         }

    //         $cart->update(['quantity' => $request->quantity]);

    //         return response()->json(['message' => 'تم تحديث عنصر سلة التسوق بنجاح']);
    //     } catch (ModelNotFoundException $exception) {
    //         return response()->json(['message' => 'لم يتم العثور على عنصر سلة التسوق'], 404);
    //     }
    // }

    public function destroy($orderId)
    {
        $validator = Validator::make(['order_id' => $orderId], [
            'order_id' => 'required|exists:orders,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        $user = Auth::user();

        try {
            $order = Order::findOrFail($orderId);

            if ($order->user_id !== $user->id) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            // Delete associated items first (assuming you have a relationship defined)
            $order->items()->delete();

            // Then delete the order itself
            $order->delete();

            return response()->json(['message' => 'تمت إزالة الطلب بنجاح']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'لم يتم العثور على الطلب'], 404);
        }
    }
}
