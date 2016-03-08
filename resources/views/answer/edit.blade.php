@extends('layouts.master')

@section('content')

<h2>Edit Answer {{$answer->title}}</h2>

<form method="post" action="/answer/update/{{$answer->id}}">
    {!! csrf_field() !!}
    <input type="text" name="title" placeholder="Answer Title" value="{{$answer->title}}" /> <br />
    <textarea name="content" placeholder="Answer Description" />{{$answer->content}}</textarea> <br />
    Correct? <input type="checkbox" name="correct" @if($answer->correct) checked @endif   /> <br />
    <input type="submit" value="Update"/>
</form>

@endsection
