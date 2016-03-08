<?php

namespace Tests\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

use Tests\Http\Requests;
use Tests\Http\Controllers\Controller;

use Tests\Answer;
use Tests\Question;
use Tests\Quiz;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($question_id)
    {
       return view('answer.create', ['question_id' => $question_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $question_id)
    {
        $answer = new Answer;
        $answer->title = $request->title;
        $answer->content = $request->content;
        $answer->correct = isset($request->correct);
        $answer->question_id = $question_id;
    
        $answer->save();

        return redirect()->action('QuestionController@show', ['id' => $answer->question_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $answer = Answer::find($id);

        return view('answer.edit', ['answer' => $answer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $answer = Answer::find($id);
        $answer->title = $request->title;
        $answer->content = $request->content;
        $answer->correct = isset($request->correct);
    
        $answer->save();

        return redirect()->action('QuestionController@show', ['id' => $answer->question_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer = Answer::find($id);
        $question = Question::find($answer->question_id);
        $quiz = Quiz::find($question->quiz_id);

        if (Auth::user()->id == $quiz->user_id) {
            $answer->delete();
        }
        return redirect()->action('QuestionController@show', ['id' => $answer->question_id]);
    }
}
