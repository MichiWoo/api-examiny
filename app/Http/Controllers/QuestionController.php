<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Question;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    use ApiResponder;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userAuth = auth('sanctum')->user();
        $questions = Question::where('user_id', $userAuth['id'])->get();
        
        $data = QuestionResource::collection($questions);

        return $this->success('Información consultada correctamente', $data, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
