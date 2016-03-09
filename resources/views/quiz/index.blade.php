@extends('layouts.master')

@section('menu_items')
     <a href="/quiz/add"><span class="glyphicon glyphicon-plus"></span></a> 
@endsection


@section('content')

    <h2> My Tests </h2>

    <div class="row">
    @foreach($quizzes as $quiz)
        <a href="/quiz/view/{{$quiz->id}}">
        <div class="col-sm-4 quiz">
            <h3>{{$quiz->title}}</h3>
            <h3>{{$quiz->code}}-{{Auth::user()->id}}</h3>
            <p>{{$quiz->content}}<p>
            
        </div>
        </a>
    @endforeach
    </div>
@endsection
