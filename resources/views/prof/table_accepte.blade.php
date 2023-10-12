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
                      <th>Coure</th>
                      <th>Action</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user )
                        <tr>
                            <td><img src="{{asset('images/avatars/' .$user->user->avatar)}}" class="rounded mx-auto d-block" height="100" alt="enseignement_img"></td>
                            <td>{{$user->user->name}}</td>
                            <td>{{$user->user->last_name}}</td>
                            <td>{{$user->user->email}}</td>
                            <td>{{$user->user->phone}}</td> 
                            <td>{{$user->event->title}}</td> 
                            <td>

                              <a class="btn btn-block  btn-outline-primary m-2"
                                  href="{{ route('profile.show', $user->user->id) }}"
                                  type="submit">Show</a>


                              <form action="{{ route('accepte.folow', $user->id) }}" method="post">
                                  @csrf
                                  @method('PUT')
                                  <button type="submit"
                                  class="btn btn-block btn-outline-success m-2" >
                                    Accepté
                                  </button >
                               
                              </form>


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
      
    
@endsection