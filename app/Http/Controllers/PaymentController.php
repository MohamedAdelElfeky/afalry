<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentResource;
use App\Models\Image;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $paginate = \env('PAGINATE', 25);
        $payments = Payment::paginate($paginate);
        return view('pages.dashboards.payments.index', [
            'payments' => PaymentResource::collection($payments),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8048',
            'status' => 'nullable|in:active,inactive',
        ]);

        $payment =  Payment::create($request->all());
        if (request()->hasFile('images')) {
            $image = $request->file('images');
            $imageType = $image->getClientOriginalExtension();
            $mimeType = $image->getMimeType();
            $file_name = time() . rand(0, 9999999999999) . '_payment.' . $image->getClientOriginalExtension();
            $image->move(public_path('payment/images/'), $file_name);
            $imagePath = "payment/images/" . $file_name;
            $imageObject = new Image([
                'url' => $imagePath,
                'mime' => $mimeType,
                'image_type' => $imageType,
            ]);
            $payment->images()->save($imageObject);
        }

        return response()->json($payment);
    }
    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);
        $payment->update($request->all());
        return response()->json(['message' => 'Payment updated successfully']);
    }
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);

        try {
            $payment->delete();
            return response()->json(['message' => 'Payment deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting Payment'], 500);
        }
    }
}
