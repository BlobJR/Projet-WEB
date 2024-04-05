<?php
require_once'../../Model/modelacceuil.php';
function insertoff($pdo){
 
    $offres=getoff($pdo);
    return $offres;
}
function insertoffR($pdo, $ville, $entreprises, $secteur, $id_offre,$competences,$query){
    $result= getoffR($pdo, $ville, $entreprises, $secteur, $id_offre,$competences,$query);
    return $result;
}
function ajouterW($pdo,$id_offre,$id_etudiant) {
    addWL($pdo,$id_offre,$id_etudiant);
}
?>