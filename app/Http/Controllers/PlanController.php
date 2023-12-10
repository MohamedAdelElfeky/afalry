<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanResource;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $paginate = \env('PAGINATE', 25);
        $plans = Plan::paginate($paginate);
        return view('pages.dashboards.plans.index', [
            'plans' => PlanResource::collection($plans),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable',
            'des' => 'nullable',
            'ranking' => 'nullable|integer',
            'days' => 'nullable|integer',
            'monthly_price' => 'nullable|integer',
            'yearly_price' => 'nullable|integer',
            'if_free' => 'nullable',
        ]);

        $plan =  Plan::create($request->all());

        return response()->json($plan);
    }
    public function update(Request $request, $id)
    {
        $plan = Plan::find($id);
        $plan->update($request->all());
        return response()->json(['message' => 'Plan updated successfully']);
    }

    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);

        try {
            $plan->delete();
            return response()->json(['message' => 'Plan deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting Plan'], 500);
        }
    }
    public function updatePlanFree(Request $request)
    {
        $planId =  $request->input('plan_id');
        // dd($planId);
        $plan = Plan::find($planId);
    
        if (!$plan) {
            return response()->json(['error' => 'Plan not found'], 404);
        }
    
        $plan->is_free = $request->input('is_free');
        $plan->save();
    
        return response()->json(['message' => 'Plan updated successfully']);
    }
    
}
