<?php
require_once'../../model/modelstatsOff.php';
function statsoff($pdo,$id_offre){
    $result=getstatsOff($pdo,$id_offre);
    return $result;
}
function supprimer($pdo,$id_offre){
    getsupprimer($pdo,$id_offre);
}
?>