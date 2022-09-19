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
                    { data: 'phone', name: 'phone' }
                 ]
       });
    });
</script>

</head>
<body>

<div class="container mt-4">

  <div class="card">

    <div class="card-header text-center font-weight-bold">
      <h2>Laravel 9 DataTables Example Tutorial</h2>
    </div>

    <div class="card-body">

        <table class="table table-bordered" id="yajra-datatables-example">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Email</th>
                 <th>Phone</th>
              </tr>
           </thead>
        </table>

    </div>

  </div>

</div>  
</body>
</html>