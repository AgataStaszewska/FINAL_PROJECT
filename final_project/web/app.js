
$(document).ready(function(){
    
    //FUNKCJA DO UPLOADU Z ABANDON.IE
    
    //Variable for storing file:
    var uploadedFile; 
    //Variable to store file length:
    var fileLength;

   
    $('#form_File').on('change', prepareUpload);
        
        function prepareUpload(event){
            
            uploadedFile = event.target.files[0];

        }
        
    $('form').on('submit', quoteFile);
 
    function quoteFile(event){
        
        quoteData = []; //Array for variables to be passed to functions
        
        var languagePairs = document.getElementsByName('form[languagePairs]');
        var field = document.getElementsByName('form[field]');

            
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
//        var field = quoteData[1];
//        var languagePair = quoteData[0];
//        console.log(field);
        $.ajax({
            url:'numberOfSignsFunction.php',
            type: 'POST',
            data: {fileName: fileName},
            dataType: 'json'
            
        })
                .done(function(response){
                     finalQuote(event);
                     alert(response['3']);

                
                })
                .fail(function(){
                
                    alert("FAIL");
                
                });
                   
        function finalQuote(event){
            
            event.stopPropagation();
            event.preventDefault();
            
            var field = quoteData[1];
            var languagePair = quoteData[0];
            
            console.log(field);
            console.log(languagePair);

            
            $.ajax({
            url:'quoteFunction.php',
            type: 'POST',
            data: {languagePair: languagePair,
            field: field},
//            dataType: 'json'
            
        })
                .done(function(response){
                    
                     alert(response);

                
                })
                .fail(function(){
                
                    alert("FAIL");
                
                });
            }
                
    }       
});
    

