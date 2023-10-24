@extends('master.blank_master_page')

@section('title')
@endsection


@section('content')
    <style>
        .select2-container .select2-selection--single {
            height: 39px;
        }
    </style>



    <div class="register-box">
        @if (session('failed'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('failed') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
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


    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>E-</b>classe</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Enregistrer Une Nouvelle Utilisateur</p>

            <form method="POST" action="{{ route('enseignement.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="input-group mb-3">
                    <img src="{{ asset('assets/images/project_images/default_avatar.png') }}" id="blah"
                        class="rounded mx-auto d-block mb-2" style="height: 200px;width:200px;" alt="your image">

                </div>



                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" name="avatar" onblur="getVal()" value="{{ old('avatar') }}"
                            class="custom-file-input input_image" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">choiser un photo de profille</label>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nom" name="name" value="{{ old('name') }}"
                        required autofocus autocomplete="name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>

                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="last_name" placeholder="Prenom"
                        value="{{ old('last_name') }}" required autofocus autocomplete="last_name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>

                </div>

                <!-- phone mask -->

                <div class="input-group mb-3">
                    <input type="text" name="phone" class="form-control" data-mask placeholder="Telephone"
                        data-inputmask='"mask": "(99) 999-99999"'value="{{ old('phone') }}" required autofocus
                        autocomplete="phone">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <!-- /.form group -->
                <div class="input-group mb-3 ">
                    {{--   <label class="form-label" for="form3Examplev2">Le sujet que vous
                        étudiez</label> --}}
                    <select class="form-control select2 h-100" value="{{ old('subject') }}" name="subject"
                        style="width: 100%;">
                        @foreach ($subject as $sujet)
                            {{--  <option value="Le sujet que vous étudiez"></option> --}}
                            <option value="{{ $sujet }}" @if (old('subject') == $sujet) selected @endif>
                                {{ $sujet }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- /.form group -->
                <div class="input-group mb-3 ">
                    {{--   <label class="form-label" for="form3Examplev2">Le sujet que vous
                        étudiez</label> --}}
                    <select class="form-control select2 h-100" value="{{ old('county_array') }}" name="county_array"
                        style="width: 100%;">
                        @foreach ($county_array as $county)
                            {{--  <option value="Le sujet que vous étudiez"></option> --}}
                            <option value="{{ $county }}" @if (old('subject') == $county) selected @endif>
                                {{ $county }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email"
                        value="{{ old('email') }}" required autocomplete="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Mot de passe" name="password" required
                        autocomplete="new-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Confirmer Mot de passe"
                        name="password_confirmation" required autocomplete="new-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">


                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <script>
        function getVal() {
            const val = document.getElementsByClassName('input_image').value;
            console.log(val);
        }
    </script>
@endsection
