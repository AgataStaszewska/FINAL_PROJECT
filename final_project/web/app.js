
$(document).ready(function(){
    
    $('.quote').on('click', function(event){
      
        var languagePairs = document.getElementsByName('form[languagePairs]');
      
        for(i=0; i<languagePairs.length; i++){
            if(languagePairs[i].checked===true){
                             
                var label = languagePairs[i].nextElementSibling;
                console.log(label);
                var text = label.innerText;
                console.log(text);
                
            }
//            console.log(languagePairs[i].value);
        }
               
//        $.ajax({
//          url: 'numberOfSignsFunction.php?action=extractText',
//          method: 'post'
//        })
//                  .done(function(output){
//                    alert(output);  
//
//                      
//                  })
//                  .fail(alert("FAILED"))
////          event.preventDefault();
//
////          });
//        
//        );
});
});
