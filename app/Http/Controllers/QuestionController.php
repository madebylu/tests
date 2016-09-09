<?php

namespace Tests\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Tests\Http\Requests;
use Tests\Http\Controllers\Controller;

use Tests\Answer;
use Tests\Question;
use Tests\Quiz;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        
        return view('question.index', ['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($quiz_id)
    {
        return view('question.create', ['quiz_id' => $quiz_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $quiz_id)
    {
        if (Auth::check()){
            
            //return $request->answer;
            //break;
 
            $question = new Question;
            $question->quiz_id = $quiz_id;
            $question->title = $request->title;
            $question->content = $request->content;
            $question->type = $request->type;

            $question->save();
        
            foreach($request->answer as $answer){
                $a = new Answer;
                $a->question_id = $question->id;
                $a->title = $answer["title"]; 
                $a->content = $answer["content"];
                $a->correct = isset($answer["correct"]);

                $a->save();
            }
            
            return redirect()->action('QuestionController@show', ['id' => $question->id]);
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
        $question = Question::find($id);
        $answers = $question->answers;
        return view('question.view', ['question' => $question, 'answers' => $answers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        
        return view('question.edit', ['question' => $question]);
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
            
            $question = Question::find($id);
            $question->title = $request->title;
            $question->content = $request->content;
            $question->type = $request->type;

            $question->save();
            
            return redirect()->action('QuestionController@show', ['id' => $question->id]);
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
        $question = Question::find($id);
        $quiz = Quiz::find($question->quiz_id);

        if (Auth::user()->id == $quiz->user_id) {
            $answers = Answer::where('question_id', $id)->delete();
            $question->delete();
        }
        return redirect()->action('QuizController@show', ['id' => $question->quiz_id]);
    }
}
