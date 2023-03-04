<!DOCTYPE html>
<html>
 <head>
  <title>Ajax Dynamic Dependent Dropdown in Laravel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
  </style>
 </head>
 <body>
              
  <div class="container">
    <div class="row">
     
         <h3 align="center">Ajax Dynamic Dependent Dropdown in Laravel</h3><br />
   <div class="form-group">
    <select name="country" id="country" class="form-control input-lg dynamic" data-dependent="state">
     <option value="">Select Country</option>
     @foreach($country_list as $country)
     <option value="{{ $country->country}}">{{ $country->country }}</option>
     @endforeach
    </select>
   </div>
   <br />
   <div class="form-group">
    <select name="state" id="state" class="form-control input-lg dynamic" data-dependent="city">
     <option value="">Select State</option>
    </select>
   </div>
   <br />
   <div class="form-group">
    <select name="city" id="city" class="form-control input-lg">
     <option value="">Select City</option>
    </select>
   </div>
   {{ csrf_field() }}
   <br />
   <br />
        
      

     
        <!-- Trigger the modal with a button -->
   
        <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">Add</button>
    

  <!-- Modal -->
<div id="country_model" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="country_form">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Add Data</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Enter country</label>
                        <input type="text" name="country" id="country" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Enter   state</label>
                        <input type="text" name="state" id="state" class="form-control" />
                    </div>
                      <div class="form-group">
                        <label>Enter  city</label>
                        <input type="text" name="city" id="city" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                     <input type="hidden" name="id" id="id" value="" />
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

        
      
      
    </div>
    
  </div>

  
      
   
 </body>
</html>

<script>
$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('dynamicdependent.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }

   })
  }
 });

 $('#country').change(function(){
  $('#state').val('');
  $('#city').val('');
 });

 $('#state').change(function(){
  $('#city').val('');
 });
 

});
</script>


 <script type="text/javascript">
          $('#add_data').click(function(){
        $('#country_model').modal('show');
        $('#country_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('insert');
        $('#action').val('Add');
        $('.modal-title').text('Add Data');
    });

    $('#country_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
       
        $.ajax({
            url:"{{ route('country.insert') }}",
            method:"POST",
            data:form_data,
            dataType:"json",
            success:function(data)
            {
                if(data.error.length > 0)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                    }
                    $('#form_output').html(error_html);
                }
                else
                {
                    $('#form_output').html(data.success);
                    $('#country_form')[0].reset();
                    $('#action').val('Add');
                    $('.modal-title').text('Add Data');
                    $('#button_action').val('insert');
                   
                }
            }
        })
    });

    </script>