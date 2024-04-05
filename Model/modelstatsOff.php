<?php
function getstatsOff($pdo,$id_offre){
    $sql = "SELECT offre_stage.*, secteur.nom_secteur, entreprises.nom_ent, ville.nom_ville 
    FROM offre_stage 
    JOIN secteur ON offre_stage.id_secteur = secteur.id_secteur 
    JOIN entreprises ON offre_stage.id_entreprise = entreprises.id_entreprise 
    JOIN adresse ON entreprises.id_adr = adresse.id_adr 
    JOIN ville ON adresse.id_ville = ville.id_ville WHERE offre_stage.id_offre=:id_offre";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_offre', $id_offre);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}
function getsupprimer($pdo,$id_offre){
    $query="DELETE FROM ajouter_wish WHERE id_offre=:id_offre";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam("id_offre", $id_offre);
    $stmt->execute();
    $query0="DELETE FROM postuler_à WHERE id_offre=:id_offre";
    $stmt0 = $pdo->prepare($query0);
    $stmt0->bindParam("id_offre", $id_offre);
    $stmt0->execute();
    $query1="DELETE FROM offre_stage WHERE id_offre=:id_offre";
    $stmt1 = $pdo->prepare($query1);
    $stmt1->bindParam("id_offre", $id_offre);
    $stmt1->execute();
    header("Location: accueil.php");
}
?>