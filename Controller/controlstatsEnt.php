<?php
require_once'../../model/modelstatsEnt.php';
function statsEnt($pdo,$id_entreprise){
    $statsEnt=getstatsEnt($pdo,$id_entreprise);
    return $statsEnt;
}
function supprimer($pdo,$id_entreprise){
    supprimerEnt($pdo,$id_entreprise);
}
?>