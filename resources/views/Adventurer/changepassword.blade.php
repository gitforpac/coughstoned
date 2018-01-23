@extends('layouts.layout')
@section('content')                             
<div class="container">
  <div class="user-wrapper">
      <div class="edit-nav"> 
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link np active" href="/adventurer/{{Auth::guard('user')->id()}}/edit">Edit Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link np" href="#">Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link np active" href="/changepassword">Change Password</a>
        </li>
      </ul> 
         <a href="/adventurer" class="btn btn-outline-info vp">View Profile</a>
      </div>  
  <div class="edit-profile">  
    <div class="card">
    <div class="card-header">
     Change Password
    </div>
    <div class="card-body">
      <div class="message-status text-center">
      </div>
      <form id="user-changepassword">
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Old&nbsp;Password:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control fs" id="old_password" placeholder="Old Password">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">New&nbsp;Password:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control fs" id="new_password" placeholder="New Password">
          </div>
        </div>
          <button type="submit" class="btn btn-danger" style="float: right">Change Password Now</button>        
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
      </form>
    </div>
  </div>    
  </div>
</div>
</div>
@endsection

@section('utils')
<script type="text/javascript">
  var user = new Client();
  user.changePassword({{Auth::id()}});
</script>
@endsection