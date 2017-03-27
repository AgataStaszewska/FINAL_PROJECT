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
$numberOfPages = ceil($length/1800);

$returned['1'] = $length;
$returned['2'] = $numberOfPages;
$returned['3'] = "Liczba znaków w pliku: ".$length." (ze spacjami). Liczba stron obliczeniowych: ".$numberOfPages;
echo json_encode($returned);

?>