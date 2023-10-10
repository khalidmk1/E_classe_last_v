@extends('master.master_table')

@section('title')
@endsection


@section('content')
    <div class="wrapper">
        <!-- Main content -->
        <section class="content mt-3">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
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
                                        @foreach ($table_prof as $prof)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('images/avatars/' . $prof->avatar) }}"
                                                        class="rounded mx-auto d-block" height="100"
                                                        alt="enseignement_img">
                                                </td>
                                                <td>{{ $prof->name }}</td>
                                                <td>{{ $prof->last_name }}</td>
                                                <td>{{ $prof->email }}</td>
                                                <td>{{ $prof->phone }}</td>
                                                <td>{{ $prof->county }}</td>
                                                <td>
                                                    <a href="{{ asset('images/cin' . $prof->cin) }}"
                                                        download="{{ asset('images/cin' . $prof->cin) }}" download>
                                                        <i class="fa fa-download "
                                                            style="font-size: 50px ; text-align: center"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ asset('images/cin' . $prof->license) }}"
                                                        download="{{ asset('images/cin' . $prof->license) }}" download>
                                                        <i class="fa fa-download "
                                                            style="font-size: 50px ; text-align: center"
                                                            aria-hidden="true"></i>
                                                    </a>

                                                    <a></a>
                                                    {{--  <embed src="{{$demnade->license}}" type=""> --}}

                                                </td>
                                                <td>{{ $prof->subject }}</td>
                                                <td>{{ $prof->name_school }}</td>
                                                <td>

                                                    <a class="btn btn-block  btn-outline-primary m-2"
                                                        href="{{ route('profiles.show', $prof->id) }}"
                                                        type="submit">Show</a>

                                                    @if ($prof->block == false)
                                                        <form action="{{ route('table.update', $prof->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input value="block" name="block" type="submit"
                                                                class="btn btn-block btn-outline-danger m-2">
                                                        </form>
                                                    @else
                                                        <form action="{{ route('table.unblock', $prof->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input value="unblock" name="unblock" type="submit"
                                                                class="btn btn-block btn-outline-danger m-2">
                                                        </form>
                                                    @endif




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
@endsection
