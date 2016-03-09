@extends('layouts.master')

@section('menu_items')
    <a href="/quiz/index"><span class="glyphicon glyphicon-arrow-left"></span></a>  <a href="/quiz/edit/{{$quiz->id}}"><span class="glyphicon glyphicon-edit"></span></a> <a href="/question/add/{{$quiz->id}}"><span class="glyphicon glyphicon-plus"></span></a>

@endsection

@section('content')

<h2>{{$quiz->title}}</h2>

<h2>Code: {{$quiz->code}}-{{Auth::user()->id}}</h2>

<p>{{$quiz->content}}</p>

<h3>Questions</h3>

@foreach($questions as $question)

<p>{{$question->title}} - {{$question->content}} 
    <a href="/question/view/{{$question->id}}"><span class="glyphicon glyphicon-edit"></span> </a> 
    <a href="/question/delete/{{$question->id}}"><span class="glyphicon glyphicon-remove"></span> </a> 
</p>

@endforeach

<p><a href="/question/add/{{$quiz->id}}">Add another question.</a></p>

@endsection
