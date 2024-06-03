$(document).ready(function()
{

    $(document).on('click','.button-like',function(){
    
        let id = $(this).data('video-id'); 
                     
     
        likeVideo(id);
       
   });
   
   $(document).on('click','.button-dislike',function(){
    
    let id = $(this).data('video-id'); 
                    
  
        dislikeVideo(id);
   
    });
    function likeVideo(id)
    {
        $.ajax({
            type:'GET',
            url : base_url+'server/video-like_server.php',
            data:{'id':id},
     

            success:function(data)
            {
        
                let response = jQuery.parseJSON(data);

              console.log(response);
              if (response.is_success) {
                jQuery('.badge-like').html(response.total_like);
              }
              
                   
            
    
    
                
            }
           
        
         
        });
    }
    function  dislikeVideo(id)
    {
        $.ajax({
            type:'GET',
            url : base_url+'server/video-dislike_server.php',
            data:{'id':id},

            success:function(data)
            {
                let response = jQuery.parseJSON(data);
                console.log(response.data);
                console.log(response);
                if (response.is_success) {
                   
                  jQuery('.badge-dislike').html(response.total_dislike);
                }
             }
           
         
        });
    }




})
