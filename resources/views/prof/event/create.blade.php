@extends('master.master_table')

@section('title')
@endsection

<style>
    .image-wrapper {
  display: inline-block;
  margin-right: 10px;
}

.images{
    height: 147px;
}

.image-wrapper{
    padding: 5px;
}
.delete_icon{
    position: absolute;
    top: 0;
}
</style>

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
        <div class="row">
            <div class="col-md p-3 m-3">
                <div class="card card-primary">
                    <form action="{{ Route('event.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName"> Coure Titre </label>
                                <input type="text" name="title" id="inputName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Coure Description</label>
                                <textarea id="inputDescription" name="description" class="form-control" rows="4"></textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="inputStatus">Programme de cour</label>
                                <div class="">
                                    <textarea id="summernote" name="programe">
                      Ecrire <em>ici</em> <u>le</u> <strong>Programme</strong>
                    </textarea>
                                </div>
                            </div>
                            <!-- /.col-->


                            <label for="inputName" class="col-12 text-left"> Ajouter des images pour votre coure</label>
                           {{--  <div class="col-md-12">

                                <div class="card card-default">
                                    <div class="card-body">
                                        <div id="actions" class="row">
                                            <div class="col-lg-6">
                                                <div class="btn-group w-100">
                                                    <span class="btn btn-success col fileinput-button">
                                                        <i class="fas fa-plus"></i>
                                                        <span>Add files</span>
                                                    </span>
                                                    <button type="submit" class="btn btn-primary col start">
                                                        <i class="fas fa-upload"></i>
                                                        <span>Start upload</span>
                                                    </button>
                                                    <button type="reset" class="btn btn-warning col cancel">
                                                        <i class="fas fa-times-circle"></i>
                                                        <span>Cancel upload</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex align-items-center">
                                                <div class="fileupload-process w-100">
                                                    <div id="total-progress" class="progress progress-striped active"
                                                        role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                                        aria-valuenow="0">
                                                        <div class="progress-bar progress-bar-success" style="width:0%;"
                                                            data-dz-uploadprogress></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table table-striped files" id="previews">
                                            <div id="template" class="row mt-2">
                                                <div class="col-auto">
                                                    <span class="preview"><img src="data:," alt=""
                                                            data-dz-thumbnail /></span>
                                                </div>
                                                <div class="col d-flex align-items-center">
                                                    <p class="mb-0">
                                                        <span class="lead" data-dz-name></span>
                                                        (<span data-dz-size></span>)
                                                    </p>
                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                </div>
                                                <div class="col-4 d-flex align-items-center">
                                                    <div class="progress progress-striped active w-100" role="progressbar"
                                                        aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                        <div class="progress-bar progress-bar-success" style="width:0%;"
                                                            data-dz-uploadprogress></div>
                                                    </div>
                                                </div>
                                                <div class="col-auto d-flex align-items-center">
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary start">
                                                            <i class="fas fa-upload"></i>
                                                            <span>Start</span>
                                                        </button>
                                                        <button data-dz-remove class="btn btn-warning cancel">
                                                            <i class="fas fa-times-circle"></i>
                                                            <span>Cancel</span>
                                                        </button>
                                                        <button data-dz-remove class="btn btn-danger delete">
                                                            <i class="fas fa-trash"></i>
                                                            <span>Delete</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                                <!-- /.card -->
                            </div> --}}


                          {{--   <div class="col-12">
                                <input type="file"  id="fileInput" multiple>
                                <div id="imageContainer"></div>
                                <button id="submitImages"> click</button>
                            </div> --}}

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                  <input type="file" name="images[]" class="custom-file-input" id="inputGroupFile01" multiple>
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
                                    <input type="file" name="video" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">choiser un video</label>
                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->

                        <button class="btn btn-block btn-outline-primary btn-lg" type="submit">Submit</button>
                    </form>
                </div>
                <!-- /.card -->
            </div>



            {{--  <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Create new Project" class="btn btn-success float-right">
        </div>
      </div> --}}
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
