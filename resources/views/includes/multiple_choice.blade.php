<h3>{{$question->title}}</h3>
<p>{{$question->content}}</p>
@foreach($question->answers as $answer)
    <p class="answer @if($answer->correct) correct @endif" >
	{{$answer->title}} - {{$answer->content}} 
    </p>
@endforeach
        
