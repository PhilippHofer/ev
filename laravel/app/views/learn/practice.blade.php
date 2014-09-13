@extends('layout')

@section('content')
<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Vokabeln üben</h3>
            <hr/>
            <a href="{{ URL::to('learn') }}" class="ui green submit button">Fertig</a>
        </div>
    </div>
</div>
@stop