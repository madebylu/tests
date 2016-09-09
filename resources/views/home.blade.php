@extends('layouts.master')

@section('alerts')
    @if(isset($message)) <div class="alert alert-warning">{{$message}}</div> @endif
@endsection

@section('content')

<div class="row">
    <div class="col-sm-6">
        <h1>Take a test</h1>
        <form id="sit_test">
            <input type="text" placeholder="Code" id="code" /> <br />
            <input type="submit" value="Find"  />
        </form>
    </div>
    
    <a href="/quiz/index">
    <div class="col-sm-6">
        <h1>Make or<br /> change tests</h1>
    </div>
    </a>
</div>


<script>
    $('document').ready( function() {
        $('#sit_test').on('submit', function(event) {
            event.preventDefault();
            redirect_to = '/quiz/code_redirect/' + $('#code').val();

            window.location.href = redirect_to;
        });
    });
</script>

@endsection
