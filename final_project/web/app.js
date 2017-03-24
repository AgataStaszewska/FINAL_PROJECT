
$(document).ready(function(){
    
    //FUNKCJA DO UPLOADU Z ABANDON.IE
    
    //Variable for storing file:
    var uploadedFile; 
    $('#form_File').on('change', prepareUpload);
        
        function prepareUpload(event){
            
            uploadedFile = event.target.files[0];

        }
        
    $('form').on('submit', quoteFile);
 
    function quoteFile(event){
        
        event.stopPropagation();
        event.preventDefault();

        var data = new FormData();
        var file = document.getElementById('form_File').files[0];   
        data.append("file", file);
    
        $.ajax({
            url:'submit.php',
            type: 'POST',
            data: data,
            processData: false,
            contentType: false
        })
                .done(function(data){
                
                    alert(data);
                
                })
                .fail(function(){
                
                    alert("FAIL");
                
                });
    
        var fileName = document.getElementById('form_File').files[0].name;
 
        $.ajax({
            url:'numberOfSignsFunction.php',
            type: 'POST',
            data: {fileName: fileName},
            dataType: 'json'
            
        })
                .done(function(response){
                
                    printresult(response);
                
                })
                .fail(function(){
                
                    alert("FAIL");
                
                });
                
        function printresult(response){
            
            alert(response['3']);
            var languagePairs = document.getElementsByName('form[languagePairs]');
            var field = document.getElementsByName('form[field]');
            var quoteData = [];
            console.log(quoteData);
                    for(i=0; i<languagePairs.length; i++){
                        if(languagePairs[i].checked===true){
                             
                            var label = languagePairs[i].nextElementSibling;
                            var languagePairText = label.innerText;
                            quoteData.push(languagePairText);
                
                        }

                    }
                    for(i=0; i<field.length; i++){
                        if(field[i].checked===true){
                
                            var label = field[i].nextElementSibling;
                            var fieldText = label.innerText;
                            quoteData.push(fieldText);
                            
                        }
            
                    }

            console.log(quoteData);           
        }
        
        

    }
    

        
              
});
    
//    $('.quote').on('click', function(event){
//        var languagePairs = document.getElementsByName('form[languagePairs]');
//        var field = document.getElementsByName('form[field]');
//        var file = document.getElementById('form_File');
//        var filename = file.files[0].name;
////        console.log(filename);
//        
////        if(('files' in file) && (file.files.length!==0)){
////            
////            var name = file.files[0].name;
//////            console.log(name);
////            
////        }
////
////        for(i=0; i<languagePairs.length; i++){
////            if(languagePairs[i].checked===true){
////                             
////                var label = languagePairs[i].nextElementSibling;
////                var text = label.innerText;
//////                console.log(text);
////                
////            }
////        }
////        
////        for(i=0; i<field.length; i++){
////            if(field[i].checked===true){
////                
////                var label = field[i].nextElementSibling;
////                var text = label.innerText;
//////                console.log(text);
////            }
////            
////        }
//        
//        
//        
//               
//        $.ajax({
//          url: 'numberOfSignsFunction.php',
//          action: 'extractText',
//          method: 'post',
//          data: {filename: filename}, //JA MU TU TYLKO FILENAME PRZEKAZUJĘ, POGRZAŁO MNIE?
//          dataType: 'text',
//        })
//                  .done(function(data){
//                    alert(data);  
//
//                      
//                  })
//
//    
//    event.preventDefault();        
//    });
//});

