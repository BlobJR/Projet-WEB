<?php
function insertE($pdo){
    require_once'../../model/modelrechercheE.php';
    $result=getE($pdo);
    return $result;
}
function insertER($pdo,$email,$nom,$prenom,$idper){
    require_once'../../model/modelrechercheE.php';
    $result=getinsertER($pdo,$email,$nom,$prenom,$idper);
    return  $result;
}
?>