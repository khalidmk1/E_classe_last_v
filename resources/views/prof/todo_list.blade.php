@extends('master.master_page')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content mt-5 p-3">
        <div class="container-fluid">
            <!-- TO DO List -->
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title col-1">
                        <i class="ion ion-clipboard mr-1"></i>
                        To Do List
                    </h3>
                    <form method="POST" action="{{ route('todos.store') }}" class="add-items col-11 d-flex w-100">


                        @csrf
                        <input type="text" class="form-control todo-list-input"
                            placeholder="What do you need to do today?">
                        <button class="add btn btn-primary font-weight-bold todo-list-add-btn" id="create_list">Add</button>


                    </form>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <ul class="todo-list" id="list" data-widget="todo-list">



                    </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add
                        item</button>
                </div>
            </div>
            <!-- /.card -->
        </div>




    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>


        $(document).on('click', '#delete-todo', function(e) {
            e.preventDefault()

            var url_drop = "{{ route('todos.delete', ':id') }}";
            var listId = $('#delete-todo').data('list-id');
            url_drop = url_drop.replace(':id', listId)
            // Find the parent <li> element to identify the to-do item.
            var listItem = $(this).closest("li");

            // Get the ID or other identifier of the to-do item.
            var itemId = listItem.data("list-id"); // Adjust this based on your HTML structure.

            console.log('hello');

            // Send an AJAX request to delete the item.
            $.ajax({
                url: url_drop, // Replace with your actual delete route.
                type: "DELETE", // Or use "POST" with a "_method" field to override the HTTP method.
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    console.log(response.message);
                    // Handle the success response, which can include a confirmation message.
                    listItem.remove(); // Remove the item from the list on success.
                },
                error: function(error) {
                    // Handle errors (e.g., show an error message).
                    console.error(error);
                },
            });
        });

        $(document).ready(function() {

            function get_list() {

                $.ajax({
                    type: 'get',
                    url: "{{ route('todos.list') }}",
                    success: function(data, index) {
                        var processedIds = []; 
                        data.forEach(element => {
                            var todo_id = element.id;

                            
                           
                            var listItem = $(
                                '<li id="todo-list"> </li>'); // Create a new list item.
                               

                            // Create and set unique IDs for this list item's components.
                            var checkboxId = 'todoCheck1_' + index;
                            var listId = 'list_' + index;
                            var timeId = 'time_' + index;
                            if (processedIds.indexOf(todo_id) === -1) {
                                processedIds.push(todo_id);

                                listItem.html(`
      
      <span class="text" id="${listId}">${element.description}</span>
      <small class="badge badge-danger" style="float: right;" id="${timeId}">${calculateTimeDifference(element.created_at)}</small>
      <div class="tools">
      

          <form  method="post" >
                                  @csrf
                                  @method('DELETE')
                                  
                                  <button class="btn btn-danger btn-sm rounded-0" id="delete-todo"  type="submit" data-list-id="${element.id}"><i
                                          class="fa fa-trash"></i></button>
                              </form>

                          </div>
  `); 

                    }


     

                    // Append the list item to the to-do list.
                  
                            $('#list').append(listItem);





                        });



                        function calculateTimeDifference(serverTimestamp) {
                            var createdAt = new Date(serverTimestamp);
                            var now = new Date();

                            var timeDiffInMilliseconds = now - createdAt;
                            var timeDiffInMinutes = Math.floor(timeDiffInMilliseconds / (1000 * 60));

                            if (timeDiffInMinutes < 1) {
                                return "just now";
                            } else if (timeDiffInMinutes === 1) {
                                return "1 min ago";
                            } else if (timeDiffInMinutes < 60) {
                                return timeDiffInMinutes + " mins ago";
                            } else if (timeDiffInMinutes < 1440) {
                                return Math.floor(timeDiffInMinutes / 60) + " hours ago";
                            } else {
                                return Math.floor(timeDiffInMinutes / 1440) + " days ago";
                            }
                        }




                    },
                })
            }
            get_list()
            $('#create_list').click(function(e) {
                e.preventDefault();
                var description = $('.todo-list-input').val();
                console.log(description);
                /*  var csrfToken = $('meta[name="csrf-token"]').attr('content'); */

                $.ajax({
                    url: "{{ route('todos.store') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "description": description
                    },
                    success: function(response) {
                        // Handle the success response (e.g., display a message)
                        console.log(response);
                        get_list()
                    },
                    error: function(error) {
                        // Handle errors (e.g., validation errors)
                        console.log(error);
                    }
                });
            });







        });
    </script>
@endsection
