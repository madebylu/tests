@extends('layouts.master')

@section('content')

<h2>New Draggable <h2>

<form method="post" action="/draggable/store/{{$question_id}}">
    {!! csrf_field() !!}
    <input type="text" name="title" placeholder="Draggable Title" /> <br />
    <textarea name="content" placeholder="Draggable Description" /></textarea> <br />
    <input type="submit" value="add"/>
</form>

@endsection
