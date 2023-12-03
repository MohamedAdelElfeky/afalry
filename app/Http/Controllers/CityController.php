<?php

namespace App\Http\Controllers;

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
        return view('pages.dashboards.cities.index');
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
            // Handle the case when the request fails
            return response()->json(['error' => 'Failed to fetch data from the API'], $response->status());
        }
    }
}
