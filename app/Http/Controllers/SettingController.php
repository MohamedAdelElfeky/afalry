<?php

namespace App\Http\Controllers;

use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $paginate = \env('PAGINATE', 25);
        $settings = Setting::paginate($paginate);
        return view('pages.dashboards.settings.index', [
            'settings' => SettingResource::collection($settings),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'nullable|string',
            'value' => 'nullable|string',
        ]);

        $setting =  Setting::create($request->all());

        return response()->json($setting);
    }
    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);
        $setting->update($request->all());
        return response()->json(['message' => 'Setting updated successfully']);
    }
    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);

        try {
            $setting->delete();
            return response()->json(['message' => 'Setting deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting Setting'], 500);
        }
    }
}
