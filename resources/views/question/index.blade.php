@extends('layouts.master')

@section('content')

    <h2>My Tests</h2>

    <div class="row">
    @foreach($quizzes as $quiz)
        <a href="/quiz/view/{{$quiz->id}}">
        <div class="col-sm-4">
            <h3>{{$quiz->title}}</h3>
            <p>{{$quiz->content}}<p>
            
        </div>
        </a>
    @endforeach
    </div>
@endsection
