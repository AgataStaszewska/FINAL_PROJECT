<?php

function extracttext($filename) {
    
 $exploded = explode('.', $filename);
 $extension = end($exploded);

    if($extension == 'docx'){
    $dataFile = "word/document.xml";
    }else{
    $dataFile = "content.xml"; }    
       
    $zip = new ZipArchive;
 
    if (true === $zip->open($filename)) {
        if (($index = $zip->locateName($dataFile)) !== false) {
            $text = $zip->getFromIndex($index);
            $xml = new DOMDocument;
            $xml->loadXML($text, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
            return strip_tags($xml->saveXML());
        }
        $zip->close();
    }
    return "File not found";
}

$string = extracttext($filename);
echo strlen($string);
echo "<br>";
?>