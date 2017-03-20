
$(document).ready(function(){
    
    $('.quote').on('click', function(event){
//        event.preventDefault();
        var languagePairs = document.getElementsByName('form[languagePairs]');
        var field = document.getElementsByName('form[field]');
        var file = document.getElementById('form_File');
        console.log(file.files);
        
        if(('files' in file) && (file.files.length!==0)){
            
            var name = file.files[0].name;
            console.log(name);
            
        }

        for(i=0; i<languagePairs.length; i++){
            if(languagePairs[i].checked===true){
                             
                var label = languagePairs[i].nextElementSibling;
                var text = label.innerText;
                console.log(text);
                
            }
        }
        
        for(i=0; i<field.length; i++){
            if(field[i].checked===true){
                
                var label = field[i].nextElementSibling;
                var text = label.innerText;
                console.log(text);
            }
            
        }
        
               
        $.ajax({
          url: 'numberOfSignsFunction.php?action=extractText',
          method: 'post',
//          data: ({filename: file})
        })
                  .done(function(output){
                    alert(output);  

                      
                  })
//                  .fail(alert("FAILED"))
//          event.preventDefault();

//          });
        
        
});
});
