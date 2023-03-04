   function checkall()
   {
    $('input[class="item_checkbox"]:checkbox').each(function(){

      if ($('input[class="checck_all"]:checkbox:checked').length == 0 )
       {
              $(this).prop('checked',false);
       }
       else
       {
         $(this).prop('checked',true);
       }
    });
   }

   function dellall()
   {
    $(document).on('click','.dellallitem',function(){
   $('#fromdata').submit();

    });

    $(document).on('click','.dellall',function(){
   
    var item_checked=$('input[class="item_checkbox"]:checkbox').filter(":checked").length;
     if (item_checked > 0)
      {
        $('.record_count').text(item_checked);
        $('.not_empty_recored').removeClass('hidden');
         $('.empty_recored').addClass('hidden');
  
      }
      else
      {
            $('.record_count').text( );
        $('.empty_recored').removeClass('hidden');
         $('.not_empty_recored').addClass('hidden');
    
      }


     $('#maltidelte').modal('show');

    });
   }

  