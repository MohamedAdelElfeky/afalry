<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'content' => 'required|string',
            'rate' => 'nullable|numeric|min:0|max:5',
        ]);

        $product = Product::findOrFail($productId);

        $commentData = [
            'content' => $request->input('content'),
            'rate' => $request->input('rate'),
            'user_id' => auth()->user()->id,
        ];

        $comment = $product->comments()->create($commentData);

        return response()->json([new CommentResource($comment)], 201);
    }
}
