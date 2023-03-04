

    @push('js')

<script type="text/javascript">

 $(document).ready(function() {

  

  $('#jstree').jstree({

    "core" : {

        'data' : {!! load_dep($productes->department_id) !!},

      "themes" : {

        "variant" : "large"

      }

    },

    "checkbox" : {

      "keep_selected_style" : false

    },

    "plugins" : [ "wholerow" ]

  });



});



 $('#jstree').on('changed.jstree',function(e,data){

    var i , j , r = [];

    for(i=0,j = data.selected.length;i < j;i++)

    {

          r.push(data.instance.get_node(data.selected[i]).id);

    }

         var department_id_now= r.join(', ');



    $('.department_id').val(department_id_now);



         $.ajax({

            url:'{{ url("admin/load_dep_v_size_weight") }}',

            dataType:'html',

            type:'post',

            data:{

              _token:'{{ csrf_token() }}',

              id:department_id_now,

              product_id:'{{ $productes->id }}',

              

            },

            success:function(data)

            {

                $('.size_and_weight_cc').html(data);

                $('.color_data_bb').removeClass('hidden');



            },



           });





});





</script>

@endpush













    <div id="department" class="tab-pane fade">

      <h3>{{trans('admin.department')}}</h3>

      

          <div id="jstree"></div>

        <input type="hidden" name="department_id" class="department_id" value="{{ old('parent') }}">



  <div class="clearfix"></div> <br>



    </div>





