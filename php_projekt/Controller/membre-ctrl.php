<?php

require_once '../Model/AccesDB.php';
require_once '../Model/DB_mySqli.php';
require_once 'presentation.php';

$conn =   DB_mySqli::getInstance();
$accessDB= new AccesDB();

if(isset($_SESSION['searchActive'])) {
    if($_SESSION['searchActive']){
        $text =   $_SESSION['textToSearch'];

        if($text !== ''){
            $membre = $accessDB->searchMembreTeble($text);
            $presentation = new Presentation();
            $presentation->membersList($membre);
            $_SESSION['searchActive']=null;
        } else {
            $membre = $accessDB->ListerLesMembre();
            $presentation = new Presentation();
            $presentation->membersList($membre);
        } 

    }
} else {

    $membre = $accessDB->ListerLesMembre();
    $presentation = new Presentation();
    $presentation->membersList($membre);
}



?>