
$(document).ready(function(){
    
//
    $('.quote').on('click', function(event){
        
        $.ajax({
          url: 'numberOfSignsFunction.php?action=extractText', data:$.post['File']        
        })
                  .done(function(){
                      
                      console.log("AAA")
              console.log($.post['File'])
                      
                  })
                  .fail(alert("FAILED"))
//          event.preventDefault();

          });
        

});

