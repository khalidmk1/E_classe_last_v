@extends('master.master_landing_page')

@section('title')
@endsection

@section('content')
    {{-- <style>
        span .select2-selection--single {
            height: 100% !important;
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @error('name')
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @enderror

        @error('last_name')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('avatar')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('email')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('phone')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('current_password')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('password')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('password_confirmation')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('county')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('subject')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror


        @error('work_status')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('name_school')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Information Personnel</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf


                        <div class="card-body">
                            <div class="form-group text-centre">
                                <img src="{{ asset('images/avatars/' . auth()->user()->avatar) }}" alt="..."
                                    class="rounded mx-auto d-block" style="width: 50%" id="blah">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">change image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" value="{{ auth()->user()->avatar }}" name="avatar"
                                            class="custom-file-input" id="exampleInputFile" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ auth()->user()->name }}" id="exampleInputEmail1"
                                    placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Prenom</label>
                                <input type="text" class="form-control" name="last_name"
                                    value="{{ auth()->user()->last_name }}" id="exampleInputEmail1"
                                    placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ auth()->user()->email }}" id="exampleInputEmail1"
                                    placeholder="Enter email">
                            </div>



                            <div class="form-group">
                                <label for="exampleInputEmail1">Telephone</label>
                                <input type="text" name="phone" value="{{ auth()->user()->phone }}"
                                    class="form-control" data-inputmask='"mask": "999 999 9999"' data-mask
                                    placeholder="Telephone" required autocomplete="phone">
                            </div>


                            @if (auth()->user()->role == 'prof' && !auth()->user()->subject == null)
                                <!-- select subject -->

                                <div class="mb-4 pb-2">
                                    <label class="form-label" for="form3Examplev2">Le sujet que vous
                                        étudiez</label>
                                    <select class="form-control select2" name="subject" style="width: 100%;">
                                        <option value="{{ $user->subject }}">{{ $user->subject }}
                                        </option>
                                        @foreach ($subject as $sujet)
                                            <option value="{{ $sujet }}">{{ $sujet }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4 pb-2">
                                    <label class="form-label" for="form3Examplev2">ville</label>
                                    <select class="form-control select2" name="county" style="width: 100%;">
                                        <option value="{{ $user->county }}">{{ $user->county }}
                                        </option>
                                        @foreach ($county_array as $county)
                                            <option value="{{ $county }}">{{ $county }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif




                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-outline-warning w-25 m-auto">Change</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">change Mot de passe</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('password.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="card-body">

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mots de passe </label>
                                <input type="password" name="current_password" value="__('Current Password')"
                                    class="form-control" id="exampleInputPassword1" placeholder="Password"
                                    autocomplete="current-password">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Change mots de passe</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password" autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirme Mot de passe</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="exampleInputPassword1" placeholder="Password" autocomplete="new-password">
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-outline-warning w-25 m-auto">Change</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->

    </section>

    <!-- /.content --> --}}

    <style>
        span {
            color: rgb(255, 252, 252);
        }
    </style>

    <section class="content">
        <div class="container">
            @error('name')
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @enderror

        @error('last_name')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('avatar')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('email')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('phone')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('current_password')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('password')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('password_confirmation')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('county')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('subject')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror


        @error('work_status')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('name_school')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        <div class="row flex-lg-nowrap">


            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">

                                <div class="e-profile">
                                    <form class="form" method="post" action="{{ route('profile.update') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                       

                                            <div class="col-12 col-sm-auto mb-3">
                                                <div class="mx-auto" style="width: 140px;">
                                                    <div class="d-flex justify-content-center align-items-center rounded"
                                                        style="height: 200px; width: 200px ; background-color: rgb(233, 236, 239);">
                                                        <img src="{{ asset('images/avatars/' . auth()->user()->avatar) }}"
                                                            alt="..." class="rounded mx-auto d-block"
                                                            style="width: 100% ; height: 100%;" id="blah">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col d-flex flex-column flex-sm-row justify-content-center  mb-3" style="align-items: center !important ; align-content: center">
                                                <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">John Smith</h4>
                                                    <p name="name" class="mb-0">
                                                        {{ auth()->user()->name . ' ' . auth()->user()->last_name }}</p>

                                                    <div class="mt-2 row"  style="align-items: center !important ; align-content: center" >
                                                        <div class="mt-2 col" >
                                                            <label for="formFile" class="form-label">Change image</label>
                                                            <input class="form-control" name="avatar" type="file"
                                                                id="formFile" value="{{ auth()->user()->avatar }}"
                                                                name="avatar" id="exampleInputFile">
                                                        </div>
                                                        <div class="col d-flex justify-content-end ">
                                                            <button class="btn btn-primary" type="submit">Change image</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                           
                                        
                                    </div>
                                </form>



                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item active"><a data-toggle="tab" href="#information"
                                                class="active nav-link">Information Perssonnel</a>
                                        </li>
                                        <li class="nav-item"><a data-toggle="tab" href="#mots_passe"
                                                class="nav-link">Change Mot de passe</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content pt-3">

                                        <div class="row container tab-pane active " id="information">
                                            <form class="form" method="post" action="{{ route('profile.update') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Nom</label>
                                                                <input class="form-control" type="text" name="name"
                                                                    value="{{ auth()->user()->name }}">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Prenom</label>
                                                                <input class="form-control" type="text"
                                                                    name="last_name"
                                                                    value="{{ auth()->user()->last_name }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Telephone</label>
                                                                <input name="email" class="form-control" name="phone"
                                                                    value="{{ auth()->user()->phone }}"
                                                                    data-inputmask='"mask": "999 999 9999"' data-mask
                                                                    placeholder="{{ auth()->user()->phone }}"
                                                                    autocomplete="phone">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input name="email" class="form-control"
                                                                    value="{{ auth()->user()->email }}" type="text"
                                                                    placeholder="{{ auth()->user()->email }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-2">
                                                        <div class="col d-flex justify-content-end">
                                                            <button class="btn btn-primary" type="submit">Mis a ajour</button>
                                                        </div>
                                                    </div>


                                                </div>
                                            </form>
                                        </div>



                                        <div class="row container tab-pane fade" id="mots_passe">
                                            <form method="post" action="{{ route('password.update') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="col-12 col-sm-6 mb-3">
                                                    <div class="mb-2"><b>Change Password</b></div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Mots de passe</label>
                                                                <input class="form-control" name="current_password" value="__('Current Password')" type="password"
                                                                    placeholder="••••••">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Neveau Mots de passe</label>
                                                                <input class="form-control"  name="password" type="password"
                                                                    placeholder="••••••">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Confirm <span class="d-none d-xl-inline"
                                                                        style="color: black">Mots de passed</span></label>
                                                                <input  name="password_confirmation" class="form-control" type="password"
                                                                    placeholder="••••••">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-2">
                                                        <div class="col d-flex justify-content-end">
                                                            <button class="btn btn-primary" type="submit">Change Mots de passe</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        </form>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection
