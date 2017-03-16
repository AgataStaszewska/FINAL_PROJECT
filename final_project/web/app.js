
$(document).ready(function(){
    
    $('.quote').on('click', function(event){
//        var file = document.getElementById("#form_File").textContent;
//        console.log(file);
        
        var languagePairs = document.getElementsByName("form[languagePairs]");
        for (i = 0; i < languagePairs.length; i++) {   
//        if((languagePairs[i].type=="radio") && languagePairs[i].checked=true)){
            
            console.log(languagePairs);

//    }
        }
        
        },
        
        
        $.ajax({
          url: 'numberOfSignsFunction.php?action=extractText',
          method: 'post'
        })
                  .done(function(output){
                    alert(output), console.log(file);  

                      
                  })
                  .fail(alert("FAILED"))
//          event.preventDefault();

//          });
        
        
});
