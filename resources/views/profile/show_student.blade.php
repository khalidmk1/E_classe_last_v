
@extends('master.master_page_student')

@section('title')
@endsection

@section('sepirator')
    <section class="content-header">
        {{-- <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
      </div>
    </div>
  </div><!-- /.container-fluid --> --}}
    </section>
@endsection

@section('content')


    <div class="container emp-profile ">

        <div class="row pt-2">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="{{ asset('images/avatars/' . $profile->avatar) }}" class="rounded mx-auto d-block"
                        alt="avatar" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{ $profile->name . ' ' . $profile->last_name }}
                    </h5>
                    <h6>
                        {{ $profile->subject }}
                    </h6>
                    @if (auth()->check())
                    <p class="proile-rating">Suivez de c'est cours:
                        
                            <span>{{ App\Models\Folow::where('user_id', auth()->user()->id)->get()->count() }}</span>
                       
                    </p>
                    @endif
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">About</a>
                        </li>

                    </ul>
                </div>
            </div>
            @if (auth()->check())
            @if (auth()->user()->id == $profile->id)
                <div class="col-md-2">
                    <a href="{{ Route('edit.student' , auth()->user()->id) }}" class="btn btn-block btn-outline-warning" name="btnAddMore"
                        value="Edit Profile">Modifier</a>
                 

                </div>
            @endif
        @endif
          


        </div>
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab">


                    <div class="row">
                        <div class="col-md-6">
                            <label>Nom</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $profile->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $profile->email }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Telephone</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $profile->phone }}</p>
                        </div>
                    </div>

                    @if ($profile->subject !== null)
                        <div class="row">
                            <div class="col-md-6">
                                <label>Profession</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $profile->subject }}</p>
                            </div>
                        </div>
                    @endif
                    @if (auth()->check())
                        @if (auth()->user()->role == 'prof' && auth()->user()->role == 'admin')
                            <div class="row">
                                <div class="col-md-6">
                                    <label>
                                        Cours Total</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ App\Models\folow::where('user_id', auth()->user()->id)->get()->count() }}</p>
                                </div>
                            </div>
                        @endif
                    @endif




                </div>
            </div>
        </div>


        <div class="blog-home2 py-5">
            <div class="container">
                <!-- Row  -->
                @if (auth()->check())
                @if (auth()->user()->role != 'student')
                <div class="row justify-content-center">
                    <!-- Column -->
                    <div class="col-md-8 text-center">
                        <h3 class="my-3">Cours</h3>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                </div>
            @endif
                @endif
              


                <div class="row mt-4">
                    <!-- Column -->
                    @foreach ($events as $event)
                        <div class="col-md-4 on-hover ">
                            <div class="card border-0 mb-4">
                                <img class="card-img-top " style="height: 200px"
                                    src="{{ asset('images/event/' . $event->images[0]) }}" alt="wrappixel kit">
                                <div
                                    class="date-pos bg-info-gradiant p-2 d-inline-block text-center rounded text-white position-absolute">
                                    {{ $event->created_at->format('M') }}<span
                                        class="d-block">{{ $event->created_at->format('d') }}</span></div>
                                <h5 class="font-weight-medium m-3"><a href="#"
                                        class="text-decoration-none link">{{ $event->title }}</a></h5>
                                <p class="m-3">{{ $event->description }}</p>

                                <a href="{{ Route('event.detail', $event->id) }}"
                                    class="btn btn-block btn-outline-info w-25 m-2">Voir</a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>




    @endsection