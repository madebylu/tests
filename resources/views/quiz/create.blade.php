@extends('layouts.master')

@section('content')

<h2>Create a new test</h2>

<form method="post" action="/quiz/store">
    {!! csrf_field() !!}
    <input type="text" name="topic" placeholder="Topic" /> <br />
    <input type="text" name="title" placeholder="Quiz Title" />-{{Auth::user()->id}} <br />
    <input type="text" name="code" placeholder="Enter a unique code for this test" /> <br />
    Hidden? <input type="checkbox" name="hidden" checked /> (hidden tests aren't listed* but can be accessed by their code) <br />
    <textarea name="content" placeholder="Quiz Description" /></textarea> <br />
    <input type="submit" value="Add"/>
</form>

<p>*At some point in the future, tests that aren't hidden will be browsable</p>
@endsection
