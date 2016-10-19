<?php

namespace Tests\Http\Controllers;

use Illuminate\Http\Request;

use Tests\Draggable;

use Tests\Http\Requests;

class DraggableController extends Controller
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
        return view('draggable.create', ['question_id' => $question_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $question_id)
    {
        $draggable = new Draggable;

        $draggable->question_id = $question_id;
        $draggable->title = $request->title;
        $draggable->content = $request->content;

        $draggable->save();

        return redirect()->action('QuestionController@show', ['id' => $draggable->question_id]);
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
        $draggable = Draggable::find($id);
        
        return view('draggable.edit', ['draggable' => $draggable]);
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
        $draggable = Draggable::find($id);

        $draggable->title = $request->title;
        $draggable->content = $request->content;

        $draggable->save();
        
        return redirect()->action('QuestionController@show', 
            ['id' => $draggable->question_id]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $draggable = Draggable::find($id);
        $draggable->delete();
        return redirect()->action('QuestionController@show', 
            ['id' => $draggable->question_id]
        );
    }
}
