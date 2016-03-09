@extends('layouts.master')

@section('content')

<h2>Edit {{$quiz->title}}</h2>

<form method="post" action="/quiz/update/{{$quiz->id}}">
    {!! csrf_field() !!}
    <input type="text" name="topic" placeholder="Topic" value="{{$quiz->topic}}" /> <br />
    <input type="text" name="title" placeholder="Quiz Title" value="{{$quiz->title}}" /> <br />
    <input type="text" class="with-suffix" name="code" placeholder="Code" value="{{$quiz->code}}" />-{{Auth::user()->id}} <br />
    <input type="text" name="hidden" checked="{{$quiz->hidden}}" /> <br />
    <textarea name="content" placeholder="Quiz Description" />{{$quiz->content}}</textarea> <br />
    <input type="submit" value="Update"/>
</form>

@endsection
