@extends('layout')

@section('content')
<style>

.ui move right reveal{
	position:relative;
}
.hidden{
	position: absolut;
    display: inline-block;
    background-color: white;
}
.visible.content{
    position: absolut;
    display: inline-block;
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
                echo '<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">';
                foreach($groups as $group) {
                	echo "<hr /><h5>".$group->name."</h5>";
                	foreach($group->words as $word){
                		echo '<li><div class="ui fade reveal">';
                		echo '<span class="visible content">'.$word->german.'</span>';
                		echo '<span class="hidden content">'.$word->english.'</span>';
                		echo '</div></li>';
                	}
                }
                echo '</ul>';
            ?>
			<br /><br />
            <a href="{{ URL::to('learn') }}" class="ui teal submit button">Fertig</a>
        </div>
    </div>
</div>


@stop