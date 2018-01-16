  
// add content or information about package
  var content = $('.add-content-wrapper').html();
  $('#add_contentbtn').click(function(e){
    e.preventDefault();
      $('.add-content-wrapper').append(content);
      var y = $(window).scrollTop();  //your current y position on the page
      $("html, body").animate({ scrollTop: y + ($(window).height()-150) }, 800);
      console.log($(window).height())

  });

// add/remove package inclusions
  $('#add_includedbtn').click(function(e){
     e.preventDefault();
    var included = $('#included').val();
    if(included) {
      var html = ' <li class="item"><i class="fa fa-check-square-o" aria-hidden="true">&nbsp;&nbsp;';
      html += included;
      html += '<a href="javascript:void(0)" id="remove_includedbtn" class="btn btn-default" title="Remove from included"><i class="fa fa-trash"></i></a></li>';
      $('li.item:last').before(html);
      $('#included').val('');
      $('form#add-package-form').append('<input type="hidden" name="included-item[]" value="'+included+'">')
    } else {
      alert('Please Enter Something')
    }

  })
  //remove inclusion
  $('ul.package-included').on('click','#remove_includedbtn',function(e) {
     e.preventDefault();
      var ab = $(this).parent().text().replace(/\s/g, '');
      console.log(ab)
      $("input[name='included-item[]']").each(function() {
          if($(this).val() == ab) {
            $(this).remove();
          }
      });

      $(this).parent().remove();
  });


// add/delete available date
   $('#add_avdbtn').click(function(e){
     e.preventDefault();
    var dateavd = $('#date-avd').val();

    if(dateavd) {
      var mydate = new Date(dateavd);
      var month = ["January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December"][mydate.getMonth()];
      var cd = month + ' '+ mydate.getDate()+ ', ' + mydate.getFullYear();

      var sqlformat = mydate.getFullYear()+'-'+ (mydate.getMonth()+1) +'-'+mydate.getDate();

      var html = ' <li class="item-date"><i class="fa fa-calendar"></i>&nbsp;&nbsp;';
      html += cd;
      html += '<a href="javascript:void(0)" id="remove_avdbtn" class="btn btn-default" title="Remove"><i class="fa fa-trash"></i></a><div class="hidden-div">'+sqlformat+'</div></li>';

      $('li.item-date:last').before(html);
      $('form#add-package-form').append('<input type="hidden" name="dates[]" value="'+sqlformat +'">')
      $('#date-avd').val('');
    } else {
      alert('Please Enter Something')
    }

  })

  // remove date
  $('ul.package-dates').on('click','#remove_avdbtn',function(e) {
     e.preventDefault();
      var a = $(this).siblings('.hidden-div').text();
      
      $("input[name='dates[]']").each(function() {
          if($(this).val() == a) {
            $(this).remove();
          }
      });
        
      $(this).parent().remove();
  });





// step wizard, form validation, and parse data
    (function() {
    $('#exampleBasic').wizard({
      enableWhenVisited: true,
      validator: function() {
        var validate = checkInputs();
        if (validate == false) {
          $("html, body").animate({ scrollTop: 30 }, "slow");
        }
        console.log(validate)
        return validate;
      },
      onFinish: function() {
        done();
      }
    });
    $( function() {
      $( "#date-avd" ).datepicker({
        minDate:0
      });
    });
  })();

function checkInputs()
{

  if($('#adv_name').val() && $('#adv_location').val() && $('#adv_price').val() && $('#adv_dsc').val()) {
    if( isNaN($('#adv_price').val())){
          $('#adv_price').attr('class', 'form-control is-invalid');
          $('#price-error').html('Price Should be a Number');
          return false;
          } else {
            return true;
          }
  } else {

    if (!$('#adv_name').val()) {
       $('#adv_name').attr('class', 'form-control is-invalid');
    } else {
       $('#adv_name').attr('class', 'form-control');
    }
    if (!$('#adv_location').val()) {
       $('#adv_location').attr('class', 'form-control is-invalid');
    } else {
       $('#adv_location').attr('class', 'form-control');
    }
    if (!$('#adv_price').val()) {
       $('#adv_price').attr('class', 'form-control is-invalid');
    } else {
        if( isNaN($('#adv_price').val())){
          $('#adv_price').attr('class', 'form-control is-invalid');
          $('#price-error').html('Price Should be a Number');
          } else {
          $('#price-error').html('');
          $('#adv_price').attr('class', 'form-control');
        }
    }
    if (!$('#adv_dsc').val()) {
       $('#adv_dsc').attr('class', 'form-control is-invalid');
    } else {
       $('#adv_dsc').attr('class', 'form-control');
    }
    return false;
  }

}

 function done(){
    var date = [];
    var includeds = [];

    $("input[name='dates[]']").each(function() {
        date.push($(this).val());
    });
    
    $("input[name='included-item[]']").each(function() {
        includeds.push($(this).val());
    });

    console.log(includeds)
    
    var information = {
      "contents": []
    };

    var schedules = {
      "schedules" : date
    };

    var includes = {
      "includes" : includeds
    };

    var packagedetails = {
      "details": []
    };


    packagedetails['details'].push({"name":$('#adv_name').val(), "location":$('#adv_location').val(), "price":$('#adv_price').val(), "dsc":$('#adv_dsc').val(), "difficulty": $("input[name='adv_difficulty']:checked").val()})

    $("input[name='info-title[]']").each(function(i=0) {
        var ct = $("textarea[name='info-content[]']").eq(i).val();
        if($(this).val() && ct) {
        i++;
        information['contents'].push({"title":$(this).val(), "content":ct})
    }
    });
    var file_data = $("#adv_image").prop("files")[0];  
    var fd = new FormData();

    fd.append("cover_img", file_data);
    fd.append("packagedetails",JSON.stringify(packagedetails));
    fd.append("includeds",JSON.stringify(includes));
    fd.append("schedules",JSON.stringify(schedules));
    fd.append("contents",JSON.stringify(information));

    
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: "POST",
      url: '/addpackage',
      contentType: false,
      processData: false,
      data: fd,
      success: function(response) {
        console.log(response);
      },
      dataType: "json",
    });
}

