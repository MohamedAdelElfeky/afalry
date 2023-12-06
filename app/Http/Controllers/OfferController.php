<?php

namespace App\Http\Controllers;

use App\Http\Resources\OfferResource;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $paginate = \env('PAGINATE', 25);
        $offers = Offer::paginate($paginate);
        $products = Product::all();
        return view('pages.dashboards.offers.index', [
            'offers' => OfferResource::collection($offers),
            'products' => $products,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'nullable|exists:products,id',
            'type' => 'nullable|in:value,present',
            'value' => 'nullable|integer',
            'end_date' => 'nullable|date',
        ]);

        $offer =  Offer::create($request->all());

        return response()->json($offer);
    }
    public function update(Request $request, $id)
    {
        $offer = Offer::find($id);
        $offer->update($request->all());
        return response()->json(['message' => 'Offer updated successfully']);
    }
    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);

        try {
            $offer->delete();
            return response()->json(['message' => 'Offer deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting Offer'], 500);
        }
    }
}
