<?php
require_once'../../model/modelwishlist.php';
function insertoff($pdo,$id_etudiant){
    $result=getoff($pdo,$id_etudiant);
    return $result;
}
function supprimer($pdo,$id_offre,$id_etudiant){
    getsupprimer($pdo,$id_offre,$id_etudiant);
}
?>