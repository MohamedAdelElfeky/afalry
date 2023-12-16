<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggleLike($id)
    {
        $user = Auth::user();  
        $modelClass = 'App\Models\Product';
        $model = $modelClass::find($id);
        if (!$model) {
            return response()->json(['message' => 'المنتج غير موجود'], 404);
        }
        $existingLike = $user->likes()->where('likable_type', $modelClass)
            ->where('likable_id', $id)
            ->first();
        if ($existingLike) {
            $existingLike->delete();
            return response()->json(['message' => 'تم إزالة الإعجاب', 'liked' => false], 200);
        }
        $like = new Like();
        $like->likable_id = $id;
        $like->likable_type = $modelClass;
        $user->likes()->save($like);
        return response()->json(['message' => 'تم الإعجاب', 'liked' => true], 200);
    }
}
