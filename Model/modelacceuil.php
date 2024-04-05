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
function getoffR($pdo, $ville, $entreprises, $secteur, $id_offre,$competences,$qeury){
    $query = "SELECT offre_stage.*, secteur.nom_secteur, entreprises.nom_ent, ville.nom_ville
    FROM offre_stage
    INNER JOIN entreprises ON offre_stage.id_entreprise = entreprises.id_entreprise
    INNER JOIN adresse ON entreprises.id_adr = adresse.id_adr
    INNER JOIN ville ON adresse.id_ville = ville.id_ville
    LEFT JOIN secteur ON offre_stage.id_secteur = secteur.id_secteur
    WHERE 1=1";

    $params = array();

    if (!empty($entreprises)) {
        $query .= " AND entreprises.nom_ent = :nom_ent";
        $params['nom_ent'] = $entreprises;
    }
    if (!empty($competences)) {
        $query .= " AND offre_stage.comp_requises = :comp_requises";
        $params['comp_requises'] = $competences;
    }
    if (!empty($ville)) {
        $query .= " AND ville.nom_ville = :nom_ville";
        $params['nom_ville'] = $ville;
    }

    if (!empty($secteur)) {
        $query .= " AND secteur.nom_secteur = :nom_secteur";
        $params['nom_secteur'] = $secteur;
    }

    if (!empty($id_offre)) {
        $query .= " AND offre_stage.id_offre = :id_offre";
        $params['id_offre'] = $id_offre;
    }

    $stmt = $pdo->prepare($query);

    foreach ($params as $key => &$value) {
        $stmt->bindParam(':' . $key, $value);
    }

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
function addWL($pdo,$id_offre,$id_etudiant){
    $query_check = "SELECT COUNT(*) FROM ajouter_wish WHERE id_etudiant = :id_etudiant AND id_offre = :id_offre";
    $stmt_check = $pdo->prepare($query_check);
    $stmt_check->bindParam(':id_etudiant', $id_etudiant);
    $stmt_check->bindParam(':id_offre', $id_offre);
    $stmt_check->execute();
    $count = $stmt_check->fetchColumn();
    
    if ($count == 0) {
        $query_insert = "INSERT INTO ajouter_wish (id_etudiant, id_offre) VALUES (:id_etudiant, :id_offre)";
        $stmt_insert = $pdo->prepare($query_insert);
        $stmt_insert->bindParam(':id_etudiant', $id_etudiant);
        $stmt_insert->bindParam(':id_offre', $id_offre);
        $stmt_insert->execute();
        echo '<script>alert("L\'ajout a été effectué avec succès.");</script>'; 
    } else {
        echo '<script>alert("Offre déjà présente dans la wish list");</script>';
    }
    
    header("Location: accueil.php");
}
?>

