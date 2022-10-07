<!DOCTYPE html>
<html>
<head>
  <title>Laravel 9 DataTables Example</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">
     
 $(document).ready( function () {
    $('#yajra-datatables-example').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('usingyajradatatables') }}",
           columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'subscrioption', name: 'subscrioption' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },

                 ]
       });

       $("body").on('click','.delete_button',function(){
         $.when(
            $.ajax({
               url: "{{ url('deletedataemail') }}",
               data:{id:$(this).val()},
            }),
            
            $.ajax({
            url: "{{ url('deletetabledata') }}",
            data:{id:$(this).val()},
         }),

         ).done(function(){
               var oTable = $('#yajra-datatables-example').dataTable();
               oTable.fnDraw(false);   
         });
       });

       $("#add_button").click(function(){
         window.open("{{url('form')}}",'_self');
       });

       $("body").on('click','.edit_button',function(){
         var id=$(this).val();
         window.open("{{url('update')}}/"+id,'_self');
       });
    });
</script>

</head>
<body>

<div class="container mt-4">

  <div class="card">

    <div class="card-header text-center font-weight-bold">
      <h2>Laravel 9 DataTables Example Tutorial</h2>
      <button type="button" id="add_button">add</button>
    </div>
    
    <div class="card-body">

        <table class="table table-bordered" id="yajra-datatables-example">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Email</th>
                 <th>Created at</th>
                 <th>Subscrioption End</th>
                 <th>Action</th>
              </tr>
           </thead>
        </table>

    </div>

  </div>

</div>  
</body>
</html>