@extends('master.master_table')

@section('title')
    
@endsection


@section('content')

    <!-- Main content -->
    <section class="content mt-3">
        <div class="container-fluid">
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
                      <th>Action</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user )
                        <tr>
                           {{--  <td><img src="{{asset('images/avatars/' .$user->id)}}" class="rounded mx-auto d-block" height="100" alt="enseignement_img"></td> --}}
                            <td>{{$user->event->user->name}}</td>
                           {{--  <td>{{$user->->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td> 
                            <td>

                              <a class="btn btn-block  btn-outline-primary m-2"
                                  href="{{ route('profiles.show', $user->id) }}"
                                  type="submit">Show</a>


                              <form action="{{ route('table.update', $user->id) }}" method="post">
                                  @csrf
                                  @method('PUT')
                                  <input value="Accepté" name="accepte" type="submit"
                                      class="btn btn-block btn-outline-danger m-2">
                              </form>


                          </td> --}}
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
    
@endsection