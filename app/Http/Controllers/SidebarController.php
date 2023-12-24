<?php

namespace App\Http\Controllers;

use App\Http\Resources\SidebarResource;
use App\Models\Sidebar;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function index()
    {
        $paginate = \env('PAGINATE', 25);
        $sidebars = Sidebar::paginate($paginate);
        return view('pages.dashboards.sidebars.index', [
            'sidebars' => SidebarResource::collection($sidebars),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'nullable|string',
            'value' => 'nullable|string',
        ]);

        $sidebar =  Sidebar::create($request->all());

        return response()->json($sidebar);
    }
    public function update(Request $request, $id)
    {
        $sidebar = Sidebar::find($id);
        $sidebar->update($request->all());
        return response()->json(['message' => 'Sidebar updated successfully']);
    }
    public function destroy($id)
    {
        $sidebar = Sidebar::findOrFail($id);

        try {
            $sidebar->delete();
            return response()->json(['message' => 'Sidebar deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting Sidebar'], 500);
        }
    }
}
