@extends('layouts.master')

@section('content')

<h2>Add an answer</h2>

<form method="post" action="/answer/store/{{$question_id}}">
    {!! csrf_field() !!}
    <input type="text" name="title" placeholder="Answer Title" /> <br />
    <textarea name="content" placeholder="Answer text" /></textarea> <br />
    Correct? <input type="checkbox" name="correct" />
    <input type="submit" value="Add"/>
</form>

@endsection
