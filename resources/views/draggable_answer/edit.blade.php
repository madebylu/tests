@extends('layouts.master')

@section('content')

<h2>Edit Draggable {{$draggable->title}}</h2>

<form method="post" action="/draggable/update/{{$draggable->id}}">
    {!! csrf_field() !!}
    <input type="text" name="title" placeholder="Draggable Title" value="{{$draggable->title}}" /> <br />
    <textarea name="content" placeholder="Draggable Description" />{{$draggable->content}}</textarea> <br />
    <input type="submit" value="Update"/>
</form>

@endsection
