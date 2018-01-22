




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
