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
                        @foreach ($table_student as $student )
                        <tr>
                            <td><img src="{{asset('images/avatars/' .$student->avatar)}}" class="rounded mx-auto d-block" height="100" alt="enseignement_img"></td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->last_name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->phone}}</td> 
                            <td>

                              <a class="btn btn-block  btn-outline-primary m-2"
                                  href="{{ route('profiles.show', $student->id) }}"
                                  type="submit">Show</a>


                              <form action="{{ route('table.update', $student->id) }}" method="post">
                                  @csrf
                                  @method('PUT')
                                  <input value="block" name="block" type="submit"
                                      class="btn btn-block btn-outline-danger m-2">
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