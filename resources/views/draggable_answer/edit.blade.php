@extends('layouts.master')

@section('content')

<h2>Edit Draggable Target - {{$draggable_answer->title}}</h2>

<form method="post" action="/draggable_answer/update/{{$draggable_answer->id}}">
    {!! csrf_field() !!}
    <input type="text" name="title" placeholder="Draggable Title" value="{{$draggable_answer->title}}" /> <br />
    <select name="draggable_id">
        @foreach($draggable_targets as $target)
            <option value = "{{$target->title}}" @if($target->title == $draggable_answer->draggable_id) selected="selected" @endif  >{{$target->content}}</option>
        @endforeach
    </select> <br />
    <input type="submit" value="Update"/>
</form>

@endsection
