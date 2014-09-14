@extends('layout')

@section('content')
<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h1>Admin</h1>

            <div class="ui accordion">
			  <div class="active title">
			    <i class="dropdown icon"></i>
			    Groups
			  </div>
			  <div class="active content">
			    <table class="ui table segment">
				  <thead>
				    <tr>
				    	<th>Name</th>
				    	<th>Edit</th>
				    	<th>Delete</th>
				  </tr></thead>
				  <tbody>
				    <?php
		            	$groups = Group::all();
						foreach($groups as $group){
							echo "<tr id='row".$group->id."''>";
								echo "<td><div id=".$group->id.">".$group->name."</div></td>";
								echo '<td><div id="edit'.$group->id.'"><div class="ui button" onclick="editGroup('.$group->id.');"><i class="edit icon"></i></div></div></td>';
								echo '<td><div class="ui button" onclick="deleteGroup('.$group->id.');"><i class="remove icon"></i></div></td>';
							echo "</tr>";
						}
		      		?>
				  </tbody>
				  <tfoot>
				    <tr><th colspan="3">
				      <div class="ui blue labeled icon button"><i class="lab icon"></i> Add Group</div>
				    </th>
				  </tr></tfoot>
				</table>
			  </div>
			  <div class="title">
			    <i class="dropdown icon"></i>
			    What kinds of dogs are there?
			  </div>
			  <div class="content">
			    <p>There are many breeds of dogs. Each breed varies in size and temperament. Owners often select a breed of dog that they find to be compatible with their own lifestyle and desires from a companion.</p>
			  </div>
			</div>

<input type='text' value='test'/>


        </div>
    </div>
</div>
<script>
function editGroup(counter){
	var text = $("#"+counter).text();
	//$("#"+counter).text("");
	$("#"+counter).empty().append('<input id="input'+counter+'" type="text" value="'+text+'"/>');
	$("#edit"+counter).empty().append('<div class="ui button"onclick="saveGroup('+counter+');"><i class="save icon"></i></div>');
}

function saveGroup(counter){
	var text = $("#input"+counter).val();
	$("#edit"+counter).empty().append('<div class="ui button"onclick="editGroup('+counter+');"><i class="edit icon"></i></div>');
	$("#"+counter).empty().append(text);
	$.get( "changeGroup?action=update&id="+counter+"&to="+text, function( data ) {
	});
}

function deleteGroup(counter){
	$('#row'+counter).remove();
	$.get( "changeGroup?action=delete&id="+counter, function( data ) {
	});
}
</script>
@stop