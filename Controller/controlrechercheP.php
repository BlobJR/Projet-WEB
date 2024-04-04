<?php
require_once'../../Model/modelrechercheP.php';
function pilote($pdo){
    $result=getP($pdo);
    return $result;
}
function piloteER($pdo,$email,$nom,$prenom,$idper){
    $result=getPER($pdo,$email,$nom,$prenom,$idper);
    return $result;
}
?>