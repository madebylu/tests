@extends('layouts.master')

@section('content')


<form method="post" action="/quiz/store">
    <h2>Create a new test</h2>
    {!! csrf_field() !!}
    <input type="text" name="topic" placeholder="Topic" /> <br />
    <input type="text" name="title" placeholder="Quiz Title" /><br />
    <p class="alert alert-danger form-advisory" id="duplicate_code">You already have a test with this code, please choose another.</p>
    <input type="text" class="with-suffix" id="code" name="code" placeholder="Enter a unique code for this test" />-{{Auth::user()->id}}  <br /><br />
    Hidden? <input type="checkbox" name="hidden" checked /> (hidden tests aren't listed* but can be accessed by their code) <br /><br />
    <textarea name="content" placeholder="Quiz Description" /></textarea> <br />
    <input type="submit" value="Add"/>
    <p>*At some point in the future, tests that aren't hidden will be browsable</p>
</form>


<script>
$(document).ready(function() {
    $('#duplicate_code').hide();
    $('#code').on('keyup', function(event) {
        var quiz_code = $(this).val();
        if (quiz_code){
            $.post(
                "/quiz/validate_code/" + quiz_code,
                {
                    '_token': '{!! csrf_token() !!}'
                },
                function(data){
                    if (data == "duplicate") {
                        $('#duplicate_code').show();
                        $('input[type=submit]').hide();
                    } else {
                        $('#duplicate_code').hide();
                        $('input[type=submit]').show();
                    }
                    console.log(data);
                }
            );
        }
    });
});
</script>

@endsection
