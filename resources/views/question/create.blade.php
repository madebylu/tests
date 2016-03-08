@extends('layouts.master')

@section('content')

<h2>Add a Question</h2>

<form method="post" action="/question/store/{{$quiz_id}}">
    {!! csrf_field() !!}
    <input type="text" name="title" placeholder="Question Title" /> <br />
    <textarea name="content" placeholder="Question text" /></textarea> <br />
    <h3>Answers</h3>
    <input type="text" name="answer[1][title]" value="1" />
    <textarea name="answer[1][content]" placeholder="Answer..." /></textarea>
    Correct? <input type="checkbox" name="answer[1][correct]" /><br />
    
    <input type="text" name="answer[2][title]" value="2" />
    <textarea name="answer[2][content]" placeholder="Answer..." /></textarea>
    Correct? <input type="checkbox" name="answer[2][correct]" /><br />


    <input type="text" name="answer[3][title]" value="3" />
    <textarea name="answer[3][content]" placeholder="Answer..." /></textarea>
    Correct? <input type="checkbox" name="answer[3][correct]" /><br />

    <input type="text" name="answer[4][title]" value="4" />
    <textarea name="answer[4][content]" placeholder="Answer..." /></textarea>
    Correct? <input type="checkbox" name="answer[4][correct]" /><br />


    <input type="submit" value="Add"/>
</form>

@endsection
