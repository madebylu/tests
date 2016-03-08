@extends('layouts.master')

@section('menu_items')
     <a href="/quiz/view/{{$question->quiz_id}}"><span class="glyphicon glyphicon-arrow-left"></span></a> <a href="/question/edit/{{$question->id}}"><span class="glyphicon glyphicon-edit"></span></a>
@endsection

@section('content')

<h2> {{$question->title}}</h2>

<p>{{$question->content}}</p>

<h3>Answers</h3>
@foreach($answers as $answer)
    <p>{{$answer->title}} - {{$answer->content}} 
        <a href="/answer/edit/{{$answer->id}}"><span class="glyphicon glyphicon-edit"></span> </a> 
        <a href="/answer/delete/{{$answer->id}}"><span class="glyphicon glyphicon-remove"></span> </a> 
    </p>
    
@endforeach


<p><a href="/answer/add/{{$question->id}}">Add another answer</a></p>
<p><a href="/question/add/{{$question->quiz_id}}">Add another question to this test</a></p>

@endsection
