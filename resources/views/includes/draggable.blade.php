<h3>{{$question->title}}</h3>

<div class="drag-zone row">
    <div class="col-sm-6">
    <p>{{$question->content}}</p>
        @foreach($question->draggables as $draggable)
            <p class="draggable" data-drag="{{$draggable->title}}">
                {{$draggable->content}}
            </p>
        @endforeach
    </div>
    <div class="col-sm-6">
        @foreach($question->draggable_answers as $draggable_answer)
            <p style="border: none; user-select: none; -webkit-user-select: none; margin-bottom: 0;padding: 0.3em 0 0 0;">{{$draggable_answer->title}}</p>
            <div class="target" 
                data-target="{{$draggable_answer->draggable_id}}">
                <p>{{$draggable_answer->title}}</p>
            </div>
        @endforeach
    </div>
</div>
