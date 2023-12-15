<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $paginate = \env('PAGINATE', 25);
        $questions = Question::paginate($paginate);
        return view('pages.dashboards.questions.index', [
            'questions' => QuestionResource::collection($questions),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'count' => 'nullable',
            'question' => 'nullable|string',
        ]);

        $question =  Question::create($request->all());

        return response()->json($question);
    }
    public function update(Request $request, $id)
    {
        $question = Question::find($id);
        $question->update($request->all());
        return response()->json(['message' => 'Question updated successfully']);
    }
    public function destroy($id)
    {
        $question = Question::findOrFail($id);

        try {
            $question->delete();
            return response()->json(['message' => 'Question deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting Question'], 500);
        }
    }
}
