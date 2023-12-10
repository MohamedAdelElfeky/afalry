<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComplaintResource;
use App\Models\Complaint;
use Illuminate\Http\Request;

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class ComplaintController extends Controller
{
    public function index()
    {
        $paginate = \env('PAGINATE', 25);
        $complaints = Complaint::paginate($paginate);
        return view('pages.dashboards.complaints.index', [
            'complaints' => ComplaintResource::collection($complaints),
        ]);
    }

    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);

        try {
            $complaint->delete();
            return response()->json(['message' => 'Complaint deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting Complaint'], 500);
        }
    }
}
