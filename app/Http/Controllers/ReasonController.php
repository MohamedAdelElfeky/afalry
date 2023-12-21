<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReasonResource;
use App\Models\Reason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReasonController extends Controller
{
    public function index()
    {
        $paginate = \env('PAGINATE', 25);
        $reasons = Reason::paginate($paginate);

        return view('pages.dashboards.reasons.index', ['reasons' => ReasonResource::collection($reasons)]);
    }


    public function sync()
    {
        $response = Http::asForm()->get('https://fvtion.com/API/afirly/get/Reasons.php');
        if ($response->successful()) {
            $data = $response->json();
            foreach ($data as $item) {
                Reason::updateOrCreate(
                    ['reason_id' => $item['ID']],
                    [
                        'reason_id'  => $item['ID'],
                        'name'  => $item['ReName'],
                    ]
                );
            }
            return response()->json(['message' => 'Sync successful']);
        } else {
            // Handle the case when the request fails
            return response()->json(['error' => 'Failed to fetch data from the API'], $response->status());
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $reason =  Reason::create($request->all());

        return response()->json($reason);
    }
    public function update(Request $request, $id)
    {
        $reason = Reason::find($id);
        $reason->update($request->all());
        return response()->json(['message' => 'Reason updated successfully']);
    }
    public function destroy($id)
    {
        $reason = Reason::findOrFail($id);

        try {
            $reason->delete();
            return response()->json(['message' => 'Reason deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting Reason'], 500);
        }
    }
}
