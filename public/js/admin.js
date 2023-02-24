 $(document).ready(function()
 {

  $("#region").change(function()
  {
     
    parentid=$(this).val();
    $.get("/admin/getlocations/"+parentid, function(data, status)
    {
        $('#location').empty();
        if(data.length>0)
        {
           
          $("#location").append('<option value=0>All Locations</option>');
          $.each( data, function( key, value )
            {
                $("#location").append('<option value='+value['id']+'>'+value['location']+'</option>');
            });
            }
        else
        {
            $("#location").append('<option value=0>No Location</option>');
        }
    });
  });
 ////////////// Category Sort id /////////////// 
  $(".category_sort").change(function()
  {
    value=$(this).val();
    id=$(this).attr('category_id'); 
     
    $.get("/admin/sortcategory/"+id+"/"+value, function(data, status)
    {              
    });
  });  


 ////////////// Page SLUG /////////////// 
 $("#page_name").change(function()
 {
    page_name=$(this).val();
    page_name=page_name.toLowerCase().trim();
    page_name=page_name.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
   $("#page_slug").val(page_name); 
 }); 
  ////////////// Post SLUG /////////////// 
  $("#blog_title").change(function()
  {
    blog_title=$(this).val();
    blog_title=blog_title.toLowerCase().trim();
    blog_title=blog_title.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
    $("#blog_slug").val(blog_title); 
  }); 
 

 
  ////////////// Category SLUG /////////////// 
  $("#category").change(function()
  {
    category_name=$(this).val();
    category_name=category_name.toLowerCase().trim();
    category_name=category_name.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
    // alert(location_name);
    $("#category_slug").val(category_name);
    //id=$(this).attr('category_id');  
  });  
  
  
 ////////////// Location SLUG /////////////// 
  $("#location").change(function()
  {
    location_name=$(this).val();
    location_name=location_name.toLowerCase().trim();
    location_name=location_name.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
    // alert(location_name);
    $("#location_slug").val(location_name);
    //id=$(this).attr('category_id');  
  });  

 
////////////// Location featured ///////////////
  $('.location_featured').on('change', function()
  {    
    id=$(this).attr('location_id'); 
    if($(this).prop('checked') === true)
    {
      alert(id+'checcked');
      value=1;
      $.get("/admin/featured_location/"+id+"/"+value, function(data, status){});
    }
    else
    {
      value=0;
      $.get("/admin/featured_location/"+id+"/"+value, function(data, status){});
    }
  });

  ////////////// Location Sort id /////////////// 
  $(".location_sort").change(function()
  {
    value=$(this).val();
    id=$(this).attr('location_id');      
    $.get("/admin/sortlocation/"+id+"/"+value, function(data, status){ });
  });  

////////////////add language///////////////////

$(".edit_lang").change(function()
{
  value=$(this).val();
  id=$(this).attr('lang_id'); 
   
  $.get("/admin/updatelang/"+id+"/"+value, function(data, status)
  {              
  });
}); 



$(".catlocseo_title").change(function()
{
  value=$(this).val();
  id=$(this).attr('rowid'); 
   
  $.get("/admin/updatecatlocseotitle/"+id+"/"+value, function(data, status)
  {              
  });
}); 

$(".catlocseo_desc").change(function()
{
  value=$(this).val();
  id=$(this).attr('rowid'); 
   
  $.get("/admin/updatecatlocseodesc/"+id+"/"+value, function(data, status)
  {              
  });
}); 


$(".catlocseo_description").change(function()
{
  value=$(this).val();
  //alert(value);
  id=$(this).attr('rowid'); 
   
  $.post("/admin/updatecatlocseolongdesc/"+id+"/"+value, function(data, status)
  {              
  });
}); 








});
 