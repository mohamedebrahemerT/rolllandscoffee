 


     
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">




     <div class="col-md-10 col-md-offset-1" style="margin-top:50px">
            <div class="panel panel-default">
                <div class="panel-heading">Data Table Demo</div>

                <div class="panel-body">
                    <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
                        <thead>
                            <tr>
                               
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>



<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('datatable/getdata') }}',
        columns: [
         
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
        ]
    });
});
</script>



   

 
  

























