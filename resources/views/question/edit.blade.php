@extends('layouts.master')

@section('content')

<h2>Edit {{$question->title}}</h2>

<form method="post" action="/question/update/{{$question->id}}">
    {!! csrf_field() !!}
    <input type="text" name="title" placeholder="Question Title" value="{{$question->title}}" /> <br />
    <textarea name="content" placeholder="Question Description" />{{$question->content}}</textarea> <br />
    <input type="submit" value="Update"/>
</form>

@endsection
