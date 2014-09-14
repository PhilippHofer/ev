@extends('layout')

@section('scripts')
{{ HTML::script('js/practice.js') }}
@show

@section('content')
<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Vokabeln üben</h3>
            <hr/>

            <?php
                $jc = new JsonController();
                $words = $jc->userWords();
                $boxes = array();
                $countWords = 0;
                foreach($words as $word){
                    $box = $word->box;
                    if(!array_key_exists($box, $boxes)) {
                        $boxes[$box] = 1;
                    } else {
                        $boxes[$box]++;
                    }
                    $countWords++;
                }
            ?>

            @foreach($boxes as $key => $value)
            <div class="row">
                <div class="small-12 medium-2 large-2 column">
                    Stufe {{$key}}: {{$value}}/{{$countWords}}
                </div>
                <div class="small-12 medium-6 large-8 column">
                    <div class="ui blue progress">
                        <div class="bar" style="width: {{($value/$countWords)*100}}%;">
                        </div>
                    </div>
                </div>
                <div class="small-12 medium-4 large-2 column">
                    <a class="ui green submit button">Üben</a>
                </div>
            </div>
            @endforeach



            <hr/>

            <a href="{{ URL::to('learn') }}" class="ui green submit button">Zurück</a>
        </div>
    </div>
</div>
@stop