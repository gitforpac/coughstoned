@extends('pages.layout')
@section('breadcrumbs')
{{ Breadcrumbs::render('contactus') }}
@endsection
@section('content')
<div class="jumbotron re">
  <h1 class="display-4">Hello, world!</h1>
  <iframe class="locmap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.9073646907405!2d123.91112971434616!3d10.349291892612206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a998901b771ce7%3A0xb845a95c27f22d0a!2sGov.+M.+Cuenco+Ave%2C+Cebu+City%2C+Cebu!5e0!3m2!1sen!2sph!4v1515920035050" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>


<!-- MIDDLE EARTH -->
  <div class="row">
    <div class="container w-100">
      <div class="col text-center p-3">
        <h1 class="text-success">SAY HELLO</h1>
        <p>Got some suggestions? Have a few questions? We’re ready for them. Get busy!

If you would like us to keep you on file, please email us at cebu@pac.com!</p>
      </div>
    </div>
  </div>

  <hr class="m-5">



<!-- CONTACT FORM -->
<div class="row mb-5">
  <div class="w-100">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                                <option value="service">General Customer Service</option>
                                <option value="suggestions">Suggestions</option>
                                <option value="product">Feedback</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="fa fa-globe"></span> Where's our headquarters?</legend>
            <address>
                <strong>Philippine Adventure Consultants</strong><br>
                81 C. Ouano St.,<br>
                Looc Mandaue City Cebu 6014<br>
                
                (+032) 344-5934
            </address>
            </form>
        </div>
    </div>
    </div>
  </div>
</div>
@endsection