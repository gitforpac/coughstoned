@extends('layouts.adminlayout')
@section('content')
<div class="page home-page">
  @include('inc.admin.nav')
  <div class="breadcrumb-holder">   
    <div class="container-fluid">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Bookings</li>
      </ul>
    </div>
  </div>
  <section class="charts">
    <div class="container-fluid">
      <header style="margin-bottom: 0px;padding: 0px;margin-top: 20px;"> 
        <h1 class="h3">Bookings</h1>
      </header>
      <div class="fliter-bookings" style="text-align: right;">
        <div class="btn-group">
          <button type="button" class="btn btn-warning btn-filter" data-target="pagado">Pending</button>
          <button type="button" class="btn btn-danger btn-filter" data-target="pendiente">Cancelled</button>
          <button type="button" class="btn btn-success btn-filter" data-target="cancelado">Finished</button>
        </div>
      </div>
      </div>
      <div class="loading" style="display: none;">
          <img src="{{ asset('img/loader.svg') }}">
      </div>
      <div class="row" id="bookings">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Client</th>
                    <th>Package</th>
                    <th>Schedule</th>
                    <th>Payment</th>
                    <th>Number of Guest</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($pagedata['bookings'] as $bk)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$bk->client}}</td>
                    <td>{{$bk->package}}</td>
                    <td>{{$bk->schedule}}</td>
                    <td>{{$bk->payment}}</td>
                    <td>{{$bk->guest}}</td>
                    <td>{{$bk->status}}</td>
                    <td><button class="btn-sm btn-info ">action</button></td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>          
      </div>
      {{$pagedata['bookings']->links()}} 
    </div>
  </section>

</div>
@endsection


@section('utils')
<script type="text/javascript">
  $(document).ready(function() {
        $(document).on('click', 'ul.pagination a', function (e) {
        if($('ul.pagination').is(':hidden')); {
          $('ul.pagination').show();
        }
          $('.loading').show();
          $('#bookings').hide();
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
            $('#bookings').show();
            $('#bookings').html(data);          
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }
</script>

@endsection

