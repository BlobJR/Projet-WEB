<?php
require_once'../../model/modelstatsP.php';
function statsP($pdo,$idper){
    $result=getstatsP($pdo,$idper);
    return $result;
}
function statsPE($pdo,$idper){
    $result=getstatsPE($pdo,$idper);
    return $result;
}
function supprimer($pdo,$idper){
    supprimerP($pdo,$idper);
    
}
?>