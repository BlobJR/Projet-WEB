<?php

function getoff($pdo){
    try {
        $sql = "SELECT offre_stage.*, secteur.nom_secteur 
        FROM offre_stage 
        JOIN secteur ON offre_stage.id_secteur = secteur.id_secteur";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $offres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $offres;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

function getVille($pdo) {
    try {
        $query = "SELECT nom_ville FROM ville";
        $stmt = $pdo->query($query);
        $ville = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $ville;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

function getsecteurs($pdo) {
    try {
        $query = "SELECT nom_secteur FROM secteur";
        $stmt = $pdo->query($query);
        $secteurs = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $secteurs;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

function getcomp($pdo) {
    try {
        $query = "SELECT comp_requises FROM offre_stage";
        $stmt = $pdo->query($query);
        $comp_requises = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $comp_requises;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

function getNomEntreprises($pdo) {
    try {
        $query = "SELECT nom_ent FROM entreprises";
        $stmt = $pdo->query($query);
        $nom_ent = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $nom_ent;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}


function rechercherOffres($pdo, $query, $ville, $secteur, $competences) {
    try {
        $sql = "SELECT offre_stage.*, secteur.nom_secteur 
                FROM offre_stage 
                JOIN secteur ON offre_stage.id_secteur = secteur.id_secteur
                JOIN entreprises ON offre_stage.id_entreprise = entreprises.id_entreprise
                JOIN adresse ON entreprises.id_adr = adresse.id_adr
                JOIN ville ON adresse.id_ville = ville.id_ville
                WHERE offre_stage.intitule LIKE :query
                AND (:ville = '' OR ville.nom_ville = :ville)
                AND (:secteur = '' OR secteur.nom_secteur = :secteur)
                AND (:competences = '' OR offre_stage.comp_requises LIKE :competences)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':query', "%$query%", PDO::PARAM_STR);
        $stmt->bindValue(':ville', $ville, PDO::PARAM_STR);
        $stmt->bindValue(':secteur', $secteur, PDO::PARAM_STR);
        $stmt->bindValue(':competences', "%$competences%", PDO::PARAM_STR);
        $stmt->execute();

        $offres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $offres;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>