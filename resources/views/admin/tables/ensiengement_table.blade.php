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
                                <a href="{{ route('table.show' , Crypt::encrypt($prof->id) ) }}" type="submit">Show</a>
                                {{-- <div id="block" class="block">Click Me</div> --}}
                               {{--  <form action="{{ Route('enseignement.update' ,$prof->id) }}" method="post">
                                  @csrf
                                  @method('PUT')
                                  <input type="submit" value="block" class="btn bg-primary text-white">
                                  </form> --}}

                                  <form action="{{ route('table.update', $prof->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input value="1" type="submit" class="block" placeholder="block" >
                                </form>

                               {{--  <a href="{{ Route('enseignement.update' , Crypt::encrypt($prof->id)) }}" type="submit">block</a> --}}
                               {{--  <a href="#" type="submit" class="block-link" data-id="{{ $prof->id }}">Block</a> --}}
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
  $('#block').click(function() {
    // Send an AJAX request to update the column
    $.ajax({
      url: 'table/enseignement/{$prof->id} ',
      method: 'PUT',
      data: { block: '1' },
      success: function(response) {
        console.log('Column updated successfully');
      },
      error: function(xhr, status, error) {
        console.error('Error updating column:', error);
      }
    });
  });
});

</script>

@endsection