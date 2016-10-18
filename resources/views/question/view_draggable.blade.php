@extends('layouts.master')

@section('menu_items')
     <a href="/quiz/view/{{$question->quiz_id}}"><span class="glyphicon glyphicon-arrow-left"></span></a> <a href="/question/edit/{{$question->id}}"><span class="glyphicon glyphicon-edit"></span></a>
@endsection

@section('content')

<h2> {{$question->title}}</h2>

<p>{{$question->content}}</p>

<div class="row">
    <div class="col-sm-6">
        <h3>Draggables</h3>
        <p class="btn btn-default"><a href="/draggable/add/{{$question->id}}">Add another draggable</a></p>
        <table class="table">
        @foreach($draggables as $draggable)
            <tr>
                <td>{{$draggable->title}} </td>
                <td> {{$draggable->content}} </td> 
                <td><a href="/draggable/edit/{{$draggable->id}}"><span class="glyphicon glyphicon-edit"></span> </a> </td>
                <td><a href="/draggable/delete/{{$draggable->id}}"><span class="glyphicon glyphicon-remove"></span> </a> </td>
            </tr>
        @endforeach
        </table>
    </div>
    <div class="col-sm-6">
        <h3>Draggable Targets</h3>
        <p class="btn btn-default"><a href="/draggable_answer/add/{{$question->id}}">Add another draggable target</a></p>
        <table class="table">
        @foreach($draggable_answers as $draggable_answer)
            <tr>
                <td>({{$draggable_answer->draggable_id}}) {{$draggable_answer->title}} </td>
                <td><a href="/draggable_answer/edit/{{$draggable_answer->id}}"><span class="glyphicon glyphicon-edit"></span> </a> </td>
                <td><a href="/draggable_answer/delete/{{$draggable_answer->id}}"><span class="glyphicon glyphicon-remove"></span> </a> </td>
            </tr>
        @endforeach
        </table>
    </div>
</div>
<p class="btn btn-default"><a href="/question/add/{{$question->quiz_id}}">Add another question to this test</a></p>
<p class="btn btn-default"><a href="/question/add_draggable/{{$question->quiz_id}}">Add another draggable question to this test</a></p>

@endsection
