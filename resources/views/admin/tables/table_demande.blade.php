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
                                        @foreach ($table_demande as $demnade)
                                            <tr>

                                                <td><img src="{{ asset('images/avatars/' . $demnade->avatar) }}"
                                                        alt="ensiengement_logo" height="72"></td>
                                                <td>{{ $demnade->name }}</td>
                                                <td>{{ $demnade->last_name }}</td>
                                                <td>{{ $demnade->email }}</td>
                                                <td>{{ $demnade->phone }}</td>
                                                <td>{{ $demnade->county }}</td>
                                                <td>
                                                    <a href="{{ asset('images/cin' . $demnade->cin) }}"
                                                        download="{{ asset('images/cin' . $demnade->cin) }}" download>
                                                        <i class="fa fa-download " style="font-size: 50px ; text-align: center"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ asset('images/cin' . $demnade->license) }}"
                                                        download="{{ asset('images/cin' . $demnade->license) }}" download>
                                                        <i class="fa fa-download " style="font-size: 50px ; text-align: center"
                                                            aria-hidden="true"></i>
                                                    </a>

                                                    <a></a>
                                                    {{--  <embed src="{{$demnade->license}}" type=""> --}}

                                                </td>
                                                <td>{{ $demnade->subject }}</td>
                                                <td>{{ $demnade->name_school }}</td>



                                                <td>
                                                    {{--  <a href="{{ route('enseignement.show' , Crypt::encrypt($demnade->id) ) }}" type="submit">Show</a> --}}
                                                    {{-- <div id="block" class="block">Click Me</div> --}}
                                                    <form action="{{ Route('enseignement.accepte', $demnade->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit"
                                                            class="btn bg-primary text-white">accepte</button>
                                                    </form>

                                                    {{--   <form action="{{ route('enseignement.update', $demnade->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input name='block' type="submit" class="block" >
                                </form> --}}

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
                    data: {
                        block: '1'
                    },
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
