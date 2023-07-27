@extends('master.master_landing_page')

@section('title')
    
@endsection

@section('content')
    
<section class="container-fluid first_content p-3 " id="Accueil">
    <div class="row align-items-center justify-content-end row-gap-3 mt-1">
        <div class="col-md-6 content_introduction" >
            <div class="row align-items-center" style="width: 747px;">
                <div class="col-12">
                    <h5>Se Préparer à un Futur Prometteur</h5>
                </div>
                <div class="col-12">
                    <h1>E-Classe, l’éducation virtuelle du succés au primaire, collége et au lycée.</h1>
                </div>
                <div class="col-12">
                    <h4>Bienvenue dans l'univers de l'apprentissage en ligne, où chaque élève peut exceller et réussir !</h4>
                </div>
                <div class="col-12">
                    <a href="{{Route('register')}}">
                        <button class="p-3">Je candidate</button>
                    </a>
                    
                </div>
            </div>
        </div>
        <div class="col-5  image_side"  >
            <img src="{{asset("assets/landing_page_img/img_introduction_classe.png")}} " class="img-fluid" alt="...">
        </div>
      </div>
</section>


<section class="container" style="padding: 160px 0px 160px 0;" id="about">
<div class="row">
    <div class="col-12">
        <h3>Obtenir un enseignement de qualité</h3>
    </div>
    <div class="col-12">
        <p>Problems trying to resolve the conflict between 
            the two major realms of Classical physics: Newtonian mechanics </p>
    </div>
    <div class="col-12">
        <div class="row align-items-center justify-content-between">
            <div class="col-sm-6">
                <img src="{{asset("assets/landing_page_img/img_about_classes.png")}} " class="img-fluid" alt="...">
            </div>
            
            <div class="col-sm-5 ">
                <div class="row align-items-center number_introduction ">
                    <div class="col-12 title_do" >
                        Most trusted in our field
                    </div>
                    <div class="col-12">
                        <p>Most calendars are designed for teams. Slate s designed 
                            for freelancers </p>
                    </div>
                    <div class="col-12 card_introduction">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <span class="">01</span>
                            </div>
                            <div class="col-10">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h6>Training Courses</h6>
                                    </div>
                                    <div class="col-12">
                                        <p>Things on a very small that you 
                                            have any direct</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 card_introduction">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <span>02</span>
                            </div>
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Expert instruction</h6>
                                    </div>
                                    <div class="col-12">
                                        <p>Things on a verysmall that you 
                                            have any direct</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 card_introduction">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <span>03</span>
                            </div>
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Expert instruction</h6>
                                    </div>
                                    <div class="col-12">
                                        <p>Things on a verysmall that you 
                                            have any direct</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


<section  class="container card_title" style="padding: 50px 0px;" id="niveau">
    <div class="row mb-5">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <h6 style="color:#FF6551 !important">Practice Advice</h6>
                        </div>
                        <div class="col-12">
                            <h2>Nos niveaux</h2>
                        </div>
                        <div class="col-12">
                            <p>Problems trying to resolve the conflict between 
                                the two major realms of Classical physics: Newtonian mechanics </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row text-center justify-content-between" >
        <!-- Team item-->
        <div class="col-xl-3 col-sm-6 mb-5 text-centre">
          <div class="bg-white rounded shadow-sm py-5 px-4 m-auto" style="width: 222px;">
          <div class="col-12 text-start ">
            <i class="fa fa-graduation-cap  icon_niveaux" aria-hidden="true"></i>
          </div>
            <div class="col-12 text-start pt-3"><span class="small text-uppercase   ">Primaire</span></div>
            <hr class="lin_card">
            <ul class="social mb-0 list-inline mt-3">
              <li class="list-inline-item text-start ">The gradual 
                accumulation of 
                information about </li>
            </ul>
          </div>
        </div>
        <!-- End-->
  
            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5 text-centre">
                <div class="bg-white rounded shadow-sm py-5 px-4 m-auto" style="width: 222px;">
                <div class="col-12 text-start ">
                  <i class="fa fa-graduation-cap  icon_niveaux" aria-hidden="true"></i>
                </div>
                  <div class="col-12 text-start  pt-3"><span class="small text-uppercase   ">Primaire</span></div>
                  <hr class="lin_card">
                  <ul class="social mb-0 list-inline mt-3">
                    <li class="list-inline-item text-start ">The gradual 
                      accumulation of 
                      information about </li>
                  </ul>
                </div>
              </div>
              <!-- End-->

                   <!-- Team item-->
        <div class="col-xl-3 col-sm-6 mb-5 text-centre">
          <div class="bg-white rounded shadow-sm py-5 px-4 m-auto" style="width: 222px;">
          <div class="col-12 text-start ">
            <i class="fa fa-graduation-cap  icon_niveaux" aria-hidden="true"></i>
          </div>
            <div class="col-12 text-start  pt-3"><span class="small text-uppercase   ">Primaire</span></div>
            <hr class="lin_card">
            <ul class="social mb-0 list-inline mt-3">
              <li class="list-inline-item text-start ">The gradual 
                accumulation of 
                information about </li>
            </ul>
          </div>
        </div>
        <!-- End-->
  
        
  
  
      </div>
</section>

<section class="container-fluid bg_static p-5" id="Contact">

        <div class="row">
          <div class="col-sm-5 pl-5">
            <img src="{{asset("assets/landing_page_img/img_setatic.png")}}" class="img-fluid" alt="...">
          </div>
          <div class="col-sm-6 m-auto"> 
               <div class="row ">
                <hr>
                <div class="col-12">
                    <h2 class="text-white">Every Client Matters</h2>
                </div>
                <div class="col-12 ">
                    <p class="text-white" >Problems trying to resolve the conflict between 
                        the two major realms of Classical physics: 
                        Newtonian mechanics </p>
                </div>
                <div class="col-12">
                    <a href="" class="learn_more">Learn More <i class="fas fa-angle-right"></i></a>
                </div>
               </div>
           
         
          </div>
        </div>
   
</section>

<section class="container mt-5 pt-5">
    <div class="row mb-4">
        <div class="col-lg-7">
          <h6  style="color:#FF6551 !important">Testimonials</h6>
          <h2 >Nos Alumni</h2>
          <p>Problems trying to resolve the conflict between 
            the two major realms of Classical physics: Newtonian mechanics </p>
        </div>
      </div>


      
    <div class="row text-center justify-content-evenly">
        <!-- Team item-->
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="bg-white row rounded shadow-sm py-5 px-4">
           <div class="col-12"> <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm"></div>
           <div class="col-12">
            <p>Slate helps you see how many more days 
                you need to work to reach your financial 
                goal for the month and year.</p>
        </div>
        <div class="col">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>

        <div class="col-12">
            <h5 class="text-dark">Regina Miles</h5>
        </div>
        <div class="col-12">
            <h6 >Designer</h6>
        </div>

          </div>
        </div>
        <!-- End-->
  
           <!-- Team item-->
           <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white row rounded shadow-sm py-5 px-4">
             <div class="col-12"> <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm"></div>
             <div class="col-12">
              <p>Slate helps you see how many more days 
                  you need to work to reach your financial 
                  goal for the month and year.</p>
          </div>
          <div class="col">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
  
          <div class="col-12">
              <h5 class="text-dark">Regina Miles</h5>
          </div>
          <div class="col-12">
              <h6 >Designer</h6>
          </div>
  
            </div>
          </div>
          <!-- End-->
  
   
  
   
  
      </div>

</section>

@endsection