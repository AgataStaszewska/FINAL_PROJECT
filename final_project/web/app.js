

$(document).ready(function(){
    
    $('quote').on('click', function(){
        
        var filename = $.post('file');
        var length = numberOfSigns(filename);
        var price = quoteFunction($.post('languagePair'), $.post('field'));
        var totalPrice = totalPrice(price);
        
        console.log(totalPrice);
        
    })
    
    
    
    
    
});


