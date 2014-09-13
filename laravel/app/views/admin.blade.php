@extends('layout')

@section('content')

<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h1>Admin</h1>
            <h2>Groups</h2>
            <table class="ui table segment">
			  <thead>
			    <tr><th>Name</th>
			  </tr></thead>
			  <tbody>
			    <?php
	            	$groups = Group::all();
					foreach($groups as $group){
						echo "<tr>";
						echo "<td>".$group->name."</td>";
						echo "</tr>";
					}
	      		?>
			  </tbody>
			  <tfoot>
			    <tr><th>
			      <div class="ui blue labeled icon button"><i class="lab icon"></i> Add Group</div>
			    </th>
			  </tr></tfoot>
			</table>
            

        </div>
    </div>
</div>
@stop