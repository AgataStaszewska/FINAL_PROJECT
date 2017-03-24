<?php

$filename = $_POST['fileName'];
function extractText($filename) {    
 $pathToFile = "/home/agata/Workspace/ForQuote/".$filename;
 $exploded = explode('.', $filename);
 $extension = end($exploded);

    if($extension == 'docx'){
    $dataFile = "word/document.xml";
    }else{
    $dataFile = "content.xml"; }    
       
    $zip = new ZipArchive;
 
    if (true === $zip->open($pathToFile)) {
        if (($index = $zip->locateName($dataFile)) !== false) {
            $text = $zip->getFromIndex($index);
            $xml = new DOMDocument;
            $xml->loadXML($text, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
            return strip_tags($xml->saveXML());
        }
        $zip->close();
        return true;
        
    }else{
    echo "File not found";
    return false;
    }
    
}
$length = strlen(extractText($filename));
$numberOfPages = floor($length/1800);
echo "Number of characters in the file: ".$length." (including spaces). This is ".$numberOfPages." full pages.";

?>