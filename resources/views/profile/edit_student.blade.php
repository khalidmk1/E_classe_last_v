@extends('master.master_landing_page')

@section('title')
@endsection

@section('content')
    <style>
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


                            {{--  <!-- /.form group -->
                            <div class="form-group">
                                <label class="form-label" for="form3Examplev2">ville</label>
                                <select class="form-control select2"  name="county" style="width: 100%;">
                                    @foreach ($county_array as $country)
                                        <option value="{{ $country }}" @if (old('county') == $country) selected @endif>{{ $country }}
                                        </option>
                                    @endforeach
                                </select>
                            </div> --}}

                            {{-- <div class="mb-4 pb-2">
                                <label class="form-label" for="form3Examplev2">ville</label>
                                <select class="form-control select2" name="county" style="width: 100%;">
                                   
                                    @foreach ($county_array as $county)
                                        <option value="{{ $county }}">{{ $county }}
                                        </option>
                                    @endforeach
                                </select>
                            </div> --}}


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

    <!-- /.content -->

@endsection
