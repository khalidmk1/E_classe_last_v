{{-- @extends('master.master_page')

@section('title')
    
@endsection


@section('content')
    <!-- Main content -->
    <section class="content mt-3">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{asset('images/avatars/'.$enseignement->avatar)}}"
                         alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center">{{$enseignement->name . $enseignement->last_name}} </h3>
  
                  <p class="text-muted text-center">{{$enseignement->subject}}</p>
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Followers</b> <a class="float-right">1,322</a>
                    </li>
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
              <!-- About Me Box -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">A propo de moi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <strong><i class="fas fa-book mr-1"></i> Matière</strong>
  
                  <p class="text-muted">
                   {{$enseignement->subject}}
                  </p>
  
                  <hr>
  
                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Ville</strong>
  
                  <p class="text-muted">{{$enseignement->county}}</p>
  
                  <hr>
  
                  <strong><i class="fas fa-phone"></i>Telephone</strong>
  
                  <p class="text-muted">
                    <span class="tag tag-danger">{{$enseignement->phone}}</span>
                    
                  </p>
  
  
                  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" >
                    
                      <!-- Post -->
                      <div class="post">
                        
                        <div class="row mb-3">
                          <div class="col-sm-6">
                            <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-6">
                            <div class="row">
                              <div class="col-sm-6">
                                <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                                <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-6">
                                <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                                <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- /.row -->
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                      <!-- /.post -->
                    </div>





                  
  
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection --}}


@extends('master.master_table')

@section('title')
@endsection


@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            
                                
                            
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">suiveurs de ce cour</span>
                                        <span class="info-box-number text-center text-muted mb-0">2000</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Estimated project duration</span>
                                        <span class="info-box-number text-center text-muted mb-0">20</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4></h4>
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="{{asset('images/avatars/'. $profile->avatar)}}"
                                            alt="user image">
                                        <span class="username">
                                            <a href="#">{{$profile->name . " " .$profile->last_name}}</a>
                                        </span>
                                        <span class="description">Partagé publiquement - {{$profile->created_at}}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                    
                                    </p>

                                 
                                </div>

                               
                               

                          
                            </div>
                        </div>
                    </div>
                    

                    
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->






    </section>
    <!-- /.content -->
@endsection