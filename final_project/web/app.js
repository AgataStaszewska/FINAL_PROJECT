
$(document).ready(function(){
    
    $('.quote').on('click', function(event){
        var languagePairs = document.getElementsByName('form[languagePairs]');
        var field = document.getElementsByName('form[field]');
        var file = document.getElementById('form_File');
        var fileTest = document.getElementById('form_File').files[0].name
        console.log(fileTest);
//        console.log(file.files);
        var filename = file.files[0].name;
//        console.log(filename);
        
//        if(('files' in file) && (file.files.length!==0)){
//            
//            var name = file.files[0].name;
////            console.log(name);
//            
//        }
//
//        for(i=0; i<languagePairs.length; i++){
//            if(languagePairs[i].checked===true){
//                             
//                var label = languagePairs[i].nextElementSibling;
//                var text = label.innerText;
////                console.log(text);
//                
//            }
//        }
//        
//        for(i=0; i<field.length; i++){
//            if(field[i].checked===true){
//                
//                var label = field[i].nextElementSibling;
//                var text = label.innerText;
////                console.log(text);
//            }
//            
//        }
        
               
        $.ajax({
//          url: 'numberOfSignsFunction.php?action=extractText',
          url: 'numberOfSignsFunction.php',
          action: 'extractText',
          method: 'post',
          data: {filename: filename},
//          data: {filename: fileTest},
          dataType: 'text',
//

        })
                  .done(function(data){
                    alert(data);  

                      
                  })

    
    event.preventDefault();        
    });
});
