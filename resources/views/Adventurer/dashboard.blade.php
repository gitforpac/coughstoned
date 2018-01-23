@extends('layouts.layout')
@section('content')
<div class="pac-container container">
  <div class="user-wrapper">
    <div class="profile-div">  
      <div class="card" style="width: 100%;">
        <img class="card-img-top" src="{{ asset('img/da.jpg') }}" alt="Card image cap">
        <div class="card-body text-center">
          <h2></h2>
         
          <a href="#" style="margin-bottom: 160px;">View Profile</a><br>
          <a href="http://localhost:8000/adventurer/{{ Auth::id() }}/edit">Edit Profile</a>
        </div>
      </div>
    </div>  
    <div class="notif-div">      
      <div class="card">
        <div class="card-header">
          Notifications
        </div>
        <div class="card-body">
          <p class="card-text">Notifications.</p>
          <a href="#" class="btn btn-info">Clear</a>
        </div>
      </div>
      <br>
      <br>
      <div class="card">
        <div class="card-header">
          Messages(0 new)
        </div>
        <div class="card-body">
          <p class="card-text">No Messages.</p>
          <a href="#" class="btn btn-info">Clear</a>
        </div>
      </div>
    </div>    
  </div>
</div>
@endsection