@extends('wsadmin.crewlayout')
@section('content')
<section class="content-header">
    <h1>
      Edit Package
    </h1>
    <ol class="breadcrumb">
      <li><a href="/crew/manage"><i class="fa fa-dashboard"></i> Home</a></li>>
      <li class="active">Add Package</li>
    </ol>
  </section>
<section class="content">
<div class="row">
	<div class="col-md-12">
	  <!-- Custom Tabs (Pulled to the right) -->
	  <div class="nav-tabs-custom">
	    <ul class="nav nav-tabs pull-right">
	      <li class="active"><a href="#tab_1-1" data-toggle="tab">Edit Package Details</a></li>
	      <li><a href="#tab_2-2" data-toggle="tab">Photos</a></li>
	      <li><a href="#tab_3-2" data-toggle="tab">Videos</a></li>
	      <li class="pull-left header"><i class="fa fa-th"></i> {{$data['package']->name}}</li>
	    </ul>
	    <div class="tab-content">
	      <div class="tab-pane active" id="tab_1-1">
        <div class="card">
          <div class="card-header bg-success ">
            Basic Details
            <div class="toggle-pkgd" style="float: right;"> <span>&nbsp;&nbsp;&nbsp;<a href="#" id="editbdbtn">Edit <i class="fa fa-pencil-square"></i></a></span></div>
          </div>
          <div class="card-body" style="padding: 0px !important;">
            <form class="form-horizontal" style="display: none;" id="basic-details" method="post" action="/updatedetails/{{$data['package']->id}}">
            {{ csrf_field() }}
          <div class="form-group row">
                      <label class="col-sm-2">Package Name</label>
                      <div class="col-md-6">
                        <input name="package_name" type="text" placeholder="Name of Adventure" class="form-control form-control-success" value="{{$data['package']->name}}" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">Location</label>
                      <div class="col-md-6">
                        <input name="package_location" type="text" placeholder="Where will the Adventure take place?" class="form-control" value="{{$data['package']->location}}" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">Price in Peso</label>
                      <div class="col-md-6">
                        @php
                          $price = (string)$data['package']->price;
                        @endphp
                        <input name="package_price" type="text" value="{{$price}}" placeholder="How much is this Adventure?" class="form-control" required>
                        <small id="price-error"></small>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">Difficulty</label>
                      <div class="col-md-8">
                         <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="package_difficulty" id="df1" value="easy" checked>
                    Easy
                  </label>
                         <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="package_difficulty" id="df2" value="medium">
                    Medium
                  </label>
                        <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="package_difficulty" id="df3" value="hard">
                    Hard
                  </label>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2">Introduction</label>
                      <div class="col-md-10">
                      	<textarea name="package_dsc" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required=""></textarea>
                      </div>
                    </div> 
                    <div class="form-group row">
                      <label class="col-sm-2">Cover Photo</label>
                        <input type="file" id="adv_image" name="package_image" style="margin-left: 12px;" />
                    </div>   
                    <div class="form-group row">       
                      <div class="col-sm-10 offset-sm-2">
                        <input type="submit" value="Save Changes" class="btn btn-primary" style="float:right;margin-right: 20px;">
                      </div>
                    </div>
        </form>
          </div>
        </div>

        <div class="card">
          <div class="card-header bg-success ">
            Package Inclusions
            <div class="toggle-pkgd" style="float: right;" > <span>&nbsp;&nbsp;&nbsp;<a href="#" id="editinbtn" class="">Edit <i class="fa fa-pencil-square"></i></a></span></div>
          </div>
          <div class="card-block">
              <form class="form-horizontal" style="display: none;" id="package-inclusions">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">What's Included?</h2>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-sm includeds">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Included</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="i-content">
                      @foreach($data['includes'] as $i)
                      <tr class="item-i">
                        <th scope="row"><span class="num">{{$loop->iteration}}</span></th>
                        <td>{{$i->included_item}}</td>
                        <td><a href="javascript:void(0)" data-id="{{$i->id}}" id="remove_includedbtn" class="btn btn-default" title="Remove from included"><i class="fa fa-trash"></i>
                        </a>
                        </td>
                      </tr>
                       @endforeach
                    </tbody>
                  </table>

                    <div class="form-group row" style="margin-left: 5px;">
                    <div class="col-md-4" style="margin-left: 0;padding-left: 4px;">
                      <input  type="text" id="included" placeholder="Add Something that is Included in this Package" class="form-control" >
                    </div>                
                  </div>
                  <div class="form-group row" style="margin-left: 5px;">
                  <button class="btn-sm btn-primary" id="add_includedbtn" title="Add something that is included in this Adventure"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</button>
                  </div>
                </div>
              </div>
          </form>
          </div>
        </div>

        <div class="card">
          <div class="card-header bg-success ">
            Package Available Dates 
            <div class="toggle-pkgd " style="float: right;"><span>&nbsp;&nbsp;&nbsp;<a href="#" class="" id="editdatesbtn">Edit <i class="fa fa-pencil-square"></i></a></span></div>
          </div>
          <div class="card-block">
            <form class="form-horizontal" style="display: none;" id="package-dates-form">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">Available Dates</h2>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-sm scheds">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="avd-content">
                      @foreach($data['schedules'] as $s)
                      <tr>
                       <th scope="row"><span class="num2">{{$loop->iteration}}</span></th>
                        <td>{{ date('M d, Y', strtotime($s->date)) }}</td>
                        <td><a href="javascript:void(0)" data-id="{{$s->id}}" id="remove_avdbtn" class="btn btn-default" title="Remove"><i class="fa fa-trash"></i>
                        </a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="form-group row" style="margin-left: 5px;">
                    <div class="col-md-4" style="margin-left: 0;padding-left: 4px;">
                      <input type="text" id="date-avd" placeholder="Add Date" class="form-control" >
                    </div>
                  </div>
                  <div class="form-group row" style="margin-left: 5px;">
                  <button class="btn-sm btn-primary" id="add_avdbtn" title="Add something that is included in this Adventure"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</button>
                </div>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="card">
          <div class="card-header bg-success ">
            Add Information About the Package 
             <div class="toggle-pkgd" style="float: right;"><span>&nbsp;&nbsp;&nbsp;<a class="" href="#" id="editcontentbtn">Edit <i class="fa fa-pencil-square"></i></a></span></div>
          </div>
          <div class="card-block">
            <div class="card">
            <form class="form-horizontal" style="display: none;" id="info-form" method="post" action="/addcontent/{{$data['package']->id}}">
            <div class="card-body">
              <table class="table table-striped table-sm info">
                <thead>
                  <tr>
                    <th>Information Title</th>
                    <th>Information About</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($data['content'] as $bk)
                  <tr>
                    <td>{{$bk->title}}</td>
                    <td>{!!$bk->content!!}</td>
                    <td>
                      <a href="javascript:void(0)" class="btn-sm btn-danger" id="deleteinfobtn" data-id="{{$bk->id}}">
                        Delete
                      </a>
                    </td>

                  </tr>
                @endforeach
                </tbody>
              </table>
    
                    <div class="row" id="bookings">
                <div class="col-md-12">
                  
                </div>          
              </div>
                    {{ csrf_field() }}
                    <div class="form-group row">
                      <label class="col-sm-2">Information Title</label>
                      <div class="col-md-6">
                        <input name="info_title" type="text" placeholder="Information about?" class="form-control form-control-success" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2">Information</label>
                      <div class="col-md-8">
                      	<textarea name="info_body" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required=""></textarea>
                      </div>
                    </div> 
                    <div class="form-group row">       
                      <div class="col-sm-10 offset-sm-2">
                        <input type="submit" value="Add Information" class="btn btn-primary" style="float:right;margin-right: 20px;">
                      </div>
                    </div>
                </form>
            </div>
          </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header bg-success ">
            Package Prices - Pricing Table
            <div class="toggle-pkgd" style="float: right;" > <span>&nbsp;&nbsp;&nbsp;<a href="#" id="editprices" class="">Edit <i class="fa fa-pencil-square"></i></a></span></div>
          </div>
          <div class="card-block">
              <form class="form-horizontal" style="display: none;" id="prices-form">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">Manage Prices</h2>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-sm prices">
                    <thead>
                      <tr>
                        <th>Person Count</th>
                        <th>Price per person</th>
                        <th>Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="prices-table">
                      @foreach($data['prices'] as $i)
                      <tr class="item-i">
                        <th scope="row"><span class="num">{{$i->person_count}}</span></th>
                        <td>₱ {{number_format($i->price_per)}}</td>
                        <td>₱ {{number_format($i->price_per*$i->person_count)}}</td>
                        <td>
                        <a href="javascript:void(0)" data-id="{{$i->id}}" data-count="{{$i->person_count}}" data-price="{{$i->price_per}}" id="edit_pricebtn" class="btn btn-default" title="Edit Price"><i class="fa fa-pencil"></i>
                        </a>

                        <a href="javascript:void(0)" data-id="{{$i->id}}" id="remove_pricebtn" class="btn btn-default" title="Remove Price" @if (!$loop->last) disabled style="pointer-events: none;" @else data-position="last" @endif><i class="fa fa-trash"></i>
                        </a>
                        </td>
                      </tr>
                       @endforeach
                    </tbody>
                  </table>

                    <div class="form-group row" style="margin-left: 5px;">
                    <div class="col-md-4" style="margin-left: 0;padding-left: 4px;">
                      <div class="input-group">
                      <span class="input-group-addon">₱</span>
                      <input  type="text" id="price_for" placeholder="Add price as per the next client(s)" class="form-control" >
                      </div>
                    </div>                
                  </div>
                  <div class="form-group row" style="margin-left: 5px;">
                  <button class="btn-sm btn-primary" id="add_price_forbtn" title="Add something that is included in this Adventure"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</button>
                  </div>
                </div>
              </div>
          </form>
          </div>
        </div> 
	      </div>
	      <!-- /.tab-pane -->
	      <div class="tab-pane" id="tab_2-2">
	  		<div class="row">
			<div class="col-md-12">
  			<div class="box box-info">
	            <div class="box-header with-border">
	              <h3 class="box-title">Upload Photos</h3>
	            </div>
	            <div class="box-body">
	              	<form action="/upload/{{$data['package']->id}}" method="post" enctype="multipart/form-data" id="upload-photo">
				  	{{ csrf_field() }}
	                <div class="col-md-3">
	                  <label class="custom-file">
					   	<input type="file" name="images[]" multiple required>
					    <span class="custom-file-control"></span>
				 	</label>
	                </div>
	                <div class="col-md-4">
	                  <button type="submit" class="btn btn-primary bd" >
                     <i class="fa fa-plus-circle" aria-hidden="true"></i> Upload
                    </button>
	              </form>
	              </div>
	            </div>
	            <!-- /.box-body -->
				</div>
			</div>
		  	<div class="album text-muted" id="photosga">
        <div class="container">
          <div class="row" id="upds">
          	@foreach($data['images'] as $i)
            <div class="card">
              <img src="/storage/images/{{$i->imagename}}" data-id="{{$i->id}}"><a href="#" class="btn btn-block btn-danger dltphoto" id="deletephotobtn">Delete photo</a>
            </div>
            @endforeach 
	        </div>
	    </div>
			</div>
    </div>
	</div>
	      <!-- /.tab-pane -->
	      <div class="tab-pane" id="tab_3-2">
	        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Videos</h3>
            </div>
            <div class="box-body">
    			<form class="form-horizontal" id="add-video-form" action="/addvideo/{{$data['package']->id}}" method="POST">{{ csrf_field() }}
                <div class="form-group col-md-4">
                  <label>Video Link</label>
                  <input id="video-link" type="text" name="video_link" placeholder="Vimeo or Youtube Link of the Video" class="form-control mb-2 mx-sm-3" required>
                </div>
                <div class="form-group col-md-12">
                  <label>Video Thumbnail</label>
                  <input type="file" name="video_thumb" required placeholder="asd">
                </div>
                <div class="form-group col-md-12">
                 <button type="submit" class="btn btn-primary">
                 <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Video
                </button>
                </div>
             </form>
              </div>
        <div class="album text-muted" id="videosga">
        <div class="container">
          <div class="row lightgallery" id="vupds">
          	@foreach($data['videos'] as $i)
            <div class="card" data-src="{{$i->video_link}}">
            	<a class="lglg" href="#">
		             <img src="/storage/video_thumbs/{{$i->video_thumbimg}}" style="width: 100%;height: 250px;">
		        </a>
              <div class="demo-gallery-poster">
                    <img src="http://sachinchoolur.github.io/lightGallery/static/img/play-button.png">
              </div>
              <a href="#" data-id="{{$i->id}}" class="btn btn-block btn-danger dltvid" id="deletevideobtn">Delete Video</a>
            </div>
            @endforeach 
	        </div>
	    </div>
			</div>
            </div>
            <!-- /.box-body -->
          </div>
	      </div>
	     
	      <!-- /.tab-pane -->
	    </div>
	    <!-- /.tab-content -->
	  </div>
	  <!-- nav-tabs-custom -->
	</div>
