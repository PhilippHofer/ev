@extends('layout')

@section('scripts')
{{ HTML::script('js/train.js') }}
@show

@section('content')
<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Vokabeln Trainieren</h3>
            <hr/>

            <a href="{{ URL::to('learn') }}" class="ui teal submit button">Fertig</a>
        </div>
    </div>
</div>

@stop