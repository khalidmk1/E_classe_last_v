@extends('master.blank_master_page')

@section('title')
  
@endsection


@section('content')





<div class="register-box">

  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>E-</b>classe</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Enregistrer une nouvelle utilisateur</p>

      <form  action="{{Route('enseignement.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf


        <div class="input-group mb-3">
          <img src="{{asset('assets/images/project_images/default_avatar.png')}}"  id="blah" class="rounded mx-auto d-block mb-2"  style="height: 200px;width:200px;" alt="your image" >
          
      </div>

        <div class="input-group mb-3">
          <div class="custom-file">
            <input type="file" name="avatar" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">choiser un photo de profille</label>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nom" 
          name="name" value="{{old('name')}}" required autofocus autocomplete="name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @error('nom')
          <div class="text-danger mx-4 mb-2 ereur_style">{{ $message }}</div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="last_name" placeholder="Prenom"
          value="{{old('last_name')}}" required autofocus autocomplete="last_name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @error('last_name')
          <div class="text-danger mx-4 mb-2 ereur_style">{{ $message }}</div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" 
          name="email" value="{{old('email')}}" required autocomplete="username" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
          <div class="text-danger mx-4 mb-2 ereur_style">{{ $message }}</div>
          @enderror
        </div>

         <!-- phone mask -->
        <div class="input-group mb-3">
          <input type="text" name="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' 
          data-mask placeholder="Telephone" value="{{old('phone')}}" required autofocus autocomplete="phone">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
          @error('phone')
          <div class="text-danger mx-4 mb-2 ereur_style">{{ $message }}</div>
          @enderror
        </div>

       
        {{-- <div class="input-group mb-3">
          <div class="form-group">
            <div class="input-group flex-row-reverse">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input type="text" name="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask placeholder="Telephone" 
              required autofocus autocomplete="phone">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->
        </div> --}}


        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Mot de passe"  
          name="password" required autocomplete="new-password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
          <div class="text-danger mx-4 mb-2 ereur_style">{{ $message }}</div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirmer Mot de passe"
          name="password_confirmation" required autocomplete="new-password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
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
  // Get the input file element
  var input = document.getElementById("exampleInputFile");
  
  // Add an event listener to listen for file selection
  input.addEventListener("change", function(event) {
    // Get the selected file
    var file = event.target.files[0];
    
    // Create a FileReader object to read the file
    var reader = new FileReader();
    
    // Set the callback function when the file is loaded
    reader.onload = function(e) {
      // Get the loaded image data as a data URL
      var imageData = e.target.result;
      
      // Get the image element
      var image = document.getElementById("blah");
      
      // Set the image source to the loaded data URL
      image.src = imageData;
    };
    
    // Read the selected file as data URL
    reader.readAsDataURL(file);
  });
</script>
@endsection







