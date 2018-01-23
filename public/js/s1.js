




$(document).on('change','#adultguest',function(){
adventurercount = parseInt($(this).val());
$('.total .p-price').html(c);

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$.ajax({
url: "/paymentg/"+pid,
type: 'POST',
cache: false,
data: {client_count: adventurercount},
success: function(html){
$('input[name="total_payment"]').val(html.total);
var total = html.total;
$('.total .p-price').html('₱'+total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'<span class="sb-currency">PHP</span>');
$('.numag').html(html.per+'PHP x '+adventurercount+'person(s) <i class="fa fa-users"></i>');
$('input[name="guest"]').val(parseInt(adventurercount));
}
});
});



$('input#cn').focus(function() {
$(this).attr('placeholder', '0000000000000000');
}).blur(function() {
    $(this).attr('placeholder', 'Card Number...');
});

$('input#exp').focus(function() {
$(this).attr('placeholder', 'MM / YY');
}).blur(function() {
    $(this).attr('placeholder', 'Expiry');
});

$('input#cvv').focus(function() {
$(this).attr('placeholder', '3 digits');
}).blur(function() {
    $(this).attr('placeholder', 'CVV');
});



$('#cvv').keydown(function (e) {
var charCode = (e.which) ? e.which : e.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    e.preventDefault();
}
if($(this).val().length == 4 && e.keyCode !== 8) {
	e.preventDefault();
}
});

$("#exp").on('keyup', function(e){
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
beforeSubmit: function(){
	if($('#select_payment_method').val() == 'Deposit') {
		$('.selected-option').empty();
	}
},
success: function(data) {
	if(data.success == false) {
		$('.ccerror').show();
		$('.err2').html(data.error);
		$('html,body').animate({scrollTop:0},500);
	} else if (data.success == true) {
		window.location.href = "/myadventures";
	} else {
		$.alert('There was an internal problem');
	}
}
});




$(document).on('change','#select_payment_method',function() {

	var cc='<div class="form-group"><label class="control-label pd-h" for="cn">Card Information</label><img src="http://i76.imgup.net/accepted_c22e0.png" style="float: right;"><input type="text" name="cardnumber" required="" placeholder="Card Number..." class="form-control cvcv" id="cn"></div><div class="form-group row"><div class="col-md-4" style="margin-right:1px;padding-right: 0">	<input type="text" name="exp" placeholder="Expiry" class="form-control cvcv" id="exp"></div><div class="col-md-4" style="margin-left:0;padding-left:0"><input type="text" name="cvv" placeholder="CVV" class="form-control cvcv" id="cvv"></div></div>';

	if($(this).val() == 'Deposit') {
		$('.selected-option').slideToggle().html('');
	} else if($(this).val() == 'Credit Card') {
		$('.selected-option').html(cc).slideToggle();
	} else {
		alert('sad')
	}
})


