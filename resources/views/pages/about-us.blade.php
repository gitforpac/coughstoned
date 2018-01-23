@extends('pages.layout')
@section('content')
<title>About us</title>
<div class="row">
       <div class="w-100">
          <!-- BACKGROUND IMAGE TOP -->
          <div class="col">
           
              <div>
                <div class="row">
                <img class="bg-img" src="{{ asset('img/bg.jpg') }}">
                </div>
                   <div class="container"> 
                    <blockquote class="ts blockquote mt-10">
                      <h1 class="text-center text-white" data-max-font-size="24px"  data-min-font-size="12px">"Life is either a daring adventure or nothing."</h1>
                      
                      <p class="text-center text-white" data-max-font-size="24px"  data-min-font-size="12px">
                        - Kapitan Duay </p>
                    </blockquote>
                  </div>
              </div> 
          </div>
        </div>



<!-- MIDDLE -->
 <div class="container mt-10">
    <div class="w-100">
      <div>
        <div class="row">

           <div class=" row">
              <div class="container mb-5 text-center">
                <hr>
                 <p>
                 <strong>Philippine Adventure Consultants</strong> will help you discover why everyone has only praises for this kind of experience.</p>

                <p>Established in 2013, Philippine Adventure Consultants has secured itself as the premiere companion in many kinds of adventures in Cebu. We provide a safe and secure but exhilarating adventure with these amiable sea creatures. “Gentle” doesn’t even describe them; they’re more like mellow and domesticated.</p>

                <p>But that’s not all that we offer. We also provide day tours to some of the neighboring islands of Cebu like Bohol and Dumaguete. Haven’t been around Cebu yet? Our twin city tour of Cebu City and Lapu-Lapu, Mactan will make you discover why they’ve become must-see destinations in the country.</p>

                <p>Philippine Adventure Consultants can arrange your whole trip for you with just a call or a click of a button. Experience what many satisfied customers are talking about. Experience the Philippine Adventure Consultants adventure now!</p>
                <hr>
            </div>

              <div class="col">
                 <div class="col text-center mb-2">
                    <i class="sea fa fa-4x fa-group"> </i>
                 </div>
                    <div class="col text-center">
                      <h2>Crews</h2>
                      <p>
                        With our 20+ and growing Crews, we assure you that safety is the top priority while still having tons of fun.</p>
                    </div>
                  </div>

                   <div class="col">
                 <div class="col text-center mb-2">
                   <i class="sea fa fa-4x fa-compass"> </i>
                 </div>
                    <div class="col text-center">
                      <h2>Adventure Sites</h2>
                      <p>
                        8 different types adventures and 23 adventure sites and hundreds of more to discover soon.</p>
                    </div>
                  </div>

                   <div class="col">
                 <div class="col text-center mb-2">
                    <i class="sea fa fa-4x fa-qq"> </i>
                 </div>
                    <div class="col text-center">
                      <h2>Fellow Adventurers</h2>
                      <p>
                        There are hundreds of adventrers like you who have experienced and will experience Adventures.</p>
                    </div>
                  </div>
               

               </div> 

        </div>
    </div>
</div>
<hr class="m-5">
</div>
  


<!-- FOUNDERS -->
<div class="bg-sea w-100">
  <div class="row m-5 mb-3">
    
      <div class="col ml-5">
           

            <div class="col row p-3 ml-5">
              <div>
                <img class="rounded-circle" src="{{ asset('img/trebla.jpg') }}"  width="150" height="150" alt="Jerwin Espina">
              </div>
              <div class="col mt-3">
                  <blockquote>
                      <cite>
                        <h5>Rasec Espina</h5>                   
                        <label>Founder</label>
                      </cite>
                    <p>We’ve worked with a good handful of crews in our time, unlike Rasec he sure knows what he's doing.</p>
                </blockquote>
              </div>
          </div>


          <div class="col row p-3 ml-5">
              <div>
                <img class="rounded-circle" src="{{ asset('img/user.png') }}"  width="150" height="150" alt="Jerwin Espina">
              </div>
              <div class="col mt-3">
                  <blockquote>
                      <cite>
                        <h5>Kapitan Duay</h5>                   
                        <label>CEO</label>
                      </cite>
                    <p>We’ve worked with a good handful of crews in our time, unlike Kap he sure knows what he's doing.</p>
                </blockquote>
              </div>
          </div>

          <div class="col row p-3 ml-5">
              <div>
                <img class="rounded-circle" src="{{ asset('img/user.png') }} "  width="150" height="150" alt="Jerwin Espina">
              </div>
              <div class="col mt-3">
                  <blockquote>
                      <cite>
                        <h5>John Doe</h5>                   
                        <label>Asst. CEO/Co-Founder</label>
                      </cite>
                    <p>John became an entrepreneur in his youth, running a business while he was in high school that sold to clients in more than 5 countries. He earned a degree in Business Ad from University of San Carlos and held several adventures before co-founding PAC.</p>
                </blockquote>
              </div>
          </div>


    </div>
  </div>
</div>
</div>
@endsection