@extends('layouts.adminlayout')
@section('content')
<div class="page home-page">
  @include('inc.admin.nav')
  <div class="row">

  	<a href="javascript:void(0)" class="text-success" id="editbtn" style="padding: 0;position: relative;right: 0px;margin-left: 5px;box-shadow:0;font-size: 20px;" title="Edit">
  		<i class="fa fa-pencil-square"></i>
  	</a>
  	<div class="package_name">
  		{{$data->name}}
  	</div>


	
	  
</div>
<div class="col-md-3 bg-success text-white text-center" style="padding-top: 5px;">
	    <input type="file" id="adv_image" name="adv_image" multiple="multiple" /><i class="fa fa-plus"></i> &nbsp;Upload Cover Image 
	</div>
</div>
<form enctype="multipart/form-data" method="post" action="/details" id="edit-package-form">
	<input type="hidden" name="package_name" value="{{$data->name}}">
	<input type="hidden" name="package_location" value="{{$data->location}}">
	<input type="hidden" name="package_price" value="{{$data->price}}">
	<input type="hidden" name="package_difficulty" value="{{$data->difficulty}}">
	<input type="hidden" name="package_latitude" value="{{$data->latitude}}">
	<input type="hidden" name="package_longitude" value="{{$data->longitude}}">
</form>




@endsection

@section('utils')
<script type="text/javascript">
	function divClicked() {

	    var divHtml = $.trim($(this).next('div').html()); //select's the contents of div immediately previous to the button
	    var fv = $(this).next().attr('class');

	    var editableText = $("<div class='editbox'><textarea id='"+fv+"'/><br><button id='savebtn'>Save</button></div>");
	    editableText.children('textarea').val(divHtml);
	    $(this).next('div').replaceWith(editableText); //replaces the required div with textarea
	    editableText.children('textarea').focus();
	    // setup the blur event for this new textarea
	    $('#savebtn').click(function(event){
	    	
	    		var html = $(this).siblings('textarea').val().replace(/(\r\n|\n|\r)/gm,"");
			    var fn = $(this).siblings('textarea').attr('id');
			    var viewableText = $("<div class='"+fn+"'></div>");
			    $('input[name='+fn+']').val(html);
			    viewableText.html(html);
			    $(this).parent('.editbox').replaceWith(viewableText);
			    // setup the click event for this new div
			    viewableText.click(divClicked);    	
	    });
	}

	$(document).ready(function () {
	   $(document).on("click", "#editbtn", divClicked)
	});
</script>
@endsection



