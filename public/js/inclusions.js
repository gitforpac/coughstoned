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