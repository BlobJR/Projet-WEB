<?php
function getoff($pdo){
    try {
        $sql = "SELECT offre_stage.*, secteur.nom_secteur 
        FROM offre_stage 
        JOIN secteur ON offre_stage.id_secteur = secteur.id_secteur;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $offres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $offres;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>