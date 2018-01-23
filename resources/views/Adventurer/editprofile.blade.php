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
          <a class="nav-link np" href="/changepassword">Change Password</a>
        </li>
      </ul> 
         <a href="/user/{{Auth::guard('user')->id()}}" class="btn btn-outline-info vp">View Profile</a>
      </div>  
      <div class="edit-profile">      
        <div class="card">
        <div class="card-header">
            Edit Profile
          </div>

          <div class="card-body">
            <div class="form-loading text-center">
              <img src="{{ asset('img/loader.svg') }}">
            </div>
            <div class="message-status text-center">
            </div>
            <div id="edit-profile-body" style="display: none;">
            <form id="user-profile-form">
              <div class="row row-condensed">
                  <label class="text-right col-sm-3" for="user_first_name">
                    First Name
                  </label>
                  <div class="col-sm-9">        
                    <input id="user_first_name" name="user[first_name]" size="30" type="text" value="" /> 
                  </div>
                </div>
                <div class="row row-condensed">
                  <label class="text-right col-sm-3" for="user_last_name">
                    Last Name 
                  </label>
                  <div class="col-sm-9">    
                    <input id="user_last_name" name="user[last_name]" size="30" type="text" value="" />
                    <div class="text-muted space-top-1">Your public profile only shows your first name. When you request a booking, your host will see your first and last name.
                    </div>
                  </div>
                </div>

                <div class="row row-condensed">
                  <label class="text-right col-sm-3" for="user_sex">
                    I Am <i class="icon icon-lock icon-ebisu" data-behavior="tooltip" title="Private"></i>
                  </label>
                  <div class="col-sm-9">       
                    <div class="select">
                      <select id="user_sex" name="user[sex]">
                        <option value="">Gender</option>
                        <option value="Male" selected="selected">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                    <div class="text-muted space-top-1">We use this data for analysis and never share it with other users.
                    </div>
                  </div>
                </div>
                <div class="row row-condensed">
        <label class="text-right col-sm-3" for="user_birthdate">
          Birth Date <i class="icon icon-lock icon-ebisu" data-behavior="tooltip" title="Private"></i>
        </label>
        <div class="col-sm-9">
          
        <fieldset>
          <legend>Birthday</legend>
          <div class="select">
            <select aria-label="Month" id="user_birthdate_month" name="user[birthdate(2i)]">
              <option value="">Month</option>
              <option value="January">January</option>
              <option value="February">February</option>
              <option value="March">March</option>
              <option value="April">April</option>
              <option value="May">May</option>
              <option value="June">June</option>
              <option value="July">July</option>
              <option value="August">August</option>
              <option value="September">September</option>
              <option value="October">October</option>
              <option value="November">November</option>
              <option value="December">December</option>
            </select>

          </div>
          <div class="select">
            <select aria-label="Day" id="user_birthdate_day" name="user[birthdate(3i)]">
<option value="">Day</option>

<?php for($cnt=1;$cnt<32;$cnt++){ ?>
<option value="<?php echo ($cnt); ?>"><?php echo ($cnt); ?></option>
<?php } ?>
</select>

          </div>
          <div class="select">
            <select aria-label="Year" id="user_birthdate_year" name="user[birthdate(1i)]">
              <option value="">Year</option>
              <?php for($cnt=1917;$cnt<2000;$cnt++){ ?>
              <option value="<?php echo ($cnt); ?>"><?php echo ($cnt); ?></option>
              <?php } ?>
            </select>

          </div>
        </fieldset>

          <div class="text-muted space-top-1">The magical day you were dropped from the sky by a stork. We use this data for analysis and never share it with other users.</div>
        </div>
      </div>

        <div class="row row-condensed">
        <label class="text-right col-sm-3" for="user_email">
          Email Address
        </label>
        <div class="col-sm-9"> 
        <input id="user_email" name="user[email]" size="30" type="text" value="" />
          <div class="text-muted space-top-1">We won’t share your private email address with other users. <a href="/help/article/694" target="blank">Learn more</a>.</div>
        </div>
      </div>

        <div class="row row-condensed">
        <label class="text-right col-sm-3 checkbox" for="user_phone">
          Phone Number
        </label>
        <div class="col-sm-9">
      <div class="phone-numbers-container">
        <div class="phone-number-replace-widget">
        <div class="pnaw-step1">
          <div class="phone-number-input-widget" id="phone-number-input-widget-920c5ece">
          <input type="tel" class="pniw-number" id="phone_number"  />
        </div>
      </div>



 <!-- <div class="pnaw-verify-container">
      <a class="btn btn-primary" href="#" rel="sms">Verify via SMS</a>
      <a class="cancel" rel="cancel" href="#">Cancel</a>
      <a class="why-verify" href="/help/article/277" target="_blank">Why Verify?</a>
    </div>
  </div>
  <div class="pnaw-step2">
    <p class="message"></p>
    <label for="phone_number_verification">Please enter the 4-digit code:</label>
    <input type="text" pattern="[0-9]*" id="phone_number_verification"/>

    <div class="pnaw-verify-container">
      <a class="btn btn-primary" href="#" rel="verify" data-old-phone-number="">
        Verify
      </a>
      <a class="cancel" rel="cancel" href="#">
        Cancel
      </a>
    </div>
    <p class="cancel-message">If it doesn't arrive, click cancel and try again.</p>
  </div>
   -->
</div>

</div>

      </div>

        </div>


          <div class="row row-condensed">
        <label class="text-right col-sm-3" for="user_profile_info_current_city">
          Where You Live 
        </label>
        <div class="col-sm-9">
          
      <input id="user_profile_address" name="user_profile_info[current_city]" placeholder="e.g. Looc, Mandaue/ Mambaling, Cebu" size="30" type="text" />

          
        </div>
      </div>

          <div class="row row-condensed">
        <label class="text-right col-sm-3" for="user_profile_info_about">
          Describe Yourself 
        </label>
        <div class="col-sm-9">
          
      <textarea cols="40" id="user_profile_info_about" name="user_profile_info[about]" rows="5"></textarea>

        </div>
      </div>
        <button type="submit" class="btn btn-info" id="edit-submit">
          <div id="loading" style="display:none;">
            <img src="{{ asset('img/button-loader.svg') }}" height="20px" width="20px">
          </div>
          Update Profile    
        </button>
            </form>
          </div>
          </div>
        </div>
      </div>    
  </div>
</div>
</div>

@endsection

@section('utils')
<script type="text/javascript">
  $(function() {
    var user = new Client();
    user.getUserInfo({{Auth::guard('user')->id()}});
  })
 
</script>

<script type="text/javascript">
  var user = new Client();
  user.editProfile({{Auth::guard('user')->id()}});
</script>
@endsection