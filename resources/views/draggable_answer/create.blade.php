@extends('layouts.master')

@section('content')

<h2>New Draggable <h2>

<form method="post" action="/draggable_answer/store/{{$question_id}}">
    {!! csrf_field() !!}
    <input type="text" name="title" placeholder="Draggable Title" /> <br />
    <select name="draggable_id">
        @foreach($draggable_targets as $target)
            <option value = "{{$target->title}}">{{$target->content}}</option>
        @endforeach
    </select> <br />
    <input type="submit" value="add"/>
</form>

@endsection
