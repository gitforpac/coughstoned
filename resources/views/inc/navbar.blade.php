
<nav class="navbar navbar-expand-lg bg-white" id="pnav">
  <a class="navbar-brand" href="/"></a>
  <ul class="navbar-nav ml-auto">
    <li class="navbar-item">
      <a href="/adventures" class="nav-link">Adventures</a>
    </li>
    <li class="navbar-item">
      <a href="/packages" class="nav-link">About us</a>
    </li>
    <li class="navbar-item">
      <a href="/packages" class="nav-link">Contact us</a>
    </li>
    @if(Auth::guard('user')->check())
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="/storage/user_avatars/{{Auth::guard('user')->user()->avatar}}" class="da">
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
        <a class="dropdown-item" href="/adventurer/{{Auth::guard('user')->id()}}/edit"><i class="fa fa-user"></i> &nbsp;Edit Profile</a>
         <a class="dropdown-item" href="/myadventures"><i class="fa fa-address-book" aria-hidden="true"></i> &nbsp;Booked Adventures</a>
        <a class="dropdown-item" href="#"><i class="fa fa-cog"></i> &nbsp;Account Settings</a>
        <a href="{{ route('logout') }}" class="dropdown-item" 
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i> Logout
        </a>
        <form id="logout-form" action="/logout" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </div>
    </li>
     @else
     <li class="navbar-item">
      <a href="javascript:void(0)" class="nav-link" data-toggle="modal" data-target="#register-form">Sign Up</a>
    </li>
    <li class="navbar-item">
      <a href="javascript:void(0)" class="nav-link" data-toggle="modal" data-target="#login-form">Login In</a>
    </li>
    @endif
  </ul>
</nav>
