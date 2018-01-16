@extends('Adventurer.layout')
@section('content')
<div class="container">
	<div class="user-wrapper">
	    <div class="edit-nav">  
	    	 <a href="#" class="btn btn-outline-info">View Profile</a>
	    </div>  
	    <div class="edit-profile">      
	    	<div class="card">
				<div class="card-header">
				    Required
	  			</div>
	  			<div class="card-body">
	  				<form>
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
				              <select id="user_sex" name="user[sex]"><option value="">Gender</option>
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
          <legend class="screen-reader-only">Birthday</legend>
          <div class="select">
            <select aria-label="Month" id="user_birthdate_2i" name="user[birthdate(2i)]">
<option value="">Month</option>
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>

          </div>
          <div class="select">
            <select aria-label="Day" id="user_birthdate_3i" name="user[birthdate(3i)]">
<option value="">Day</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>

</select>

          </div>
          <div class="select">
            <select aria-label="Year" id="user_birthdate_1i" name="user[birthdate(1i)]">
<option value="">Year</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
</select>

          </div>
        </fieldset>

          <div class="text-muted space-top-1">The magical day you were dropped from the sky by a stork. We use this data for analysis and never share it with other users.</div>
        </div>
      </div>

          <div class="row row-condensed">
        <label class="text-right col-sm-3" for="user_email">
          Email Address <i class="icon icon-lock icon-ebisu" data-behavior="tooltip" title="Private"></i>
        </label>
        <div class="col-sm-9">
          
        <input id="user_email" name="user[email]" size="30" type="text" value="" />

          <div class="text-muted space-top-1">We won’t share your private email address with other users. <a href="/help/article/694" target="blank">Learn more</a>.</div>
        </div>
      </div>

          <div class="row row-condensed">
        <label class="text-right col-sm-3 checkbox" for="user_phone">
          <p>Phone Number</p> <i class="icon icon-lock icon-ebisu" data-behavior="tooltip" title="Private"></i>
        </label>
        <div class="col-sm-9">
          
      <div class="clearfix" id="phone-number">
        <div class="phone-numbers-container">



  <div class="phone-number-replace-widget">
  <p class="pnaw-verification-error"></p>
  <div class="pnaw-step1">
    <div class="phone-number-input-widget" id="phone-number-input-widget-920c5ece">
    <input type="tel" class="pniw-number" id="phone_number"  />
  </div>
  <input type="hidden" data-role="phone_number" name="phone" />
  <input type="hidden" name="user_id" value="152154728" />
</div>



    <div class="pnaw-verify-container">
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
</div>


</div>

      </div>

        </div>
      </div>


          <div class="row row-condensed">
        <label class="text-right col-sm-3" for="user_profile_info_current_city">
          Where You Live 
        </label>
        <div class="col-sm-9">
          
      <input id="user_profile_info_current_city" name="user_profile_info[current_city]" placeholder="e.g. Looc, Mandaue/ Mambaling, Cebu" size="30" type="text" />

          
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
	  				</form>
			  	</div>
	  		</div>
	    </div>    
  </div>
</div>
@endsection
@section('utils')

@endsection