@extends('layouts.master')

@section('menu_items')
     <a href="/quiz/view/{{$question->quiz_id}}"><span class="glyphicon glyphicon-arrow-left"></span></a> <a href="/question/edit/{{$question->id}}"><span class="glyphicon glyphicon-edit"></span></a>
@endsection

@section('content')

<h2> {{$question->title}}</h2>

<p>{{$question->content}}</p>

<div class="row">
    <div class="col-sm-6">
        <h3>Draggables</h3>
        <p class="btn btn-default" id="add-draggable"><a href="/draggable/add/{{$question->id}}">Add another draggable</a></p>
        <table class="table" id="draggable-table">
        @each('includes.question.draggable_row', $draggables, 'draggable')
        </table>
        <form id="add-draggable-form" class="full-width">
            <p>Add a new Draggable</p>
            {!! csrf_field() !!}
            <input type="number" name="title" placeholder="Draggable number" /> <br />
            <textarea name="content" placeholder="Draggable Description" /></textarea> <br />
            <input type="submit" value="add"/>
        </form>
    </div>
    <div class="col-sm-6">
        <h3>Draggable Targets</h3>
        <p class="btn btn-default"><a href="/draggable_answer/add/{{$question->id}}">Add another draggable target</a></p>
        <table class="table">
        @each('includes.question.draggable_target_row', $draggable_answers, 'draggable_answer')
        </table>
    </div>
</div>
<p class="btn btn-default"><a href="/question/add/{{$question->quiz_id}}">Add another question to this test</a></p>
<p class="btn btn-default"><a href="/question/add_draggable/{{$question->quiz_id}}">Add another draggable question to this test</a></p>

<script>
$(function() {
    $('#add-draggable-form').hide();
    $('#add-draggable').on('click', function(e) {
        $('#add-draggable-form').show();
        e.preventDefault();
    });
    $('#add-draggable-form').on('submit', function(e) {
        form_data = $(this).serializeArray();
        console.log(form_data);
        $.post('/draggable/store/{{$question->id}}', form_data, 
            function(data) {
                $('#draggable-table').append(data);
            }
        )
        .done(function(data) {
            $('#add-draggable-form').hide();
            $('#add-draggable-form input[type=number]').val('');
            $('#add-draggable-form textarea').val('');
        });
        e.preventDefault(); 
    });
});
</script>

@endsection
