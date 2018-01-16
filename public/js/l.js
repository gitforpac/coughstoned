


$('form#login-modal-form').submit(function(e){
	e.preventDefault();
	
	$.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
    	type: 'POST',
    	url: '/login',
    	data: {email: $('#email').val(),password:$('#password').val()},
    	success: function(res) {
    		if(res.authenticated == true) {
    			window.location = "/adventures";
    		}
    	},
    	error: function(xhr, textStatus, errorThrown) {
    		$('#email').css('border','1px solid rgb(165, 0, 16)');
    		$('.error-box').html('<p class="was-error"><i class="fa fa-exclamation-triangle"></i>&nbsp;Invalid Credentials!</p>');
    	},
    	dataType: 'json'
    });

});




  var AR = new AjaxRegister({
    form:'registerform',
    error:"errorm",
    input:[
        ['firstname' ,'required'] ,
        ['email' ,'required'] ,
        ['lastname','required' ],
        ['birthdate_month','required' ],
        ['birthdate_day','required' ],
        ['birthdate_year','required' ],
        ['password','required' ],
        ['_token','required' ]
    ],
    doneUrl:"/dashboard"
});
/*AR.doneRegister = function(){
}
AR.errorRegister = function(){
}*/

AR.errorRegister = function(error){
  var rform = $('#register-form').html();
  console.log(rform)
  if(error.birthdate_year) {      
      $.confirm({
        title: 'Sorry,',
        content: '<div class="text-center"><i class="fa fa-frown-o" aria-hidden="true"></i><br>To sign up, you must be 18 or older.</div>',
        buttons: {
            Confirm: {
                text: 'Ok',
                action: function(){
                    $('#register-form').modal('hide')
                }
            },
        }
    });
      return false;
    }
    if(error.password) {
      $('#registerform input[name="password"]').css('border','1px solid rgb(165, 0, 16)');
      $('.password-error').html('<i class="fa fa-times" style="color:rgb(165, 0, 16)"></i> '+error.password+'<br>');
    } else {
       $('#registerform input[name="password"]').css('border','1px solid rgba(36, 150, 10,0.8)');
       $('.password-error').html('');
    }

    if(error.email) {
      $('#registerform input[name="email"]').css('border','1px solid rgb(165, 0, 16)');
      $('.email-error').html('<i class="fa fa-times" style="color:rgb(165, 0, 16)"></i> '+error.email+'<br>');
    } else {
       $('#registerform input[name="email"]').css('border','1px solid rgba(36, 150, 10,0.8)');
       $('.email-error').html('');
    }

    

  }
