<?php

function getoff($pdo,$id_etudiant){
    $query = "SELECT offre_stage.*, secteur.nom_secteur, entreprises.nom_ent 
    FROM offre_stage
    INNER JOIN ajouter_wish ON offre_stage.id_offre = ajouter_wish.id_offre
    INNER JOIN secteur ON offre_stage.id_secteur = secteur.id_secteur
    INNER JOIN entreprises ON offre_stage.id_entreprise = entreprises.id_entreprise
     WHERE ajouter_wish.id_etudiant = :id_etudiant";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_etudiant', $id_etudiant);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function  getsupprimer($pdo,$id_offre,$id_etudiant){
    $query = "DELETE FROM ajouter_wish WHERE id_offre=:id_offre AND id_etudiant=:id_etudiant";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_etudiant', $id_etudiant);
    $stmt->bindParam(':id_offre', $id_offre);
    $stmt->execute();
}
?>