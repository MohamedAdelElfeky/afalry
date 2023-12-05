<?php

namespace App\Http\Controllers;

use App\Http\Resources\DealerResource;
use App\Models\Dealer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class DealerController extends Controller
{
     public function index()
    {
        $paginate = \env('PAGINATE', 25);
        $dealers = Dealer::paginate($paginate);

        return view('pages.dashboards.dealers.index', ['dealers' => DealerResource::collection($dealers)]);
    }


    public function sync()
    {
        $response = Http::asForm()->get('https://fvtion.com/API/afirly/store_menu.php');
        if ($response->successful()) {
            $data = $response->json();
            foreach ($data as $item) {
                Dealer::updateOrCreate(
                    ['branch_id' => $item['BranchID']],
                    [
                        'branch_id'  => $item['BranchID'],
                        'username'  => $item['UserName'],
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
