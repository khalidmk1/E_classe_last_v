@extends('master.master_page')

@section('title')
    
@endsection


@section('content')



<div class="wrapper">
    <!-- Main content -->
    <section class="content mt-3">
        <div class="container-fluid">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{ session('success')}}</strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif

          <div class="row">
            <div class="col-12">
        
              <div class="card">
              
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Logo</th>
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>Email</th>
                      <th>Numero telephone</th>
                      <th>ville</th>
                      <th>CIN</th>
                      <th>license</th>
                      <th>Matière</th>
                      <th>Nom de ecole</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($table_prof as $prof )
                        <tr>
                            <td><img src="{{asset('images/avatars/' .$prof->avatar)}}" alt="ensiengement_logo" height="72" ></td>
                            <td>{{$prof->name}}</td>
                            <td>{{$prof->last_name}}</td>
                            <td>{{$prof->email}}</td>
                            <td>{{$prof->phone}}</td>
                            <td>{{$prof->county}}</td>
                            <td>cin</td>
                            <td>license</td>
                            <td>{{$prof->subject}}</td>
                            <td>{{$prof->name_school}}</td>
                            <td>
                                <a href="{{ route('enseignement.show' , $prof) }}" type="submit">Show</a>
                                {{-- <a href="{{ route(' enseignement.update' , $prof) }}" type="submit">block</a> --}}
                                <a href="#" type="submit" class="block-link" data-id="{{ $prof->id }}">Block</a>
                            </td>
                            
                          </tr>
                        @endforeach
                    
                    
                    </tbody>
                    
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
</div>


<script>
    function blockUser(event) {
        event.preventDefault();
        var userId = $(this).data('id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/enseignement/' + userId,
            type: 'PUT',
            dataType: 'json',
            success: function(response) {
                // Handle the success response
                // For example, update the necessary elements on the page
                console.log('User blocked successfully');
                window.location.reload();
            },
            error: function(xhr, status, error) {
                // Handle the error response
                console.log('Error blocking user: ' + error);
            }
        });
    }

    $(document).ready(function() {
        $('.block-link').on('click', blockUser);
    });
</script>


@endsection