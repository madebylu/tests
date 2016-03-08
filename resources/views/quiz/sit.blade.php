@extends('layouts.master')

@section('content')


<h2>{{$quiz->title}}</h2>


<div class="row">
    @foreach($questions as $question)
    <div class="col-sm-6 question">
        <h3>{{$question->title}}</h3>
        <p>{{$question->content}}</p>
        @foreach($question->answers as $answer)
            <p class="answer @if($answer->correct) correct @endif" >
                {{$answer->title}} - {{$answer->content}}</p>
        @endforeach
        
    </div>
    @endforeach
    <div class="col-sm-12" >
        <h3 class="mark_answers">Done!</h3>
        <h2 class="percent"></h2>
        <p class="score">Correct answers: <span class="correct_answers"> </p>
        <p class="score">Out of: <span class="total_marks"> </p>
        <p class="score">Inorrect answers: <span class="incorrect_answers"> </p>
    </div>
</div>




<script>
    $('document').ready( function () {
        $('.score').hide();
        $('p.answer').on('click', function(event){
            $(this).toggleClass('selected');
        });
        $('.mark_answers').on('click', function(event) {
            var score = $('.correct.selected').length;
            var total = $('.correct').length;
            var selected = $('.selected').length;
            $('.score').show();
            $('.score span.correct_answers').text(score);
            $('.score span.total_marks').text(total);
            $('.score span.incorrect_answers').text(selected - score);
            $('h2.percent').text(Math.floor(100 * score / total) + '%');
            
            $('.correct').addClass('show_correct_border');
            $('.selected').addClass('show_incorrect_answer');
            $('.correct.selected').addClass('show_correct_answer');
            
            $('html, body').animate({ 
               scrollTop: $(document).height()-$(window).height()}, 
               800, 
               "linear"
            );
        });
    });

</script>

@endsection
