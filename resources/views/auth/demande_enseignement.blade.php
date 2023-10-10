@extends('master.blank_master_page')

@section('title')
@endsection

@section('content')
    <style>
        span .select2-selection--single {
            height: 100% !important;
        }
    </style>


    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Conditions pour les étudiants</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <h5>Effective Date: 21/07/2023 </h5>

                    Ces termes et conditions régissent votre utilisation de E-Classe fournie par G-Code. En accédant ou en
                    utilisant la Plateforme, vous acceptez de vous conformer et d'être lié par ces Conditions. Si vous
                    n'êtes pas d'accord avec ces Conditions, veuillez ne pas utiliser la Plateforme.
                    <br>
                    <b> Eligibility and Registration</b>
                    <br>
                    1.1.You must meet the eligibility requirements set by the Company to become a registered teacher on the
                    Platform.
                    <br>
                    1.2.1.2. When registering, you agree to provide accurate, current, and complete information about
                    yourself.
                    <br>
                    1.3.1.3. You are responsible for maintaining the confidentiality of your account information and
                    password.
                    <br>
                    <b>Teacher Content and Responsibilities</b>
                    <br>
                    2.1. As a teacher on the Platform, you may create, upload, and share educational content with students.
                    <br>
                    2.2. You are responsible for the accuracy and quality of the content you provide and must ensure it
                    complies with all applicable laws and regulations.
                    <br>
                    2.3. You agree not to engage in any activity that may disrupt or interfere with the Platform's
                    functionality or the learning experience of students.
                    <br>
                    <b>Privacy</b>
                    <br>
                    3.1. We collect and use your personal information in accordance with our Privacy Policy, which is
                    incorporated into these Terms.
                    <br>
                    <b>Payment and Compensation</b>
                    <br>
                    4.1. Compensation for your services as a teacher will be governed by a separate agreement between you
                    and the Company.
                    <br>
                    4.2. You agree to provide accurate information regarding payment details, including tax information, as
                    required by applicable tax authorities.
                    <br>
                    <b>Termination</b>
                    <br>
                    5.1. We reserve the right to terminate or suspend your access to the Platform at our discretion, with or
                    without cause.
                    <br>
                    5.2. You may terminate your teacher account by contacting us.
                    <br>
                    <b>Modifications to Terms</b>
                    <br>
                    6.1. We may update or modify these Terms at any time, and any changes will be effective immediately upon
                    posting.
                    <br>
                    6.2. You are responsible for reviewing these Terms regularly.
                    <br>
                    <b> Intellectual Property</b>
                    <br>
                    7.1. You retain ownership of the content you create as a teacher, but you grant the Company a license to
                    use, display, and distribute the content on the Platform.
                    <br>
                    7.2. You may not use or distribute any content that infringes upon the intellectual property rights of
                    others.
                    <br>
                    <b>Limitation of Liability</b>
                    <br>
                    8.1. We are not liable for any direct, indirect, incidental, consequential, or special damages resulting
                    from your use of the Platform.
                    <br>

                    <b>Governing Law</b>
                    <br>
                    9.1. These Terms are governed by the laws of Moroccan Kingdom.
                    <br>
                    <b>Contact Information</b>
                    <br>
                    10.1. For questions or concerns regarding these Terms, please contact us at <a href="">
                        EclassePlatform@gmail.com</a>.
                    <br>

                    By using the Platform as a teacher, you acknowledge that you have read, understood, and agreed to these
                    Terms and any applicable policies or guidelines. If you do not agree to these Terms, please do not use
                    the Platform as a teacher.</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <section class="h-100 h-custom gradient-custom-2">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
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
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                @error('cin')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
                @error('license')
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

                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <form action="{{ Route('enseignement.send_demand') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row g-0">
                                <div class="col-lg-6 content_register">
                                    <div class="p-5">
                                        <h3 class="fw-normal mb-5" style="color: #4835d4;">Informations générales
                                        </h3>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <img src="{{ asset('assets/images/project_images/default_avatar.png') }}"
                                                        id="blah" class="rounded mx-auto d-block mb-2"
                                                        style="height: 200px;width:200px;" alt="your image">

                                                </div>
                                            </div>
                                            <div class="form-group mb-4 pb-2  w-100">

                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="avatar" class="custom-file-input"
                                                            id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile3">choiser
                                                            un photo de profille</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6 mb-4 pb-2">

                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Nom"
                                                        name="name" value="{{ old('name') }}" required autofocus
                                                        autocomplete="name">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-user"></span>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="last_name"
                                                        placeholder="Prenom" value="{{ old('last_name') }}" required
                                                        autofocus autocomplete="last_name">

                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-user"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>




                                        <div class="mb-4 pb-2">
                                            <div class="input-group mb-3">
                                                <input type="email" class="form-control" placeholder="Email"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="username">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-envelope"></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- phone mask -->
                                        <div class="mb-4 pb-2">
                                            <div class="form-group">


                                                <div class="input-group flex-row-reverse">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                    </div>
                                                    <input type="text" name="phone" class="form-control"
                                                        data-inputmask='"mask": "(99) 999-99999"' data-mask
                                                        placeholder="Telephone" required autocomplete="phone"
                                                        value="{{ old('phone') }}">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->

                                        </div>

                                        <div class="mb-4 pb-2">
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" placeholder="Mot de passe"
                                                    name="password" required autocomplete="new-password">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="mb-4 pb-2">
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control"
                                                    placeholder="Confirme password" name="password_confirmation" required
                                                    autocomplete="new-password">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>






                                    </div>
                                </div>


                                <div class="col-lg-6 bg-indigo text-white">
                                    <div class="p-5">
                                        <h3 class="fw-normal mb-5">Form Détails</h3>
                                        <!-- /.form-group -->


                                        <div class="form-group">
                                            <label class="form-label" for="form3Examplev2">ville</label>
                                            <select class="form-control select2" name="county" style="width: 100%;">
                                                @foreach ($county_array as $country)
                                                    <option value="{{ $country }}"
                                                        @if (old('county') == $country) selected @endif>
                                                        {{ $country }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>



                                        <!-- select subject -->


                                        <div class="mb-4 pb-2">
                                            <label class="form-label" for="form3Examplev2">Le sujet que vous
                                                étudiez</label>
                                            <select class="form-control select2 h-100" value="{{ old('subject') }}"
                                                name="subject" style="width: 100%;">
                                                @foreach ($subject as $sujet)
                                                    <option value="{{ $sujet }}"
                                                        @if (old('subject') == $sujet) selected @endif>
                                                        {{ $sujet }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="input-group mb-3">
                                            <label class="form-label col-12" for="form3Examplev2">Ajouter photo de
                                                cin</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="cin" class="custom-file-input"
                                                    id="inputGroupFile01" value="{{ old('cin') }}"
                                                    aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                    file</label>
                                            </div>
                                        </div>




                                        <div class="input-group mb-3">
                                            <label class="form-label col-12" for="form3Examplev2">Ajouter photo de
                                                license</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="license" class="custom-file-input"
                                                    value="{{ old('license') }}" id="inputGroupFile01"
                                                    aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                    file</label>
                                            </div>
                                        </div>





                                        <!-- select -->
                                        <div class="form-group  mb-4 pb-2">
                                            <label>statut du travail</label>
                                            <select id="myselect" value="{{ old('work_status') }}" name="work_status"
                                                class="form-control">
                                                <option value="">Select an option</option>
                                                <option value="je travailler">je travailler</option>
                                                <option value="sans emploi">sans emploi</option>
                                                <option value="à la retraite">à la retraite</option>

                                            </select>
                                        </div>




                                        <!-- text input -->
                                        <div class="form-group mb-4 pb-2" id="status_select">
                                            <label>Nom de etablisement</label>
                                            <input name="name_school" value="{{ old('name_school') }}" type="text"
                                                class="form-control" placeholder="Entrez ..." required autofocus
                                                autocomplete="name_school">
                                        </div>
                                    </div>



                                    <div class="form-check d-flex justify-content-start mb-4 pb-3">
                                        <input class="form-check-input me-3" name="terms" value="agree"
                                            type="checkbox" id="form2Example3c" />
                                        <label class="form-check-label text-white" for="form2Example3">

                                            J'accepte <a href="" class="text-white" data-toggle="modal"
                                                data-target="#modal-default"><u>les termes et conditions</u></a> de votre
                                            site.
                                        </label>
                                    </div>

                                    <button type="submit" class="btn btn-light btn-lg mb-3"
                                        data-mdb-ripple-color="dark">Register</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection
