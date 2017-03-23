<?php


if(isset($_FILES)){
    $uploaddir = '/home/agata/Workspace/ForQuote/';
    
    if(file_exists($uploaddir)){
       $uploadfile = $uploaddir.basename($_FILES['file']['name']);
       move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile); 
       echo "File uploaded successfully";
    }else{
       mkdir($uploaddir);
       $uploadfile = $uploaddir.basename($_FILES['file']['name']);
       move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);  
       echo "The directory was created and the file was successfully uploaded";
    }
}


       

    

