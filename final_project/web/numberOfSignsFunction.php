<?php
echo "BBBB";
function extractText($filename) {
    
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

//$string = extractText($filename);
//echo $length = strlen($string);
//echo "<br>";
//echo json_encode($length);
//echo "<br>";
//echo "BBBB";
?>