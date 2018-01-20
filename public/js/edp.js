
// page utils 

$('[href="#videos"]').on('shown.bs.tab', function (e) {
  $('.grid').masonry({
	  // options
	  itemSelector: '.grid-item',
	  columnWidth: 0
	});
})
$(document).ready(function(){
    $('#lightgallery').lightGallery({
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
    });
});
// --page utils

// add inclusion
$('#add_includedbtn').click(function(e){
	Pace.restart();
	icount = parseInt(icount) + 1;
 e.preventDefault();
 	$('#add_includedbtn').prop('disabled',true);
	var included = $('#included').val();
if(included) {
	$.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: "POST",
      url: '/additem/'+pid,
      data: {item : included},
      success: function(response) {
      	if(response.success == true) {

      		var html = '<tr class="animated fadeIn"><th scope="row"><span class="num">'+icount+'</span></th>';
      		html += '<td>'+included+'</td>';
      		html += '<td><a href="javascript:void(0)" data-id="'+response.item_id+'" id="remove_includedbtn" class="btn btn-default" title="Remove from included"><i class="fa fa-trash"></i></a></td></tr>'
	      	$('#included').val('');
	      	$('table.includeds tr:last	').after(html)
	      	$('#add_includedbtn').prop('disabled',false);
	      	$.notify(" Updated Successfully", "success");
	      } else {
	      	$.notify(" Something Went Wrong", "error");
	      }
        	
      },
      dataType: "json",
    });
} else {
  $.alert('Please enter an Item');
}
})
// --add inclusion

// remove inclusion
$('table.includeds').on('click','#remove_includedbtn',function(e) {
e.preventDefault();
var $row = $(this).closest('tr'),$table = $row.closest('table');
var item = $(this).data('id');
var is = $(this).parent().parent();
$.confirm({
    title: 'Delete Item',
    content: 'Are you sure you want to delete this Item?',
    buttons: {
        confirm: {
            btnClass: 'btn-green',
            action: function () {
            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
              type: "POST",
              url: '/deleteitem/'+item,
              data: {_token : _token },
              success: function(response) {
			        
              		if(response.success == true) {
		                	$.notify(" Updated Successfully", "success");
		                	$row.remove();
					        $table.find('tr').each(function(i,v) {
					            var sss = $(v).find('span.num').text();
					            if(sss !== 1) {
					            	 $(v).find('span.num').text(i);
					            }
					        });
		                } else {
		                	$.alert({
		                		title: 'Encountered an error!',
							    content: 'There was an error deleting',
							    type: 'red',
							    typeAnimated: true,
		                	})
		                }
              },
              dataType: "json",
            }); 
        }
        },
        cancel:  {
           btnClass: 'btn-red'
        },     
    }
});
});
// -- remove inclusion

// add date
$('#add_avdbtn').click(function(e){
Pace.restart();
scount = parseInt(scount) + 1;
e.preventDefault();
var dateavd = $('#date-avd').val();
var mydate = new Date(dateavd);
	var month = ["Jan", "Feb", "Mar", "Apr", "May", "June",
	"July", "Aug", "Sept", "Oct", "Novr", "Dec"][mydate.getMonth()];
	var cd = month + ' '+ mydate.getDate()+ ', ' + mydate.getFullYear();

	var sqlformat = mydate.getFullYear()+'-'+ (mydate.getMonth()+1) +'-'+mydate.getDate();
if(dateavd) {
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: "POST",
      url: '/addschedule/'+pid,
      data: {schedule : sqlformat},
      success: function(response) {	  
      if(response.success == true) {      	
	     	var html = '<tr class="animated fadeIn"><th scope="row"><span class="num2">'+scount+'</span></th>';
      		html += '<td>'+cd+'</td>';
      		html += '<td><a href="javascript:void(0)" data-id="'+response.item_id+'" id="remove_avdbtn" class="btn btn-default" title="Remove Schedule"><i class="fa fa-trash"></i></a></td></tr>'
	      	$('table.scheds tr:last').after(html);
	      	$('#date-avd').val('');
	      	$('#add_avdbtn').prop('disabled',false);
	      	$.notify(" Updated Successfully", "success");
	      } else {
	      	$.notify(" Something Went Wrong", "error");
	      }
      },
      dataType: "json",
    });
} else {
  $.alert('Please enter Date');
}

})
// --add date

