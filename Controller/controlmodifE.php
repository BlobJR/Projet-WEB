<?php
require_once'../../model/modelmodifE.php';
function modification($pdo,$idper) {
    
    getmodif($pdo,$idper);
}
function promotion($pdo){
    $result=getpromo($pdo);
    return $result;
}
?>