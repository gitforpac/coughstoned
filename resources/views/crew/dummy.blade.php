
@extends('layouts.adminlayout')
@section('content')
<div class="page home-page">
<div class="loading" style="display: none;">
  <img src="{{ asset('img/loader.svg') }}">
</div>
<div class="result" style="margin-left: 20px;">
@foreach($pagedata['bookings'] as $bk)
{{ $bk->id }}
@endforeach
</div>
{{$pagedata['bookings']->links()}}
</div>

@endsection

@section('utils')
<script type="text/javascript">
	$(document).ready(function() {
        $(document).on('click', 'ul.pagination a', function (e) {
        	$('.result').hide();
     		if($('.ul.pagination').is(':hidden')); {
     			$('ul.pagination').show();
     		}
        	$('.loading').show();
            getPosts($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });
    function getPosts(page) {
        $.ajax({
            url : '?page=' + page,
            dataType: 'json',
        }).done(function (data) {
        	console.log(data.data)
        		$('.loading').hide();
        		$('ul.pagination').hide();
        		$('.result').show();
        		$('.result').html(data);          
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }
</script>

@endsection