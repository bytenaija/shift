<?php

namespace App\Http\Controllers;

use App\Questions;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Questions::all();
        return response()->json($questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'dimension' => 'required',
            'direction' => 'required',
            'meaning' => 'required',
        ]);

        $question = Questions::create($request->all());

        return response()->json([
            'message' => 'Great success! Your question has been created',
            'question' => $question
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function show(Questions $questions)
    {
        return $question;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function edit(Questions $question)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questions $question)
    {
        $request->validate([
            'question' => 'required',
            'dimension' => 'required',
            'direction' => 'required',
            'meaning' => 'required',
        ]);

        $question = $question->update($request->all());

        return response()->json([
            'message' => 'Great success! question updated',
            'question' => $question
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questions $question)
    {
        $question->delete();
        return response()->json([
            'message' => 'Successfully deleted task'
        ]);
    }
}
