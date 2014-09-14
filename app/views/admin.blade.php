@extends('layout')

@section('content')
<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            @if(Auth::user() != null && Auth::user()->admin == 1)
            <h1>Admin</h1>

            <div class="ui accordion">
			  <div class="active title">
			    <i class="dropdown icon"></i>
			    Groups
			  </div>
			  <div class="active content">
			    <table class="ui table segment" id="wholeTable">
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
				   	  <div id="insertGroupTextField"></div>
				      <div id="insertGroupButton">
				      	<div class="ui blue labeled icon button" onclick="insertGroup();"><i class="lab icon"></i> Add Group</div>
				      </div>
				    </th>
				  </tr></tfoot>
				</table>
			  </div>
			  <div class="title">
			    <i class="dropdown icon"></i>
			    Vocabulary
			  </div>



			  <div class="content">
			    <div class="ui selection dropdown">
				  <input id="selectAGroup" value="0" name="selectAGroup" type="hidden">
				  <div class="text">Select your category</div>
				  <i class="dropdown icon"></i>
				  <div class="menu">
				  	<?php
		            	$groups = Group::all();
						foreach($groups as $group){
							echo '<div class="item" data-value="'.$group->id.'">'.$group->name.'</div>';		
						}
		      		?>
				    
				  </div>
				</div>
				<br /><br />
				
				<input id="uploadFile" name="uploadFile" type="file" size="50" maxlength="100000" accept="*.csv">   
				<div class="ui vertical labeled icon buttons" onclick="uploadCsv();">
					  <div class="ui button">
					    <i class="file icon" ></i>Upload CSV
					  </div>
				</div>
			  </div>
			</div>
            @else
            <h2>Keine Berechtigung</h2>
            <hr/>
            Du hast keine Berechtigung, diese Seite aufzurufen!
            @endif



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
		location.reload();
	});
}

function deleteGroup(counter){
	$('#row'+counter).remove();
	$.get( "changeGroup?action=delete&id="+counter, function( data ) {
		location.reload();
	});
}

function insertGroup(){
	$("#insertGroupTextField").empty().append('<input id="insertGroupText" type="text"/>');
	$("#insertGroupButton").empty().append('<div class="ui blue labeled icon button" onclick="insertGroupReally();"><i class="save icon"></i> Add Group</div>');

}

function insertGroupReally(){
	var text = $("#insertGroupText").val();

	$("#insertGroupTextField").empty();
	$("#insertGroupButton").empty().append('<div class="ui blue labeled icon button" onclick="insertGroup();"><i class="lab icon"></i> Add Group</div>');

	$.get( "changeGroup?action=insert&name="+text, function( data ) {
		location.reload();
	});
}

function uploadCsv(){
	//Retrieve the first (and only!) File from the FileList object
    var f = document.getElementById("uploadFile").files[0]; 

    if (f) {
      var r = new FileReader();
      r.onload = function(e) { 
	    var contents = e.target.result;
        parseCsv(contents);
      }
      r.readAsText(f,'UTF-8');
    } else { 
      alert("Failed to load file");
    }
}

function parseCsv(content){
	var group = $("#selectAGroup").val();
	var lines = content.split(/\s+/g);
	for(var i = 0;i<lines.length;i++){
	   var match = lines[i];
	   var keyValue = match.split(";");

	   var german = keyValue[0];
	   var english = keyValue[1];

	   insertVocab(group,german,english);
	}
}

function insertVocab(group, german, english){
	$.get( "insertVocab?group="+group+"&german="+german+"&english="+english, function( data ) {
	});
}
</script>
@stop