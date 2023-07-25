@extends('master.master_table')

@section('title')
@endsection

<style>
    .image-wrapper {
        display: inline-block;
        margin-right: 10px;
    }

    .images {
        height: 147px;
    }

    .image-wrapper {
        padding: 5px;
    }

    .delete_icon {
        position: absolute;
        top: 0;
    }
</style>

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @if (session('valide'))
                <div class="alert alert-success alert-dismissible fade show col-sm-6" role="alert">
                    <strong>{{ session('valide') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('faild'))
                <div class="alert alert-denger alert-dismissible fade show col-sm-6" role="alert">
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
            <div class="row">
                <div class="col-md p-3 m-3">
                    <div class="card card-primary">
                        <form action="{{ Route('event.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName"> Coure Titre </label>
                                    <input tytitlepe="text" name="title" value="{{ $event->title }}" id="inputName"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Coure Description</label>
                                    <textarea id="inputDescription" name="description" class="form-control" rows="4">{{ $event->description }}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <label for="inputStatus">Programme de cour</label>
                                    <div class="">
                                        <textarea value="" id="summernote" name="programe">
                                        {{ $event->programe }}
                    </textarea>
                                    </div>
                                </div>
                                <!-- /.col-->


                                <label for="inputName" class="col-12 text-left"> Ajouter des images pour votre coure</label>

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
                                    @foreach ($event->images as $image)
                                        <img src="{{ asset('images/event/' . $image) }}" class="rounded mx-auto "
                                            id="images" style="height: 100px ; margin-left: 2px" alt="">
                                    @endforeach
                                </div>




                                <div class="input-group mb-3">
                                    <label for="inputName" class="col-12 text-left"> Ajouter un video pour votre
                                        coure</label>
                                    <div class="custom-file">
                                        <input type="file" name="video" class="custom-file-input"
                                            id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">choiser un video</label>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->



                            <button class="btn btn-block btn-outline-primary btn-lg w-25 m-auto"
                                type="submit">Changer</button>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->

    <script>
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
