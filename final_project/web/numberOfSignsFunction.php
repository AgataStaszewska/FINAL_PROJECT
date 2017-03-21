<?php
echo "BBBB";
$filename = $_POST['filename'];
echo $filename;
function extractText($filename) {    
 $pathToFile = "../../Downloads/".$filename;
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
        echo "AAA";
    }else{
    echo "File not found";
    return false;
    }
    
}

?>