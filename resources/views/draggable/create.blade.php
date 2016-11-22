@extends('layouts.master')

@section('content')

<h2>New Draggable <h2>

<form method="post" action="/draggable/store/{{$question_id}}">
    {!! csrf_field() !!}
    <input type="number" name="title" placeholder="Draggable number" value="{{$next_title}}" /> <br />
    <textarea name="content" placeholder="Draggable Description" /></textarea> <br />
    <input type="submit" value="add"/>
</form>

@endsection
