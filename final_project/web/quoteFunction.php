<?php
echo "BBB";
//require "numberOfSignsFunction.php";
//$languagePair = $_POST['languagePair'];
//$field = $_POST['field'];
//$length = $_POST['length'];

function quoteProject($languagePair, $field){
    
 $languagePair = $_POST['languagePair'];
 $field = $_POST['field'];
 $length = $_POST['length'];
    if(!$languagePair){
        
        echo "Proszę wybrać parę językową";
        die;
    }
    switch($languagePair){
        case 'EN-PL':
            $price = 30;
            break;
        case 'PL-EN':
            $price = 40;
            break;
        case 'DE-PL':
            $price = 35;
            break;
        case 'PL-DE':
            $price = 45;
            break;
        case 'FR-PL':
            $price = 40;
            break;
        case 'PL-FR':
            $price = 50;
            break;
    }
    switch($field){
        case 'prawo':
            $price = $price + 5;
            break;
        case 'medycyna':
            $price = $price + 10;
            break;
        case 'przysięgłe':
            $price = $price + 15;
            break;
        case 'IT':
            $price = $price + 5;
            break;
        case 'techniczny':
            $price = $price + 10;
            break;
        case 'marketing':
            $price = $price + 0;
            break;
        
    }
    return $price;
}

//function totalPrice($price,$length){
//    if($length<1800){
//        $length = 1800;
//    }
//        
//    $numberOfPages = ceil($length/1800);
//    $totalPrice = $numberOfPages*$price;
//
//    return $totalPrice;
//
//       
//}

$returned['1'] = $price;
$returned['2'] = $totalPrice;
$returned['3'] = "Cena za stronę tłumaczenia wynosi: ".$price." PLN. Cena za całość tłumaczenia wynosi: ".$totalPrice." PLN.";
echo json_encode($returned);