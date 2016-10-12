<?php

namespace Tests\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Tests\Http\Requests;
use Tests\Http\Controllers\Controller;

use Tests\Answer;
use Tests\Draggable;
use Tests\DraggableAnswer;
use Tests\Question;
use Tests\Quiz;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset(Auth::user()->id)){
            $quizzes = Quiz::where('user_id', Auth::user()->id)->orderBy('code')->get();
            return view('quiz.index', ['quizzes' => $quizzes]);
        }
        else
        {
            return view('home', ['message' => 'You need to be logged in to do that - Please either login or register']);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()){
            
            $quiz = new Quiz;
            $quiz->user_id = Auth::user()->id;
            $quiz->topic = $request->topic;
            $quiz->title = $request->title;
            $quiz->content = $request->content;
            $quiz->hidden = isset($request->hidden);
            $quiz->code = $request->code;

            $quiz->save();
            
            return redirect()->action('QuizController@show', ['id' => $quiz->id]);
        } else {
            return "you need to be logged in to do that";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::find($id);
        $questions = $quiz->questions;
        return view('quiz.view', ['quiz' => $quiz, 'questions' => $questions]);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::find($id);
        
        return view('quiz.edit', ['quiz' => $quiz]);
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
        if (Auth::check()){
            $quiz = Quiz::find($id);
            if(Auth::user()->id == $quiz->user_id){
                $quiz->topic = $request->topic;
                $quiz->title = $request->title;
                $quiz->content = $request->content;
                $quiz->hidden = $request->hidden;
                $quiz->code = $request->code;

                $quiz->save();
            }
            return redirect()->action('QuizController@show', ['id' => $quiz->id]);
        } else {
            return "you need to be logged in to do that";
        }
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
    }
    
    public function sit($id)
    {
        $quiz = Quiz::find($id);
        $questions = Question::where('quiz_id', $id)
            ->with('answers')
            ->with('draggables')
            ->with('draggable_answers')
            ->get();
        return view('quiz.sit', ['quiz' => $quiz, 'questions' => $questions]);
    }

    public function code_redirect($code)
    {
        try{
        $code_array = explode('-', $code);
        $user_id = array_pop($code_array);
        $code = implode('-', $code_array);
        $quiz = Quiz::where(['code' => $code, 'user_id' => $user_id])->firstOrFail();
        return redirect()->action('QuizController@sit', ['id' => $quiz->id]);
        }
        catch(\Exception $e){
            return view('home', ['message' => 'No test with that code']);
        }

    }
    
    //checks of a test code alreadyv exists for the currently logged in user.
    //returns whether a code is unique or a duplicate.
    public function validate_code($code)
    {
        try{
            $quiz = Quiz::where(['code' => $code, 'user_id' => Auth::user()->id])->firstOrFail();
            return "duplicate";
        }
        catch (\Exception $e) {
            return "unique";
        }
    }
}
