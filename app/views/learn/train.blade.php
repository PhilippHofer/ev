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
    background-color: white;
}
.visible.content{
    position: absolut;
    display: inline-block;
    width: 200px;
    height: 50px;
    background-color: white;
}
</style>

<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Vokabeln Trainieren</h3>
            <?php
            	$groups = Auth::user()->groups;
                $counter = 0;
                foreach($groups as $group) {
                	echo "<hr /><h5>".$group->name."</h5>";
                	foreach($group->words as $word){
                		echo '<div class="ui move reveal">';
                		echo '<span class="visible content">'.$word->german.'</span>';
                		echo '<span class="hidden content">'.$word->english.'</span>';
                		echo '</div><br />';
                	}
                }
            ?>
			<br /><br />
            <a href="{{ URL::to('learn') }}" class="ui teal submit button">Fertig</a>
        </div>
    </div>
</div>


@stop