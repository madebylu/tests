<h3>{{$question->title}}</h3>

<p>{{$question->content}}</p>

<div class="drag-zone row">
    <div class="col-sm-6">
        @foreach($question->draggables as $draggable)
            <p class="draggable">{{$draggable->title}}</p>
        @endforeach
    </div>
    <div class="col-sm-6">
        @foreach($question->draggable_answers as $draggable_answer)
            <p class="target">{{$draggable_answer->title}}</p>
        @endforeach
    </div>
</div>
<script src="/js/draggable.js"></script>
