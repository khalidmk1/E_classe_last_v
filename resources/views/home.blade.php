@extends('master.master_page')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if (auth()->user()->role == 'admin')
                        <h2 class="m-0">Administrateur</h2>
                    @elseif (auth()->user()->role == 'prof')
                        <h2 class="m-0">Enseignement</h2>
                    @else
                        <h2 class="m-0">Etudiant</h2>
                    @endif

                </div><!-- /.col -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show col-sm-6" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
            <!-- Info boxes -->
            <div class="row p-3">
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'student')
                    <div class="col-12 col-sm-6 col-md-3">

                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-graduate"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Nombre des Professeurs</span>
                                <span class="info-box-number">

                                    {{ App\Models\User::where('role', 'prof')->count() }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                @endif

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Nomber des cours</span>
                            @if (auth()->user()->role == 'prof')
                                <span
                                    class="info-box-number">{{ App\Models\event::where('user_id', auth()->user()->id)->get()->count() }}</span>
                            @else
                                <span class="info-box-number">{{ App\Models\event::all()->count() }}</span>
                            @endif

                        </div>
                        <!-- /.info-box-content -->

                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'prof')
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Nomber des Etudiant</span>
                                <span
                                    class="info-box-number">{{ App\Models\User::where('role', 'student')->count() }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                @endif

            </div>
            <!-- /.row -->

            <!-- Main row -->
            <div class="row ">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">


                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                To Do List
                            </h3>

                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <ul class="todo-list" data-widget="todo-list">
                                @foreach ($lists as $list )
                                <li class="d-flex align-items-center justify-content-between">
                                      <!-- todo text -->
                                      <span class="text">{{$list->description}}</span>
                                      <!-- Emphasis label -->
                                      <small class="badge badge-danger"><i class="far fa-clock"></i> {{$list->created_at->format('H:i')}}</small> 
                                  </li>
                                @endforeach
                               
                               
                                
                                
                                
                                
                            </ul>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="{{route('todo.user')}}" type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i>Todo</a>
                        </div>
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
