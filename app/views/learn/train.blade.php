@extends('layout')

@section('content')
<style>

.ui move right reveal{
	position:relative;
}
.hidden{
	position: absolut;
    display: inline-block;
    width: 200px;
    height: 50px;
    background-color: green;
}
.eins{
	position: relative;
}
</style>

<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Vokabeln Trainieren</h3>
            <hr/>
            <div id="eins">
				<div class="ui move right reveal">
				    <span class="visible content">test</span>
	 				<span class="hidden content">hallo</span>
				</div>
			</div>
            <a href="{{ URL::to('learn') }}" class="ui teal submit button">Fertig</a>
        </div>
    </div>
</div>


@stop