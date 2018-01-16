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