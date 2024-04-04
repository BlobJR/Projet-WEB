<?php
require_once'../../model/modelmodifEnt.php';
function insertsecteur($pdo){
    $result=getsecteur($pdo);
    return $result;
}
function insertent($pdo,$id_entreprise){
    $result=getent($pdo,$id_entreprise);
    return $result;
}
function modification($pdo,$id_entreprise,$pr){
    getmodification($pdo,$id_entreprise,$pr);
    
}
?>