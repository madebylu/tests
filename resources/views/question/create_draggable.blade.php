@extends('layouts.master')

@section('content)

<h2>Add a Question</h2>

<form method="post" action="/question/store/{{$quiz_id}}">
	{!! csrf_field() !!}
    <input type="text" name="title" placeholder="Question Title" /> <br />
    <textarea name="content" placeholder="Question text"></textarea> <br />

    <h3>Answers</h3>
    
    <div class="row">
        <div class="col-sm-6 draggables">
            <input type="text" name="draggable[1][title]" value="1" />
            <textarea 
                name="draggable[1][content]" 
                placeholder="Draggable Text">
            </textarea>
            
        </div>
        <div class="col-sm-6 draggable-answers">
            <input type="text" name="draggable_answer[1][title]" value="1" />
            <input type="test" name="draggable_answer[1][draggable_id]"
                placeholder="matches draggable..." />
        </div>
        
    </div>

</form>

@endsection
