    <!-- Modal -->
    <div class="modal fade mtop" id="login-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
           <div class="">
    <div class="row">
        <form class="form-signin mg-btm pad" method="POST" action="/login" id="login-modal-form">
        <div class="social-box">
            <div class="row mg-btm">
             <div class="col-md-12">
                <a href="/login/facebook" class="btn btn-block fbtn">
                 <i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;&nbsp;Connect with Facebook
                </a>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <a href="/login/google" class="btn btn-block gbtn" >
                   <i class="fa fa-google-plus" aria-hidden="true" style="color:#fff;"></i>&nbsp;&nbsp;Connect with Google
                </a>
            </div>
          </div>
        </div>
        <p class="r"><span>or</span></p>
        <div class="main">  
        {{ csrf_field()}} 
        <div class="error-box">
        </div>
        <div class="form-icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>  
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" autofocus required="" />
        <div class="form-icon"><i class="fa fa-lock" aria-hidden="true"></i></div>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="" />
         
        <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input">
        <small>Remember Me</small>
        </label>
        <button type="submit" class="btn btn-block mybtn1" id="loginbtn" style="margin-top: 5px;">Login</button>
        <a style="color: #00305B;" href="#register-form" data-toggle="modal" data-dismiss="modal" class="btn btn-block mybtn1">Register</a>
      </div>
      </div>  
</form>
    </div>
</div>
          </div>
        </div>
      </div>
    </div> <!-- //modal -->