$(document).ready(function(){

    $("#region").change(function()
    {
      //alert('sadsa');
      parentid=$(this).val();
      $.get("/admin/getlocations/"+parentid, function(data, status)
      {
          //alert(data);
          $('#location').empty();
          if(data.length>0)
          {
            $("#location").append('<option value=0 parentid=0>All Locations</option>');
            $.each( data, function( key, value )
              {
                //alert(value);  
                $("#location").append('<option value='+value['id']+' parentid='+value['parent']+'>'+value['location']+'</option>');
              });
              }
          else
          {
              $("#location").append('<option  parentid=0>No Location</option>');
  
          }
      });
    });

    $("#location").on('change', function()
    {
      locationid=$(this).val();
      
      if(locationid==0)
      {

      }
 
        parentid=$(this).find('option:selected').attr('parentid');
        $("#region").val(parentid);
      
    });


    $("#tel_txt").click(function(event){
    
      event.preventDefault();
      phone_number=$(this).attr('phone_number');
       $('#tel_txt span').html(phone_number);
      
       
      
    });

    


    
       
  });
   