@extends('layouts.layout')
@section('breadcrumbs')
{{ Breadcrumbs::render('adventure',$pagedata['package']) }}
@endsection
@section('content')
<div class="jumbotron text-center" id="cover-photo" style="background-image: url('/storage/cover_images/{{$pagedata['package']->thumb_img}}');background-size: cover; background-repeat: no-repeat;background-position: center;height: 550px;">
  <h2 class="display-3" style="padding-top: 190px;margin-top: 20px;">{{$pagedata['package']->name}}</h2>
</div>

<div class="container pkg">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Overview</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="false">Photos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#videos" role="tab" aria-controls="videos" aria-selected="false">Videos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="itinerary-tab" data-toggle="tab" href="#itinerary" role="tab" aria-controls="itinerary" aria-selected="false">Itinerary</a>
  </li>
</ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="detail-wrap">
              <h5 class="pd-h">Introduction</h5>
              <span>{!!$pagedata['package']->description!!}</span>
            </div>
            <div class="detail-wrap">
              <h5 class="pd-h">what's Included?</h5>
              <ul>
              @foreach($pagedata['includes'] as $p)
              <li><i class="fa fa-check" style="color: #b4e582;"></i> {{$p->included_item}}</li>
              @endforeach
            </ul>
            </div>
            <div class="detail-wrap">
              <h5 class="pd-h">Pricing Table</h5>  
                <table class="table table-bordered tb" style="width: 80%"> 
                  <thead class="text-center">
                    <tr>
                      <th scope="col">Group of Person(s)</th>
                      <th scope="col">Price per Person</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pagedata['prices'] as $p)
                    <tr class="text-center">
                      <td >{{$p->person_count}}</td>
                      <td >₱ {{number_format($p->price_per)}} / person</td>
                    </tr>
                    @endforeach
                    <tr class="text-center">
                      <td><strong>{{$pagedata['package']->adventurer_limit+1}} and above</strong></td>
                      <td>Contact us</td>
                    </tr>
                  </tbody>
                </table>
              
            </div>
            <div class="detail-wrap">
              <h5 class="pd-h">Available Dates</h5>
                <table class="table" id="avd">
                  <thead class="thead-default">
                     @if(sizeof($pagedata['schedules']) > 0)
                    <tr>
                      <th>Schedule</th>
                      <th>Starting Price</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pagedata['schedules'] as $s)
                    <tr>
                      <td scope="row">
                        {{ date('M d, Y, D', strtotime($s->date)) }}
                      </td>
                      <td>₱ {{number_format($pagedata['prices']->last()->price_per)}}</td>
                      <td>
                        <a href="/book/review/{{$pagedata['package']->id}}?scheduleid={{$s->id}}" class="book-btn">Book</button>
                      </td>
                    </tr>
                    @endforeach
                    @else
                      No Available Dates for now. Check again later
                    @endif
                  </tbody>
                </table>
            </div>
            @foreach($pagedata['content'] as $cc)
            <div class="detail-wrap">
              <h5 class="pd-h">{{$cc->title}}</h5>
              <span>{!!$cc->content!!}</span>
            </div>
            @endforeach
            <div class="detail-wrap">
              <div class="reviews" id="comment-container">
                <h5 class="pd-h">Reviews</h5>
                @if($pagedata['comments']->isEmpty())
                <span>No Review(s)</span>
                @else
                @foreach($pagedata['comments'] as $c)
                <div class="comment-wrapper">
                <div class="commentor">
                  <img src="{{asset('img/da.jpg')}}">
                  <div class="review-s1">
                    <h3 style="">{{$c->user_fullname}}</h3>
                  </div>
                </div>
                  <div class="comment">
                      {{$c->comment}}
                  </div>
                </div>
                @endforeach
                @endif               
                <div class="comment-wrapper" id="comment-box">
                  <div class="comment" style="text-align: right;">
                      <textarea name="comment" class="form-control" placeholder="Write your review..."></textarea>
                      <button class="btn review-btn" style="margin-top: 10px;" id="commentbtn">Post Review</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col" style="background-color: #f1f2ef; height: 225px; margin-top: 10px;">
            <div class="detail-wrap">
              <h3 class="sb-name">{{$pagedata['package']->name}}</h3>
              <h5 class="loc-header">{{$pagedata['package']->location}} </h5>   
              <h5 class="p-price"> ₱{{number_format($pagedata['prices']->last()->price_per)}}<span class="sb-currency">PHP</span></h5>
              <span class="sb-pp">per person</span>
              <a href="#avd" class="sb-checkdates"><i class="fa fa-calendar-check-o"></i> &nbsp;Check Available Dates</a>
              <span class="sb-c text-center">You may want to view our <a href="#">Cancellation Policy </a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="profile-tab">
      @if($pagedata['videos']->isEmpty())
          <div class="card">
            <div class="card-body">
              No Photo(s)
            </div>
          </div>
      @else
      <div class="imagegal">
        <ul class="grid row lightgallery">
          @foreach($pagedata['images'] as $i)
            <li class="grid-item" data-src="/storage/images/{{$i->imagename}}">
                <a href="#">
                    <img class="img-responsive" src="/storage/images/{{$i->imagename}}">
                </a>
            </li>
          @endforeach
        </ul>
      </div>
      @endif
    </div>
    <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="contact-tab">
      @if($pagedata['videos']->isEmpty())
      <div class="card">
        <div class="card-body">
          No Video(s)
        </div>
      </div>
      @else
      <div class="imagegal">
        <ul class="grid row lightgallery">
          @foreach($pagedata['videos'] as $v)
            <li class="grid-item" data-src="{{$v->video_link}}">
                <a href="#">
                    <img class="img-responsive" src="/storage/video_thumbs/{{$v->video_thumbimg}}">
                </a>
                <div class="demo-gallery-poster">
                    <img src="http://sachinchoolur.github.io/lightGallery/static/img/play-button.png">
                </div>
            </li>
          @endforeach
          @endif      
        </ul>
      </div>
    </div>
    <div class="tab-pane fade" id="itinerary" role="tabpanel" aria-labelledby="itinerary-tab">
      {{$pagedata['package']->itinerary}}
    </div>
  </div>
</div>
@endsection

@section('utils')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.6/js/lightgallery.min.js"></script> 
<script type="text/javascript" src="/js/lg-video.min.js"></script>
<script type="text/javascript" src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript">
@if(Auth::guard('user')->check())
var name = '{{Auth::guard('user')->user()->user_fullname}}';
c.writeComment({{$pagedata['package']->id}},{{Auth::guard('user')->id()}},name);
@endif
</script>
<script type="text/javascript" src="/js/package.js"></script>
@endsection