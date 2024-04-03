<?php
require_once'../../model/modelrechercheEnt.php';
function insertEnt($pdo){
    $result=getEnt($pdo);
    return $result;
}
function insertEntR($pdo,$id_entreprise,$nom_ent,$nom_ville,$nom_secteur){
    $result=getEntR($pdo,$id_entreprise,$nom_ent,$nom_ville,$nom_secteur);
    return $result;
}
?>