@extends('wsadmin.crewlayout')
@section('content')
<section class="content-header">
    <h1>
      Step 2
      <small>prices per person</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/crew/manage"><i class="fa fa-dashboard"></i> Home</a></li>>
      <li class="active">Add Package</li>
    </ol>
  </section>
<section class="content">
<div class="row">
<div class="col-md-12">
<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Enter Prices per Person in this Package<small>(No commas)</small></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form role="form" method="post" action="/addpackage_prices">
        <!-- text input -->
        @for($i=1;$i<=$adv;$i++)
        <div class="form-group row">
		   	<div class="col-md-6">
		      <label>Price for {{$i}} per person</label>
		      <div class="input-group">
                <span class="input-group-addon">₱</span>
                <input type="text" name="price_for_{{$i}}" class="form-control" placeholder="2000">
                <input type="hidden" name="person_count" value="{{$i}}">
              </div>
			</div>
		</div>
		@endfor
		<button type="submit">Complete</button>
     </form>
 </div>
</div>
</div>
</div>
</section>
@endsection


@section('utils')
<script type="text/javascript">
	$( window ).unload(function() {
	  alert('sure?')
	});
</script>


@endsection