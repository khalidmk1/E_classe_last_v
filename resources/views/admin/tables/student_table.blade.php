@extends('master.master_page')

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
                      
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($table_student as $student )
                        <tr>
                            <td><img src="{{asset('images/avatars/' .$student->avatar)}}" alt="ensiengement_logo" height="72" ></td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->last_name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->phone}}</td> 
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