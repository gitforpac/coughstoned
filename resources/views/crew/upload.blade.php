@extends('layouts.adminlayout')
@section('content')

<div class="page home-page">
  @include('inc.admin.nav')
    <br>
    <form action="" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

  Send these files:<br />
  <div class="col-md-4 bg-info" style="height: 80px;">
  <input name="images[]" type="file" multiple class="form-control" id="adv_images" />
</div>
  <input type="submit" id="upload" value="Send files" />
</form>
<div class="image_preview">
</div>
  </div>


@endsection
@section('utils')
<script type="text/javascript">
	$('body').on('click', '#upload', function(e){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    e.preventDefault();
   var formData = new FormData($(this).parents('form')[0]);
    var _token = '{{ csrf_token() }}';
    for (var value of formData.values()) {
   console.log(value); 
}
   console.log(formData)
        $.ajax({
            url: '/up/'+1,
            type: 'POST',
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                return myXhr;
            },
            success: function (data) {
                console.log(data);
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
});
</script>

<script type="text/javascript">
  $('#adv_images').change(function(){
    
    preview_image();
  });

  function preview_image() 
  {
   var total_file=document.getElementById('adv_images').files.length;
   for(var i=0;i<total_file;i++)
   {
    $('.loading').show();
    $('.image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'  class='img-fluid'>");
   }
   $('.loading').hide();
  }
</script>
@endsection