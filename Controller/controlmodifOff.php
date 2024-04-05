<?php
require_once'../../model/modelmodifOff.php';
function insertOff($pdo,$id_offre){
    $result=getOff($pdo,$id_offre);
    return $result;
}
function insertsecteur($pdo){
    $result=getsecteur($pdo);
    return $result;
}
function modification($pdo,$id_offre){
    getmodif($pdo,$id_offre);
}
?>