@extends('layouts.master')

@section('menu_items')
    <a href="/quiz/index"><span class="glyphicon glyphicon-arrow-left"></span></a>  <a href="/quiz/edit/{{$quiz->id}}"><span class="glyphicon glyphicon-edit"></span></a> <a href="/question/add/{{$quiz->id}}"><span class="glyphicon glyphicon-plus"></span></a>

@endsection

@section('content')

<h2>{{$quiz->title}}</h2>

<h2>Code: {{$quiz->code}}-{{Auth::user()->id}}</h2>

<p>{{$quiz->content}}</p>

<h3>Questions</h3>

<table class="table">
<tr><th>Title</th><th>Content</th><th>Edit</th><th>Delete</th></tr>
@foreach($questions as $question)
    <tr>
        <td>{{$question->title}}</td>
        <td>{{$question->content}}</td>
        <td><a href="/question/view/{{$question->id}}"><span class="glyphicon glyphicon-edit"></span> </a> </td>
        <td><a href="/question/delete/{{$question->id}}"><span class="glyphicon glyphicon-remove"></span> </a> </td>
    </tr>
@endforeach
</table>

<p class="btn btn-default"><a href="/question/add/{{$quiz->id}}">Add a multiple choice or true/false question.</a></p>
<p class="btn btn-default"><a href="/question/add_draggable/{{$quiz->id}}">Add a drag and drop question.</a></p>

@endsection