</div>
</section>

<div class="modal fade" id="edit-price-modal">
  <div class="modal-dialog">
    <div class="modal-content" style="background: transparent;">
      <div class="modal-body">
        <div class="box box-warning">
            <!-- /.box-header -->
            <div class="box-body">
               <form role="form" id="edit-price-form" method="POST">
                  <!-- text input -->
                  {{csrf_field()}}
                  <div class="form-group">
                    <label>Person Count:</label>
                    <input type="text" name="personcount" class="form-control" placeholder="Person Count..." value="" disabled required="">
                  </div>
                   <div class="form-group row" style="margin-left: 5px;">
                    <div class="col-md-12" style="margin-left: 0;padding-left: 4px;">
                      <label>Edit Price:</label>
                      <div class="input-group">
                      <span class="input-group-addon">₱</span>
                      <input type="text" name="new_price" class="form-control" placeholder="Price" value="" required="">
                      <input type="hidden" name="price_pos" class="form-control" value="">
                      </div>
                    </div>                
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save Changes" id="save-price-btn">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </form>
            </div>
          </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection

@section('utils')
<script type="text/javascript" src="/js/lightgallery.js"></script>
<script type="text/javascript" src="/js/lg-video.min.js"></script>
<script type="text/javascript" src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript">
	$( function() {
      $( "#date-avd" ).datepicker({
        minDate:0
      });
    });
	$('#editbdbtn').click(function(){
		$('#basic-details').slideToggle();
	});
	$('#editinbtn').click(function(){
		$('#package-inclusions').slideToggle();
	});
	$('#editdatesbtn').click(function(){
		$('#package-dates-form').slideToggle();
	});
  $('#editcontentbtn').click(function(){
    $('#info-form').slideToggle();
  });
  $('#editprices').click(function(){
    $('#prices-form').slideToggle();
  });
	var pid = '{{$data['package']->id}}';

  $(document).ready(function(){
  $('.lightgallery').lightGallery({
    mode: 'lg-fade',
    thumbnail:false,
    animateThumb: false,
    showThumbByDefault: false,
    autoplayControls: false,
    share: false,
    zoom: false,
    download: false,
    pager: false,
    loadVimeoThumbnail: true,
    vimeoThumbSize: 'thumbnail_medium',
    controls: false,
  });
});




</script>
<script type="text/javascript" src="/js/edp.js"></script>
@endsection