<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class ProductController extends Controller
{
    public function index()
    {
        return view('pages.dashboards.products.index');
    }
    public function show()
    {
        // return view('pages.dashboards.products.index');
    }
    public function sync()
    {
        $postData = ['BranchID' => 2];
        $response = Http::asForm()->post('https://fvtion.com/API/afirly/aljard.php', $postData);
        // dd($response);
        if ($response->successful()) {
            $data = $response->json();
            foreach ($data as $item) {
                Product::updateOrCreate(
                    ['product_id' => $item['ID']],
                    [
                        'product_id'  => $item['ID'],
                        'name'  => $item['Name'],
                        'price' => $item['Price'],
                        'balance' => $item['Balance'],
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
