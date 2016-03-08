@extends('layouts.master')

@section('content')

<h2><a href="/quiz/view/{{$question->quiz_id}}">&lt;</a> {{$question->title}} <a href="/question/edit/{{$question->id}}">#</a></h2>

<p>{{$question->content}}</p>

<h3>Answers</h3>
@foreach($answers as $answer)
    <p>{{$answer->title}} - {{$answer->content}} <a href="/answers/edit/{{$answer->id}}">#</a> </p>
    
@endforeach


<p><a href="/answers/add/{{$question->id}}">Add more Answers...</a></p>
<p><a href="/question/add/{{$question->quiz_id}}">Add another question to this test</a></p>

@endsection
