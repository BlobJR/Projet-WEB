<?php

function getoff($pdo){
    try {
        $sql = "SELECT offre_stage.*, secteur.nom_secteur, entreprises.nom_ent, ville.nom_ville 
        FROM offre_stage 
        JOIN secteur ON offre_stage.id_secteur = secteur.id_secteur 
        JOIN entreprises ON offre_stage.id_entreprise = entreprises.id_entreprise 
        JOIN adresse ON entreprises.id_adr = adresse.id_adr 
        JOIN ville ON adresse.id_ville = ville.id_ville";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $offres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $offres;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

