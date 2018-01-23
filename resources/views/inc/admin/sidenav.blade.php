<!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <div class="sidenav-header-inner text-center"><img src="{{asset('img/avatar-1.jpg')}}" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5 text-uppercase">John Roldan Sasing</h2><span class="text-uppercase">Staff</span>
          </div>
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong></strong><strong class="text-primary">PAC</strong></a></div>
        </div>
        <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="/crew/dashboard"> <i class="icon-home"></i><span>Dashboard</span></a></li>
            <div class="admin-menu">
              <ul id="side-admin-menu" class="side-menu list-unstyled"> 
                <li> <a href="#pages-nav-list" data-toggle="collapse" aria-expanded="false"><i class="icon-interface-windows"></i><span>Manage</span>
                    <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
                  <ul id="pages-nav-list" class="collapse list-unstyled">
                    <li> <a href="/crew/manage">Packages and bookings</a></li>
                    <li> <a href="/crew/add">Add Package</a></li>
                  </ul>
                </li>
              </ul>
            </div>   
            <li><a href="#"><i class="fa fa-users"></i><span>Crew Profiles</span></a></li>    
            <li><a href="#"><i class="fa fa-history"></i><span>Bookings History</span></a></li>    
          </ul>
        </div>
      </div>
    </nav>

     <!--       <div class="admin-menu">
          <ul id="side-admin-menu" class="side-menu list-unstyled"> 
            <li> <a href="#pages-nav-list" data-toggle="collapse" aria-expanded="false"><i class="icon-interface-windows"></i><span>Dropdown</span>
                <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
              <ul id="pages-nav-list" class="collapse list-unstyled">
                <li> <a href="#">Page 1</a></li>
                <li> <a href="#">Page 2</a></li>
                <li> <a href="#">Page 3</a></li>
                <li> <a href="#">Page 4</a></li>
              </ul>
            </li>
          </ul>
        </div> -->