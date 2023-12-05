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

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'deleg' => 'required|numeric',
            'com' => 'required|numeric',
            'del' => 'required|numeric',
        ]);
        $city = City::findOrFail($id);
        $city->update($validatedData);
        return response()->json(['message' => 'City updated successfully']);
    }

    
}
