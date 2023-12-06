<?php

namespace App\Http\Controllers;

use App\Http\Resources\StatusResource;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class StatusController extends Controller
{
    public function index()
    {
        $paginate = \env('PAGINATE', 25);
        $status = Status::paginate($paginate);
        return view('pages.dashboards.statuses.index', ['status' => StatusResource::collection($status)]);
    }

    public function sync()
    {
        $response = Http::asForm()->get('https://fvtion.com/API/afirly/OrderStatus.php');
        if ($response->successful()) {
            $data = $response->json();
            foreach ($data as $item) {
                Status::updateOrCreate(
                    ['status_erp' => $item['ID']],
                    [
                        'status_erp'  => $item['ID'],
                        'name' => $item['ScName'],
                    ]
                );
            }

            return response()->json(['message' => 'Sync successful']);
        } else {
            return response()->json(['error' => 'Failed to fetch data from the API'], $response->status());
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'nullable',
        ]);

        $status =  Status::create($request->all());

        return response()->json($status);
    }
    public function update(Request $request, $id)
    {
        $status = Status::find($id);
        $status->update($request->all());
        return response()->json(['message' => 'Status updated successfully']);
    }
    public function destroy($id)
    {
        $status = Status::findOrFail($id);

        try {
            $status->delete();
            return response()->json(['message' => 'Status deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting Status'], 500);
        }
    }
}
