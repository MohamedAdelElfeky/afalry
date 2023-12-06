<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class CityController extends Controller
{
    public function index()
    {
        $paginate = \env('PAGINATE', 25);
        $cities = City::paginate($paginate);

        return view('pages.dashboards.cities.index', ['cities' => CityResource::collection($cities)]);
    }

    public function sync()
    {
        $response = Http::asForm()->get('https://fvtion.com/API/afirly/get/get_Cities.php');
        if ($response->successful()) {
            $data = $response->json();
            foreach ($data as $item) {
                City::updateOrCreate(
                    ['city_id' => $item['ID']],
                    [
                        'city_id'  => $item['ID'],
                        'name'  => $item['CName'],
                        'deleg'  => $item['DelValue'],
                        'com'  => $item['ComValue'],
                        'del'  => $item['DelegValue'],
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
            'deleg' => 'nullable',
            'com' => 'nullable',
            'del' => 'nullable',
        ]);

        $city =  City::create($request->all());

        return response()->json($city);
    }
    public function update(Request $request, $id)
    {
        $city = City::find($id);
        $city->update($request->all());
        return response()->json(['message' => 'City updated successfully']);
    }
    public function destroy($id)
    {
        $city = City::findOrFail($id);

        try {
            $city->delete();
            return response()->json(['message' => 'City deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting City'], 500);
        }
    }
}
