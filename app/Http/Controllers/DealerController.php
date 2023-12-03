<?php

namespace App\Http\Controllers;

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
    public function sync()
    {
        $response = Http::asForm()->get('https://fvtion.com/API/afirly/aljard.php');

        if ($response->successful()) {
            $data = json_decode($response->body(), true);

            if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
                return response()->json(['error' => 'Failed to decode JSON response']);
            }

            foreach ($data as $item) {
                Dealer::updateOrCreate(
                    ['branch_id' => $item['BranchID']],
                    [
                        'branch_id' => $item['BranchID'],
                        'username'  => $item['UserName'],
                    ]
                );
            }

            return response()->json(['message' => 'Sync successful']);
        } else {
            return response()->json(['error' => 'Failed to fetch data from the API'], $response->status());
        }
    }
}
