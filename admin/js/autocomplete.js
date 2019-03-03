// Autocomplete searchbar

   load_data();

   function changeBackgroundColor(element, color) {
     $(element).css('background-color',color);
   }

   function autocompleteSearchbar(autocomplete_item, name, username) {
     var search_text = $(autocomplete_item).parent().siblings(".search_text").first();
     var username_element = $(autocomplete_item).parent().siblings(".username").first();
     var result = $(autocomplete_item).parent();
     $(result).css('display','none');
     $(search_text).val(name);
     $(username_element).val(username);
   }

   function load_data(search_text, url, result){
       $.ajax({
           url:url,
           method:"POST",
           data:{name:search_text},
           success:function(data){
               $(result).html(data);
               $(result).css('display','block');
           }
       });
   }
    
   $(".search_text").keyup(function(){
       var search_text = $(this).val();
       var username = $(this).siblings(".username").first();
       var url = $(this).siblings(".url").first().val();
       var result = $(this).siblings(".result").first();
       $(username).val("");

       if(search_text !== ''){                   
           load_data(search_text,url,result);
       }
       else{                  
           load_data('',result);
       }
   });

   $(document).click(function(e)
   {
      if(! $(e.target).parent('.result').length)
      {
          $(".result").each(function() {
            $(this).css('display','none');
          });
      }
   });