// remove date
$('table.scheds').on('click','#remove_avdbtn',function(e) {
var $row = $(this).closest('tr'),$table = $row.closest('table');	
var sid = $(this).data('id');
e.preventDefault();
	$.confirm({
    title: 'Delete Date',
    content: 'Are you sure you want to delete this Date?',
    buttons: {
        confirm: {
            btnClass: 'btn-green',
            action: function () {
            var _token = $('meta[name="csrf-token"]').attr('content');
		    $.ajax({
		        type: "POST",
		        url: '/deleteschedule/'+sid,
		        data: {_token : _token},
		        success: function(response) {
		                if(response.success == true) {
		                	$row.remove();
					        $table.find('tr').each(function(i,v) {
					            $(v).find('span.num2').text(i);
					        });
		                	$.notify(" Updated Successfully", "success");
		                } else {
		                	$.alert({
		                		title: 'Encountered an error!',
							    content: 'There was an error deleting',
							    type: 'red',
							    typeAnimated: true,
		                	})
		                }
		        },
		        dataType: "json",
		    });
        }
        },
        cancel:  {
           btnClass: 'btn-red'
        },     
    }
});  
});
// --remove date

// delete photo
$(document).on('click','#deletephotobtn',function(e) {
e.preventDefault();
var vid = $(this).prev().data('id');
var sl = $(this).parent();
$.confirm({
    title: 'Delete Photo',
    content: 'Are you sure you want to delete this Photo?',
    buttons: {
        confirm: {
            btnClass: 'btn-green',
            action: function () {
            var _token = $('meta[name="csrf-token"]').attr('content');
		    $.ajax({
		        type: "POST",
		        url: '/deletephoto/'+vid,
		        data: {_token : _token},
		        success: function(response) {
		                if(response.success == true) {
		                	$.notify(" Updated Successfully", "success");
		                	sl.remove();
		                } else {
		                	$.alert({
		                		title: 'Encountered an error!',
							    content: 'There was an error deleting',
							    type: 'red',
							    typeAnimated: true,
		                	})
		                }
		        },
		        dataType: "json",
		    });
        }
        },
        cancel:  {
           btnClass: 'btn-red'
        },     
    }
}); 
});
// --delete photo

//upload photos
$(function() { 
	var bar = $('.bar');
	var percent = $('.percent');
	   
	$('#upload-photo').ajaxForm({
		dataType: 'json',
	    beforeSend: function() {
	    	Pace.restart();
	        var percentVal = '0%';
	        bar.width(percentVal)
	        percent.html(percentVal);
	    },
	    uploadProgress: function(event, position, total, percentComplete) {
	        var percentVal = percentComplete + '%';
	        bar.width(percentVal)
	        percent.html(percentVal);
	    },
	    success: function(data) {
	        var percentVal = '100%';
	        bar.width(percentVal)
	        percent.html(percentVal);
	        $('#photosga').find('div#upds').html(data)
	        console.log(data)
	    },
	}); 

}); 
// --upload photos

// add video
$('#add-video-form').ajaxForm({
		dataType: 'json',
	    beforeSubmit: function() {
			Pace.restart();
	    	var link = $('input[name="video_link"]').val()
	        var validLink = ValidURL(link);
	        if(validLink == true){
	        	return true;
	        } else {
	        	$.alert({
            		title: 'Invalid Link Format',
            		content: 'Pleas enter a valid video link',
				    type: 'red',
				    typeAnimated: true,
            	})
            	return false;
	        }
	    },
	    success: function(data) {	
	    	$('#videosga').find('div#vupds').html(data)
	    }
	});

