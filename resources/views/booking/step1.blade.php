@extends('layouts.layout')
@section('content')
@section('breadcrumbs')
{{ Breadcrumbs::render('book',$pagedata['package']) }}
@endsection
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="alert ccerror">
				<div class="ce text-center"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> </div> 
				<div class="err2">Error</div>
			</div>
			<div class="detail-wrap">
				<h5 class="pd-h">Adventurers:</h5>
				<span>How many people are coming with you in this adventure?</span><br><br>
				<form method="post" action="/book/{{$pagedata['package']->id}}" id="form-adv-book">
					{{csrf_field()}}
					<div class="form-group">
					  <label class="control-label pd-h" for="selectbasic">Number of Adventurers:</label>
					    <select id="adultguest" name="adultguest" class="form-control col-md-4 cvcv">
					      @for($i=1;$i<=$pagedata['package']->adventurer_limit;$i++)
					      <option value="{{$i}}">{{$i}}</option>
					      @endfor
					    </select>
		
					</div>
					<br>
					<h5 class="pd-h">Payment:</h5>
					<div class="form-group">
						<img src="http://i76.imgup.net/accepted_c22e0.png">
					</div>
					<div class="form-group">
						<label class="control-label pd-h" for="cn">Card Information</label>
						   <input type="text" name="cardnumber" required="" style="width: 90%;" placeholder="Card Number..." class="form-control cvcv" id="cn">
					</div>
					<div class="form-group row">
						<div class="col-md-4" style="margin-right:1px;padding-right: 0">	
							<input type="text" name="exp" placeholder="Expiry" class="form-control cvcv" id="exp">
						</div>
						<div class="col-md-4" style="margin-left:0;padding-left:0">
							<input type="text" name="cvv" placeholder="CVV" class="form-control cvcv" id="cvv">
						</div>
					</div>
					<div class="form-group">
					  <label class="control-label pd-h" for="selectbasic">Request</label>
					    <textarea rows="5" class="form-control cvr" name="request" placeholder="I want chocolates"> </textarea>
					</div>
			  	<input type="hidden" name="schedule" value="{{$pagedata['schedule']->id}}">
			  	<input type="hidden" name="total_payment" value="{{$pagedata['prices'][0]}}">
			  	<input type="hidden" name="guest" value="1">
			  	
			</div>
			<div class="detail-wrap ch423">
				<div class="payment_option">
					<span class="pd-h p">Payment Method</span>
					<div class="card-body v34">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
					
				</div>
			</div>
			<div class="detail-wrap ch423">
				<div class="payment_option">
					<span class="pd-h p">Cancellation Policy</span>
					<div class="card-body v34">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
					
				</div>
			</div>
			<input type="submit" name="book" value="Book this Adventure" class="btn bg-sb text-white" style="margin-top: 50px;float: right;margin-right: 40px;"> 
			</form>
	</div>
		<div class="col" style="background-color: #f1f2ef; height: 240px; margin-top: 10px;">
			<div class="detail-wrap">
              	<h3 class="sb-name">{{$pagedata['package']->pname}}</h3>
             	<h5 class="loc-header">Talamban </h5> 
              	<br>
              	<h5 class="sd">Date: {{date('M d, Y, D', strtotime($pagedata['schedule']->date))}}</h5>
              	<div class="row">
	              	<div class="col" >
	              		<div class="row">
	              			<div class="col-md-6">
			              		<span class="adventurers">Adventurer:</span>
			              	</div>
			              	<div class="col-md-6">
			              		<span class="numag">x1 <i class="fa fa-users"></i></span>
			              	</div>
	              		</div>
	              		
	              	</div>
	              	<div class="col">
	              	</div>        
				</div>
			</div>
			<div class="total">
				<h5 class="tp"> Total Payment:</h5>    
              	<h5 class="p-price"> ₱ {{number_format($pagedata['prices'][0])}}<span class="sb-currency">PHP</span></h5> 
          	</div>
		</div>
	</div>
</div>
@endsection

@section('utils')
<script type="text/javascript">

	var price = parseFloat({{$pagedata['package']->price}});
	var adventurercount = 1;
	var pid = '{{$pagedata['package']->id}}';
	var total = $('input[name="total_payment"]').val();
	var c = '<span class="loadp text-center"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></span>';

	$(document).on('change','#adultguest',function(){
		adventurercount = parseInt($(this).val());
		$('.total .p-price').html(c)

		$.ajaxSetup({
	      headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	      }
	    });

		$.ajax({
		  url: "/paymentg/"+pid,
		  type: 'POST',
		  cache: false,
		  data: {num_guest: adventurercount},
		  success: function(html){
		   $('input[name="total_payment"]').val(html.total);
			total = html.total;
			$('.total .p-price').html('₱'+total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'<span class="sb-currency">PHP</span>');
			$('.numag').html('x'+adventurercount+' <i class="fa fa-users"></i>');
			$('input[name="guest"]').val(parseInt(adventurercount));
		  }
		});
	});


</script>
<script type="text/javascript" src="{{ asset('js/jquery.form.min.js') }}"></script>
<script type="text/javascript">
	$('input#cn').focus(function() {
    $(this).attr('placeholder', '0000000000000000')
	}).blur(function() {
	    $(this).attr('placeholder', 'Card Number...')
	})

	$('input#exp').focus(function() {
    $(this).attr('placeholder', 'MM / YY')
	}).blur(function() {
	    $(this).attr('placeholder', 'Expiry')
	})

	$('input#cvv').focus(function() {
    $(this).attr('placeholder', '3 digits')
	}).blur(function() {
	    $(this).attr('placeholder', 'CVV')
	})
	</script>


	<script type="text/javascript">
		$('#cvv').keydown(function (e) {
			var charCode = (e.which) ? e.which : e.keyCode
	        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	            e.preventDefault();
	        }
	        if($(this).val().length == 4 && e.keyCode !== 8) {
	        	e.preventDefault();
	        }
    });

		$("#exp").on('keydown', function(e){
			if($(this).val().length == 2){
				if(e.keyCode !== 8) {
					e.preventDefault();
			    	$(this).val($(this).val() + "/");
				}
			}

			if($(this).val().length == 5 && e.keyCode !== 8) {
					e.preventDefault();		
			} 

			
					    
		});

		$('form#form-adv-book').ajaxForm({
			dataType: 'json',
			success: function(data) {
				if(data.success == false) {
					$('.ccerror').show();
					$('.err2').html(data.error)
					$('html,body').animate({scrollTop:0},500);
				}
			}
		});
	</script>
@endsection
