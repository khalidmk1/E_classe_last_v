@extends('master.master_page')

@section('title')
@endsection



@section('content')

   
    <!-- Main content -->
    <section class="content">

        @if (session('valide'))
            <div class="alert alert-success alert-dismissible fade show col-sm-6" role="alert">
                <strong>{{ session('valide') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('faild'))
            <div class="alert alert-danger alert-dismissible fade show col-sm-6" role="alert">
                <strong>{{ session('faild') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @error('title')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('price')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('description')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('programe')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('images[]')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
        @error('video')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror

        <div class="container-fluid">



            <div class="row ">
                <div class="col-md p-3  m-3">
                    <div class="card card-primary pb-4">
                        <form action="{{ Route('event.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group d-flex">
                                    <div class="col-6">
                                        <label for="inputName"> Coure Titre </label>
                                        <input tytitlepe="text" value="{{ old('title') }}" name="title" id="inputName"
                                            class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label for="inputName_2"> Prix </label>
                                        <input tytitlepe="text" id="inputName_2" value="{{ old('price') }}" name="price"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Date and time:</label>
                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                            data-target="#reservationdatetime" name="date" />
                                        <div class="input-group-append" data-target="#reservationdatetime"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="selected">Niveau</label>
                                    <select class="form-control select2" name="niveau" style="width: 100%; height: 100px;">
                                        @foreach ($niveau as $niv)
                                            <option value="{{ $niv }}"
                                                @if (old('subject') == $niv) selected @endif>
                                                {{ $niv }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="selected">Matière</label>
                                    <select class="form-control select2" name="subject"
                                        style="width: 100%; height: 100px;">
                                        @foreach ($subject as $sub)
                                            <option value="{{ $sub }}"
                                                @if (old('subject') == $sub) selected @endif>
                                                {{ $sub }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>










                                <div class="form-group">
                                    <label for="inputDescription">Coure Description</label>
                                    <textarea id="inputDescription" name="description" class="form-control" rows="4">
                                        {{ old('description') }}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <label for="inputStatus">Programme De Cour</label>
                                    <div class="">
                                        <textarea id="summernote" aria-valuetext="{{ old('programe') }}" name="programe">
                                            {{ old('description') }}
                        </textarea>
                                    </div>
                                </div>
                                <!-- /.col-->


                                <label for="inputName" class="col-12 text-left"> Ajouter des images pour votre
                                    coure</label>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="images[]" class="custom-file-input"
                                            id="inputGroupFile01" multiple>
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div id="imageContainer"></div>
                                </div>

                                <div class="col-12">
                                    <img src="" id="images" alt="">
                                </div>


                                <div class="input-group mb-3">
                                    <label for="inputName" class="col-12 text-left"> Ajouter un video pour votre$

                                        coure</label>
                                    <div class="custom-file">
                                        <input type="file" name="video" class="custom-file-input"
                                            id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">choiser un video</label>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <button class="btn btn-block btn-outline-primary btn-lg w-25 m-auto "
                                type="submit">Crée</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card -->

        </div>



    </section>
    <!-- /.content -->

    {{--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}

    <script>
        /* $(document).ready(function() {
                    // Initialize the Select2 control
                    $('#selected').select2();

                    // Cache selectors for select elements
                    var $select1 = $('#select_1');
                    var $select2 = $('#select_2');

                    // Add an event listener to the select element
                    $('#selected').on('change', function() {
                        // Get the selected value
                        var selectedValue = $(this).val();

                        // Hide both select elements by default
                        $select1.hide();
                        $select2.hide();

                        switch (selectedValue) {
                            case 'Alabama':
                                $select1.show();
                                break;
                            case 'Alaska':
                                $select2.show();
                                break;
                            default:
                                $select2.hide();
                        }
                        // Display the selected value in the console
                        console.log('Selected Value: ' + selectedValue);
                    });
                });
         */

        const fileInput = document.getElementById('inputGroupFile01');
        const imageContainer = document.getElementById('imageContainer');

        fileInput.addEventListener('change', (event) => {
            const files = event.target.files;

            // Clear previous images
            imageContainer.innerHTML = '';

            // Iterate through each selected file
            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                const reader = new FileReader();

                reader.onload = (e) => {
                    const imgContainer = document.createElement('div');
                    imgContainer.className = 'image-wrapper';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Image';
                    img.className = 'images'
                    imgContainer.appendChild(img);




                    const deleteBtn = document.createElement('div');
                    deleteBtn.innerHTML = '<i class="fa fa-trash delete_icon" aria-hidden="true"></i>';

                    deleteBtn.addEventListener('click', () => {
                        imgContainer.remove();
                    });
                    imgContainer.appendChild(deleteBtn);

                    imageContainer.appendChild(imgContainer);
                };

                // Read the file as a data URL
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