function ValidURL(str) {
	var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
	  '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name and extension
	  '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
	  '(\\:\\d+)?'+ // port
	  '(\\/[-a-z\\d%@_.~+&:]*)*'+ // path
	  '(\\?[;&a-z\\d%@_.,~+&:=-]*)?'+ // query string
	  '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
  if(!pattern.test(str)) {
    return false;
  } else {
    return true;
  }
}
// --add video

// delete video 

$(document).on('click','#deletevideobtn',function(e) {
$('.lightgallery').data('lightGallery').destroy(false);
e.preventDefault();
var vid = $(this).data('id');
var sl = $(this).parent();
$.confirm({
    title: 'Delete Photo',
    content: 'Are you sure you want to delete this Photo?',
    buttons: {
        confirm: {
            btnClass: 'btn-green',
            action: function () {
            var _token = $('meta[name="csrf-token"]').attr('content');
		    $.ajax({
		        type: "POST",
		        url: '/deletevideo/'+vid,
		        data: {_token : _token},
		        success: function(response) {
		                if(response.success == true) {
		                	$.notify(" Updated Successfully", "success");
		                	sl.remove();
		                } else {
		                	$.alert({
		                		title: 'Encountered an error!',
							    content: 'There was an error deleting',
							    type: 'red',
							    typeAnimated: true,
		                	})
		                }
		        },
		        dataType: "json",
		    });
        }
        },
        cancel:  {
           btnClass: 'btn-red'
        },     
    }
}); 
})





// change package details 

$('#basic-details').submit(function(e) { 
	e.preventDefault();
	$("#basic-details").ajaxSubmit({
		dataType:  'json', 
		beforeSubmit: function() {
			Pace.restart();
		},
		success: function(data) {
			if(data.success == true) {
				$.notify(" Updated Successfully", "success");
			} else {
				$.notify(" Something Went Wrong Updating", "error");
			}
		}
	});
});


$('#edit-itinerary-form').ajaxForm({
	success: function(data) {
	    	if(data.success == true) {
	    		$.notify(" Updated Successfully", "success");
	    	} else {
	    		$.notify(" There was an error updating", "error");
	    	}
	}
});


$('#info-form').ajaxForm({
	beforeSubmit: function() {
		Pace.restart();
	},
	success: function(data) {
			var title = $('input[name="info_title"]').val();
			var body =  $('textarea[name="info_body"]').val();
	    	if(data.success == true) {
	    		var html = '<tr>';
	      		html += '<td>'+title+'</td>';
	      		html += '<td>'+body+'</td>';
	      		html += '<td><a href="javascript:void(0)" data-id="'+data.item_id+'" id="deleteinfobtn" class="btn-sm btn-danger" title="Remove Information">Delete</a></td></tr>'   		
	    		$('table.info tr:last').after(html);
	    		$.notify(" Updated Successfully", "success");
	    		$('input[name="info_title"]').val('');
	    		$('textarea[name="info_body"]').val('');
	    	} else {
	    		$.notify(" There was an error updating", "error");
	    	}
	}
});


$(document).on('click','#deleteinfobtn',function(e){
	e.preventDefault();
	var $row = $(this).closest('tr'),$table = $row.closest('table');	
	var sid = $(this).data('id');
	e.preventDefault();
		$.confirm({
	    title: 'Delete Info',
	    content: 'Are you sure you want to delete this Information?',
	    buttons: {
	        confirm: {
	            btnClass: 'btn-green',
	            action: function () {
	            var _token = $('meta[name="csrf-token"]').attr('content');
			    $.ajax({
			        type: "POST",
			        url: '/deletecontent/'+sid,
			        data: {_token : _token},
			        success: function(response) {
			                if(response.success == true) {
			                	$row.remove();
						        $table.find('tr').each(function(i,v) {
						            $(v).find('span.num3').text(i);
						        });
			                	$.notify(" Updated Successfully", "success");
			                } else {
			                	$.alert({
			                		title: 'Encountered an error!',
								    content: 'There was an error deleting',
								    type: 'red',
								    typeAnimated: true,
			                	})
			                }
			        },
			        dataType: "json",
			    });
	        }
	        },
	        cancel:  {
	           btnClass: 'btn-red'
	        },     
	    }
}); 
})






