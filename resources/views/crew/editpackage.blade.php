@extends('layouts.adminlayout')
@section('content')
<div class="page home-page">
	@include('inc.admin.nav')
	  <div class="breadcrumb-holder">   
      <div class="container-fluid">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item active">Edit Package</li>
        </ul>
      </div>
    </div>
    <br>
	<div class="container-fluid">
    @if(Session::has('createpackagesuccess'))
    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('createpackagesuccess') }}</p>
    @endif
		<nav class="nav nav-tabs" id="myTab" role="tablist">
		  <a class="nav-item nav-link active" id="basicdetails-tab" data-toggle="tab" href="#basicdetails" role="tab" aria-controls="basicdetails" aria-selected="true">Package Details</a>
      <a class="nav-item nav-link" id="itinerary-tab" data-toggle="tab" href="#itinerary" role="tab" aria-controls="itinerary" aria-selected="false">Itinerary</a>
		  <a class="nav-item nav-link" id="photos-tab" data-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="false">Photos</a>
		  <a class="nav-item nav-link" id="videos-tab" data-toggle="tab" href="#videos" role="tab" aria-controls="videos" aria-selected="false">Videos</a>
		</nav>
		<div class="tab-content" id="packagedetails-tab">
		  <div class="tab-pane fade show active" id="basicdetails" role="tabpanel" aria-labelledby="basicdetails-tab">
        <div class="card">
          <div class="card-header bg-success text-white">
            Basic Details
            <div class="toggle-pkgd" style="float: right;"> <span>&nbsp;&nbsp;&nbsp;<a href="#" id="editbdbtn" style="color: #fff !important;">Edit <i class="fa fa-pencil-square"></i></a></span></div>
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
                        <textarea class="form-control" name="package_dsc" rows="8" placeholder="Introduction or Overview of this Adventure" required style="padding-left: 10px;">{{$data['package']->description}}</textarea>
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
          <div class="card-header bg-success text-white">
            Package Inclusions
            <div class="toggle-pkgd" style="float: right;" > <span>&nbsp;&nbsp;&nbsp;<a href="#" id="editinbtn" class="text-white">Edit <i class="fa fa-pencil-square"></i></a></span></div>
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
                    <tbody>
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

                    <div class="form-group row">
                    <div class="col-md-4" style="margin-left: 0;padding-left: 4px;">
                      <input  type="text" id="included" placeholder="Add Something that is Included in this Package" class="form-control" >
                    </div>
                  </div><button class="btn-sm btn-primary" id="add_includedbtn" title="Add something that is included in this Adventure"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</button>
                </div>
              </div>
          </form>
          </div>
        </div>

        <div class="card">
          <div class="card-header bg-success text-white">
            Package Available Dates 
            <div class="toggle-pkgd " style="float: right;"><span>&nbsp;&nbsp;&nbsp;<a href="#" class="text-white" id="editdatesbtn">Edit <i class="fa fa-pencil-square"></i></a></span></div>
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
                    <tbody>
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
                  <div class="form-group row">
                    <div class="col-md-4" style="margin-left: 0;padding-left: 4px;">
                      <input type="text" id="date-avd" placeholder="Add Date" class="form-control" >
                    </div>
                  </div><button class="btn-sm btn-primary" id="add_avdbtn" title="Add something that is included in this Adventure"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="card">
          <div class="card-header bg-success text-white">
            Add Information About the Package 
             <div class="toggle-pkgd" style="float: right;"><span>&nbsp;&nbsp;&nbsp;<a class="text-white" href="#" id="editcontentbtn">Edit <i class="fa fa-pencil-square"></i></a></span></div>
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
                      <div class="col-md-10">
                        <textarea class="form-control" name="info_body" rows="8" placeholder="Information..." required style="padding-left: 10px;"></textarea>
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
        <div class="container">    	
        <br>
        <div class="row">
          <div class="col-md-9">      
         
          
      </div>
  </div>
</div>
		  </div>
      <div class="tab-pane fade show" id="itinerary" role="tabpanel" aria-labelledby="itinerary-tab" style="width: 100%;">
        <div class="card">
            <div class="card-body">
              <h5>Edit Itinerary</h5>
            </div>
          </div>
        <div class="container"> 
          <br>
            <form method="post" action="/updateitinerary/{{$data['package']->id}}" id="edit-itinerary-form">
              {{ csrf_field() }}
              <textarea col="40" id="edit-itinerary" name="package_itinerary">{!!$data['package']->itinerary!!}</textarea>
              <input type="submit" class="btn btn-primary" name="submit">
            </form>
        </div>
      </div>
		  <div class="tab-pane fade show" id="photos" role="tabpanel" aria-labelledby="photos-tab" style="width: 100%;">
		  	<div class="container">
          <div class="card">
            <div class="card-body">
              <h5>Edit Photos</h5>
            </div>
          </div>
		  		<div class="row">
				<div class="col-md-4">
				  	<form action="/upload/{{$data['package']->id}}" method="post" enctype="multipart/form-data" id="upload-photo">
				  		 {{ csrf_field() }}
						    <label class="custom-file">
							   	<input type="file" name="images[]" multiple required>
							    <span class="custom-file-control"></span>
						 	</label>
						  	<input type="submit" value="Upload Photo(s)" name="upload">
				  	</form>
				  	<div class="progress">
				        <div class="bar"></div>
				        <div class="percent text-center">0%</div>
				    </div>
				</div>
			</div>
		  		<br>
				<div class="row text-center" id="pkg_images">
				  <!-- width of .grid-sizer used for columnWidth -->
				  @foreach($data['images'] as $i)
            <div class="grid-item"><img class="img-responsive" src="/storage/images/{{$i->imagename}}" data-id="{{$i->id}}"><a href="#" class="dltphoto" id="deletephotobtn">Delete photo</a></div>
          @endforeach 
				</div>
			</div>
		  </div>
		  <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
        <div class="card">
            <div class="card-body">
              <h5>Edit Videos</h5>
            </div>
          </div>
		  	<div class="container">
			  	<form class="form-horizontal" id="add-video-form" action="/addvideo/{{$data['package']->id}}" method="POST">{{ csrf_field() }}
                    <div class="form-group row">
                      <label class="col-sm-2">Video Link</label>
                      <div class="col-sm-4">
                        <input id="video-link" type="text" name="video_link" placeholder="Vimeo or Youtube Link of the Video" class="form-control form-control-success" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2">Video Thumbnail</label>
                      <div class="col-sm-5">
                         <label class="custom-file">
						   	<input type="file" name="video_thumb" required>
						    <span class="custom-file-control"></span>
					 	</label>
                      </div>
                    </div>
                    <div class="form-group row">       
                      <div class="col-sm-4 offset-sm-2">
                        <input type="submit" value="Add Video" class="btn btn-primary" style="float:right;">
                      </div>
                    </div>
                  </form>
			  	<ul id="lightgallery" class="grid row">
				  @foreach($data['videos'] as $v)
				    <li class="grid-item" data-src="{{$v->video_link}}">
				        <a href="#">
				            <img class="img-responsive" src="/storage/video_thumbs/{{$v->video_thumbimg}}">
				            <div class="demo-gallery-poster">
				                <img src="http://sachinchoolur.github.io/lightGallery/static/img/play-button.png">
				            </div>
				        </a>
				    </li>
				  @endforeach
				</ul>
			</div>
		  </div>
		</div>
	</div>
</div>
@endsection
@section('utils')

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
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
	var pid = '{{$data['package']->id}}';
  var icount = '{{$data['includes']->count()}}';
  var scount = '{{$data['schedules']->count()}}';
</script>

<script type="text/javascript" src="/js/edp.js"></script>
 <script>
    $('textarea').ckeditor();
</script>





@endsection