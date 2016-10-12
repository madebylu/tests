@extends('layouts.master')

@section('content')

<h2>Add a Question</h2>

<form method="post" action="/question/store_draggable/{{$quiz_id}}">
	{!! csrf_field() !!}
    <input type="text" name="title" placeholder="Question Title" /> <br />
    <textarea name="content" placeholder="Question text"></textarea> <br />

    <h3>Answers</h3>
    <p>Create content for draggables and for each target give it a description and identify which draggable should be dropped on it </p>
    
    <div class="row">
        <div class="col-sm-6 draggables">
            <h3>Draggables</h3>
            @for ($i=1; $i <= 4; $i++)
            <input type="text" name="draggable[{{$i}}][title]" value="{{$i}}"
                readonly="readonly" />
            <textarea 
                name="draggable[{{$i}}][content]" 
                placeholder="Draggable Text"></textarea>
            @endfor
        </div>
        <div class="col-sm-6 draggable-answers">
            <h3>Targets</h3>
            @for ($i=1; $i <= 4; $i++)
            <select name="draggable_answer[{{$i}}][draggable_id]">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>            
            <textarea name="draggable_answer[{{$i}}][title]"
                placeholder="Target box description..." ></textarea>
            @endfor
        </div>
        <div class="col-sm-12">
            <input type="submit" value="Add" />
        </div>        
    </div>

</form>

@endsection
