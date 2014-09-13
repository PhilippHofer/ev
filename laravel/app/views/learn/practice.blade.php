@extends('layout')

@section('content')
<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Vokabeln üben</h3>
            <hr/>
            <div class="row">
                <div class="small-12 medium-2 large-2 column">
                    Stufe 1: 56/100
                </div>
                <div class="small-12 medium-6 large-8 column">
                    <div class="ui blue progress">
                        <div class="bar" style="width: 56%;">
                        </div>
                    </div>
                </div>
                <div class="small-12 medium-4 large-2 column">
                    <a class="ui green submit button">Üben</a>
                </div>
            </div>
            <div class="row">
                <div class="small-12 medium-2 large-2 column">
                    Stufe 2: 25/100
                </div>
                <div class="small-12 medium-6 large-8 column">
                    <div class="ui blue progress">
                        <div class="bar" style="width: 25%;"></div>
                    </div>
                </div>
                <div class="small-12 medium-4 large-2 column">
                    <a class="ui green submit button">Üben</a>
                </div>
            </div>
            <div class="row">
                <div class="small-12 medium-2 large-2 column">
                    Stufe 3: 19/100
                </div>
                <div class="small-12 medium-6 large-8 column">
                    <div class="ui blue progress">
                        <div class="bar" style="width: 19%;"></div>
                    </div>
                </div>
                <div class="small-12 medium-4 large-2 column">
                    <a class="ui green submit button">Üben</a>
                </div>
            </div>

            <hr/>

            <a href="{{ URL::to('learn') }}" class="ui green submit button">Zurück</a>
        </div>
    </div>
</div>
@stop