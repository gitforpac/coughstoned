@extends('Adventurer.layout')
@section('content')
<div class="container" id="result">
</div>
<script type="text/javascript">
	
	axios.get('/posts').then(function (response) {
    var data = response.data;
    data.map((d) => {
    	$('#result').append('<button class="btn btn-danger">' + d.title + '</button>');
    });
  });

</script>
@endsection