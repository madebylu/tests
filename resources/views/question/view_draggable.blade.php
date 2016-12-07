@extends('layouts.master')

@section('menu_items')
     <a href="/quiz/view/{{$question->quiz_id}}" title="Back"><span class="glyphicon glyphicon-arrow-left"></span></a> <a href="/question/edit/{{$question->id}}" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
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
        <form id="add-draggable-form" class="full-width hidden">
            <p>Add a new Draggable</p>
            {!! csrf_field() !!}
            <input type="number" name="title" placeholder="Draggable number" /> <br />
            <textarea name="content" placeholder="Draggable Description" /></textarea> <br />
            <input type="submit" value="add"/>
        </form>
    </div>
    <div class="col-sm-6">
        <h3>Draggable Targets</h3>
        <p class="btn btn-default" id="add-draggable-target"><a href="/draggable_answer/add/{{$question->id}}">Add another draggable target</a></p>
        <table class="table" id="draggable-target-table">
        @each('includes.question.draggable_target_row', $draggable_answers, 'draggable_answer')
        </table>
        <form id="add-draggable-target-form" class="full-width hidden">
            <p>Add a new Draggable Target</p>
            {!! csrf_field() !!}
            <select name="draggable_id"> 
                @foreach($draggables as $draggable)
                    <option value="{{$draggable->title}}">{{$draggable->content}}</option>
                @endforeach
            </select><br />
            <textarea name="title" placeholder="Draggable Description" /></textarea> <br />
            <input type="submit" value="add"/>
        </form>
    </div>
</div>
<p class="btn btn-default"><a href="/question/add/{{$question->quiz_id}}">Add another question to this test</a></p>
<p class="btn btn-default"><a href="/question/add_draggable/{{$question->quiz_id}}">Add another draggable question to this test</a></p>

<script>
$(function() {
    $('#add-draggable').on('click', function(e) {
        $('#add-draggable-form').removeClass('hidden');
        e.preventDefault();
    });
    $('#add-draggable-target').on('click', function(e) {
        $('#add-draggable-target-form').removeClass('hidden');
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
            $('#add-draggable-target-form select').append($('<option>', {
                value: $('#add-draggable-form input[type=number]').val(),
                text: $('#add-draggable-form textarea').val()
            }));
            $('#add-draggable-form').addClass('hidden');
            $('#add-draggable-form input[type=number]').val('');
            $('#add-draggable-form textarea').val('');
            
        });
        e.preventDefault(); 
    });
    $('#add-draggable-target-form').on('submit', function(e) {
        form_data = $(this).serializeArray();
        console.log(form_data);
        $.post('/draggable_answer/store/{{$question->id}}', form_data,
            function(data) {
                $('#draggable-target-table').append(data);
            }
        )
        .done(function(data) {
            $('#add-draggable-target-form').addClass('hidden');
            $('#add-draggable-target-form textarea').val('');
        });
        e.preventDefault();
    });
});
</script>

@endsection
