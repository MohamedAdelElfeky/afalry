<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $question = Question::all();
        if ($question->isEmpty()) {
            return response()->json(['message' => 'No Question found'], 200);
        }
        return response()->json(QuestionResource::collection($question), 200);
    }
}
