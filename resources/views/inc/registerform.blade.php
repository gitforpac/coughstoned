      <!-- register Modal -->
    <div class="modal fade mtop" id="register-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
  <div class="row">
    <form class="form-signin mg-btm pad" id="registerform" method="POST" action="/register">
       {{ csrf_field() }}
    <div class="social-box text-center">
      <div class="cfg">
       <span>Connect with&nbsp;<a href="/login/facebook">Facebook</a>&nbsp;or&nbsp;<a href="/login/google">Google</a></span>
      </div>
    </div>
    <p class="r"><span>or</span></p>
    <div class="main">  
    <div id="errorm"></div>
    <div class="form-icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>   
    <input type="email" name="email" class="form-control" placeholder="Email" autofocus/>
    <span class="form-text text-red email-error error-box">
    </span>
    <div class="form-icon"><i class="fa fa-user-o" aria-hidden="true"></i></div>
    <input type="text" name="firstname" class="form-control" placeholder="First Name" />
    <div class="form-icon"><i class="fa fa-user-o" aria-hidden="true"></i></div>
    <input type="text" name="lastname" class="form-control" placeholder="Last Name" />
    <div class="form-icon"><i class="fa fa-lock" aria-hidden="true"></i></div>
    <input type="password" name="password" class="form-control" placeholder="Password"/>
    <span class="form-text text-red password-error error-box">
    </span>
    <span class="register-bday">Birthday <small>(*Must be atleast 18 years of age to book)</small></span>
    <br>
    <div class="row">
      <div class="col">
         <select name="birthdate_month" class="reg-select" id="select-month">
          <option value="" disabled selected>Month</option>
          <option>January</option>
          <option>February</option>
          <option>March</option>
          <option>April</option>
          <option>May</option>
          <option>June</option>
          <option>July</option>
          <option>August</option>
          <option>September</option>
          <option>October</option>
          <option>November</option>
          <option>December</option>
        </select>
      </div>
      <div class="col">
         <select name="birthdate_day" class="reg-select" id="select-day">
          <option value disabled selected>Day</option>
          @php
            for($i=1;$i<=31;$i++){
              echo '<option value="'.$i.'">'.$i.'</option>';
            }
          @endphp
        </select>
      </div>
      <div class="col">
         <select name="birthdate_year" class="reg-select" id="select-year">
          <option value="" disabled selected>Year</option>
           @php
            for($i=2017;$i>=1895;$i--){
              echo '<option value="'.$i.'">'.$i.'</option>';
            }
          @endphp
        </select>
      </div>
    </div>
        <br>
        <div class="form-check">

      <button type="submit" class="btn btn-block mybtn1 regbtn" style="margin-top: 5px;">
        <div id="loading" style="display:none;">
            <img src="{{ asset('img/button-loader.svg') }}" height="20px" width="20px">
          </div>
        Register Account
    </button>
  </div>
  </div>
</form>
</div>
          </div>
        </div>
      </div>
    </div> <!-- //register modal -->

