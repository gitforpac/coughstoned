	
class Client {

	getUserInfo(id) 
	{
		$('div#edit-profile-body').hide();
		$('div.form-loading').show();
		setTimeout(
			function() {
				axios.get('/adventurer/'+id).then(function(response){
					
					if(response.status===200) {
						$('div#edit-profile-body').show();
						$('div.form-loading').hide();
				    	var userdata = response.data;
				    	console.log(userdata)
						var name = userdata.user_fullname;
						var sname = name.split(' ');
						if (response.birthdate != null) {
							var birthdate = userdata.birthdate;
							$('#user_birthdate_month').val(bdate[0]);
							$('#user_birthdate_day').val(bdate[1]);
							$('#user_birthdate_year').val(bdate[2]);
						}		
						$('#user_email').val(userdata.email)
						$('#user_first_name').val(sname[0]);
						$('#user_last_name').val(sname[1]);
						$('#user_profile_address').val(userdata.address);
						$('#user_profile_info_about').val(userdata.userabout);
						$('#phone_number').val(userdata.phone);
					}			
				});
			}, 600
		);
	}

	editProfile(id) 
	{
		$('#user-profile-form').submit(function(event){

			$('#loading').show();
			$('#edit-submit').prop('disabled', true);
		    event.preventDefault();

		    var userdata = {
		          'name' : $('#user-profile-form').find('input[name="user[first_name]"]').val() + ' ' + $('#user-profile-form').find('input[name="user[last_name]"]').val(),

		          'gender' : $('#user_sex').find(':selected').text(),

		          'birthdate' : $('#user_birthdate_month').find(':selected').text() + ' ' + $('#user_birthdate_day').find(':selected').val() + ' ' + $('#user_birthdate_year').find(':selected').val(),

		          'email' : $('#user_email').val(),

		          'phone' : $('#phone_number').val(),

		          'address' : $('#user_profile_address').val(),

		          'describe' : $('#user_profile_info_about').val()

		          }

		    axios.put('/adventurer/'+id, userdata).then(function(response){
		    	if(response.status===200 && response.statusText === "OK") {
		    		$('.message-status').show();
		    		$('.message-status').html('<p class="success"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;Successful updating profile</p>')
		    		$('.message-status').fadeOut(6000);
		    		$('#edit-submit').prop('disabled', false);
		    		$('#loading').hide();
		    	}
		    }).catch(error => {
		    	$('.message-status').show();
		    	$('.message-status').html('<p class="error"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;There was an error updating profile</p>')
		    	$('.message-status p').fadeOut(6000);
		    	$('#edit-submit').prop('disabled', false);
		    	$('#loading').hide();
		    });
		});
	}

	changePassword(id) 
	{
		$('#user-changepassword').submit(function(event){
			event.preventDefault(event)
			var userdata = {
				'oldpassword' : $(this).find('#old_password').val(),
				'newpassword' : $(this).find('#new_password').val()
			}

			axios.post('/updatepassword/'+id,userdata).then(function(response){
				var res = response.data;
				
				// if success flash success message
				if (res.changepassword == true) {
					$('#user-changepassword').each(function() {
						this.reset()
					});
					var output = '<p class="success"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;Successful changing password</p>';
					$('.message-status').show();
					$('div.message-status').html(output);
					$('.message-status p').fadeOut(10000);
				} else {
					var output = '<p class="error"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;There was an error changing password | Make sure everything matches</p>';
					$('.message-status').show();
					$('div.message-status').html(output)
					$('.message-status p').fadeOut(10000);
				}

				//else flash error message
			});
		});
	}



	writeComment(pid,user,name)
	{
		$('#commentbtn').click(function(){	
			if($('textarea[name=comment]').val()) {
				$('#commentbtn').prop('disabled',true);
				var comment = {
					'comment' : $('textarea[name=comment]').val()
				}
				axios.post('/writecomment/'+pid+'/'+user,comment).then(function(response){				
					if(response.status===200 && response.statusText === "OK") {
			    		$('#commentbtn').prop('disabled', false);
			    		var t = new Template();
			    		var putcomment = t.putComment(comment['comment'],name);
			    		$('#comment-box').before(putcomment);
			    		$('textarea[name=comment]').val('')
			    	}
				});
			} else {
				return false;
			}
			
		})
	}


	changeAvatar()
	{
	

		$('#avatarform').ajaxForm({
			success: function() {
				alert('qweqwe');
			}
		});


}
