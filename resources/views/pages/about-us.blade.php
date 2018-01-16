@extends('pages.layout')
@section('content')
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
                      <h1 class="text-center text-white" data-max-font-size="24px"  data-min-font-size="12px">"Kung tag 10 ang siomai palit lang tag duha."</h1>
                      
                      <p class="text-center text-white" data-max-font-size="24px"  data-min-font-size="12px">
                        - Jerwin Espina </p>
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


              <div class="col">
                 <div class="col text-center mb-2">
                    <i class="sea fa fa-4x fa-group"> </i>
                 </div>
                    <div class="col text-center">
                      <h2>Crews</h2>
                      <p>
                        Daghan mig crews brod di mahutdan.</p>
                    </div>
                  </div>

                   <div class="col">
                 <div class="col text-center mb-2">
                   <i class="sea fa fa-4x fa-compass"> </i>
                 </div>
                    <div class="col text-center">
                      <h2>Adventure Sites</h2>
                      <p>
                        Way blema na naami daghan pdzx.. and many more to discover soon</p>
                    </div>
                  </div>

                   <div class="col">
                 <div class="col text-center mb-2">
                    <i class="sea fa fa-4x fa-qq"> </i>
                 </div>
                    <div class="col text-center">
                      <h2>Fellow Adventurers</h2>
                      <p>
                        There are hundreds of adventrers like you who have experienced and will experience our different packages.</p>
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
    <div class="container">
      <div class="col">
           

            <div class="col row p-3 ml-5">
              <div>
                <img class="rounded-circle" src="{{ asset('img/trebla.jpg') }}"  width="150" height="150" alt="Jerwin Espina">
              </div>
              <div class="col mt-3">
                  <blockquote>
                      <cite>
                        <h5>Rasec the Builder</h5>                   
                        <label>Guizo Guardian/Co-Founder</label>
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
                        <h5>Rasec the Builder</h5>                   
                        <label>Guizo Guardian/Co-Founder</label>
                      </cite>
                    <p>We’ve worked with a good handful of crews in our time, unlike Rasec he sure knows what he's doing.</p>
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
                        <h5>Rasec the Builder</h5>                   
                        <label>Guizo Guardian/Co-Founder</label>
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
                        <h5>Rasec the Builder</h5>                   
                        <label>Guizo Guardian/Co-Founder</label>
                      </cite>
                    <p>We’ve worked with a good handful of crews in our time, unlike Rasec he sure knows what he's doing.</p>
                </blockquote>
              </div>
          </div>


    </div>
  </div>
</div>
</div>
@endsection