
$(document).ready(function(){
    
    $('.quote').on('click', function(event){
//        var file = document.getElementById("#form_File").textContent;
//        console.log(file);
        
        var languagePairs = document.getElementsByName('form[languagePairs]');
        console.log(languagePairs);
        console.log('AAA');
        
        for(i=0; i<languagePairs.length; i++){
            
            console.log(languagePairs[i].value);
        }
//
//        for (i = 0; i < languagePairs.length; i++) {  
//            
//            console.log(languagePairs[i]);
////        if((languagePairs[i].type==="radio") && languagePairs[i].checked===true){
//        if(languagePairs[i].checked){
//            
//            console.log(languagePairs[i].value);
//
////    }
//        }
//        
//        }
//    },
        
        
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
