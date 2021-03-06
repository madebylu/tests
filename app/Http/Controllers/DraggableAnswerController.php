<?php

namespace Tests\Http\Controllers;

use Illuminate\Http\Request;

use Tests\Draggable;
use Tests\DraggableAnswer;
use Tests\Http\Requests;

class DraggableAnswerController extends Controller
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
        //
        $draggable_targets = Draggable::where('question_id', $question_id)->get();
        
        return view('draggable_answer.create', 
            ['question_id' => $question_id,
            'draggable_targets' => $draggable_targets
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $question_id)
    {
        //
        $da = new DraggableAnswer;

        $da->question_id = $question_id;
        $da->title = $request->title;
        $da->draggable_id = $request->draggable_id;

        $da->save();

        if($request->ajax()) {
            return view('includes.question.draggable_target_row', ['draggable_answer' => $da]);
        }
        return redirect()->action('QuestionController@show', 
            ['id' => $da->question_id]);
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
        //
        $draggable_answer = DraggableAnswer::find($id);
        $draggable_targets = Draggable::where('question_id', $draggable_answer->question_id)->get();
        
        return view('draggable_answer.edit', 
            ['draggable_answer' => $draggable_answer,
            'draggable_targets' => $draggable_targets ]
        );
        
        
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
        $draggable_answer = DraggableAnswer::find($id);

        $draggable_answer->title = $request->title;
        $draggable_answer->draggable_id = $request->draggable_id;

        $draggable_answer->save();

        return redirect()->action('QuestionController@show', 
            ['id' => $draggable_answer->question_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $draggable_answer = DraggableAnswer::find($id);
        $draggable_answer->delete();
        return redirect()->action('QuestionController@show', 
            ['id' => $draggable_answer->question_id]);
    }
}
