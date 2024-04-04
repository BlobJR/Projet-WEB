<?php
require_once'../../model/modelmodifE.php';
function modification($pdo,$idper) {
    
    getmodif($pdo,$idper);
}
function insertE($pdo,$idper){
    $result=getE($pdo,$idper);
    return $result;
}
function promotion($pdo){
    $result=getpromo($pdo);
    return $result;
}
?>