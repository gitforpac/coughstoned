 <!-- NAV BAR -->
    <header class="navbar navbar-light navbar-static-top fixed-top navbarborder" id="pnav">
  <nav class="navbar navbar-toggleable-md navbarnopad">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
          data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
          </button>
       <a href="/" class="navbar-brand"><img src="{{ asset('img/logo.png') }}" height="50px;" width="50px;"></a>

      <div class="collapse navbar-collapse" id="navbarNav">
          <!--Left nav-->

          <!--Right nav-->
          <div class="navbar-collapse justify-content-md-end">
              <ul class="navbar-nav">

                 <li class="nav-item">
                      <a href="/adventures" class="nav-link">
                          Adventures
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          Blog
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          Contact Us
                      </a>
                  </li>
                         <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                      <a href="#" class="nav-link" data-toggle="modal" data-target="#login-form" >
                        Login
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link" data-toggle="modal" data-target="#register-form" >
                          Register
                      </a>
                  </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="{{ asset('img/da.jpg') }}" class="da">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
                      <a class="dropdown-item" href="/adventurer/{{Auth::id()}}/edit">Edit Profile</a>
                      <a class="dropdown-item" href="#">Account Settings</a>
                      <a href="{{ route('logout') }}" class="dropdown-item" 
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                          Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                    </div>
                  </li>
                @endguest
              </ul>
          </div>

      </div>

  </nav>
</header>

     <!-- NAV BAR -->  