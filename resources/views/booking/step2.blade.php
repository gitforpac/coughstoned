@extends('layouts.layout')
@section('content')
<div class="container steps">
  <div class="s1">
    <ul>
      <li>1. Review Guest Requirements</li>
      <li>></li>
      <li>2. Who's coming</li>
      <li>></li>
      <li>3. Confirm and Pay </li>
    </ul>
  </div>
  <div class="s2">
    <div class="reviews">
      <div class="rev"><h3>Travellers</h3></div>
    	<div class="row" >
    		<div class="g">
    		<span style="font-weight: 400">Adults (18+):</span>
    			<select>
    				@for($i=1;$i<=15;$i++){
    					<option>{{$i}}</option>
    				@endfor
    			</select>
    		</div>
    		<div class="g">
    		<span style="font-weight: 600">Children (10+):</span>
    			<select>
    				@for($i=0;$i<=15;$i++){
    					<option>{{$i}}</option>
    				@endfor
    			</select>
    		</div>
    	</div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="rev">
      <button class="btn btn-outline-danger" style="padding: 8px 30px 8px 30px;font-family: sourcesb, sans-serif;font-size: 19px;">Next</button>
    </div>
  </div>
  <div class="s3">
    <div class="package-d">
      <div class="package-description-details">
        <img src="{{asset('img/falls.jpg')}}">
      </div>
      <div class="package-description-details">
        <h5 class="package-section-header">Trekking</h5>
        <p>Guided by: blablbabla</p>
      </div>
      <div class="package-description-details">
        <h5 class="package-section-header">Tue, Dec</h5>
      </div>
      <div class="package-description-details">
        <p style="padding-top: 25px; display: inline-block;">₱4200 x 1 adventurer(s)</p>
        <span class="payment">Total: <strong>₱4200</strong></span>
      </div>
    </div>
  </div>
</div>
@endsection