<?php
function getsecteur($pdo){
    $query = "SELECT nom_secteur FROM secteur";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $secteurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $secteurs;
}
function getent($pdo,$id_entreprise){
    $query = "SELECT ville.nom_ville,ville.code_postal, entreprises.nom_ent, entreprises.id_entreprise, possede.date_creation, adresse.nom_rue ,adresse.numero_rue
    FROM entreprises
    INNER JOIN adresse ON entreprises.id_adr = adresse.id_adr
    INNER JOIN ville ON adresse.id_ville = ville.id_ville
    LEFT JOIN possede ON entreprises.id_entreprise = possede.id_entreprise
    LEFT JOIN secteur ON possede.id_secteur = secteur.id_secteur WHERE entreprises.id_entreprise=:id_entreprise";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id_entreprise", $id_entreprise);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}
function getmodification($pdo,$id_entreprise,$pr){

    $nom_ent = !empty($_POST['nom_ent']) ? $_POST['nom_ent'] : null;
    $date_creation = !empty($_POST['date']) ? $_POST['date'] : null;
    $adresse = !empty($_POST['adresse']) ? $_POST['adresse'] : null;
    $ville = !empty($_POST['ville']) ? $_POST['ville'] : null;
    $code_postal = !empty($_POST['cp']) ? $_POST['cp'] : null;
    $nom_secteur = !empty($_POST['secteur']) ? $_POST['secteur'] :null;
    $nom_ent_precedent = $pr['nom_ent'];
    $date_creation_precedente = $pr['date_creation'];

    $ville_precedente = $pr['nom_ville'];
    
   
    if ($adresse !== null) {
        list($numero, $nom_rue) = explode(' ', $adresse, 2);
        $query_check_address = "SELECT id_adr FROM adresse WHERE numero_rue = :numero_rue AND nom_rue = :nom_rue";
        $stmt_check_address = $pdo->prepare($query_check_address);
        $stmt_check_address->bindParam(":numero_rue", $numero);
        $stmt_check_address->bindParam(":nom_rue", $nom_rue);
        $stmt_check_address->execute();
        $existing_address = $stmt_check_address->fetch(PDO::FETCH_ASSOC);
        if (!$existing_address) {
            if ($ville != null&& $ville !== $ville_precedente) {
            $query_check_ville = "SELECT id_ville FROM ville WHERE nom_ville = :nom_ville AND code_postal = :code_postal";
            $stmt_check_ville = $pdo->prepare($query_check_ville);
            $stmt_check_ville->bindParam(":nom_ville", $ville);
            $stmt_check_ville->bindParam(":code_postal", $code_postal);
            $stmt_check_ville->execute();
            $existing_ville = $stmt_check_ville->fetch(PDO::FETCH_ASSOC);
            }
            if (!$existing_ville) {
                $query_insert_ville = "INSERT INTO ville (nom_ville, code_postal) VALUES (:nom_ville, :code_postal)";
                $stmt_insert_ville = $pdo->prepare($query_insert_ville);
                $stmt_insert_ville->bindParam(":nom_ville", $ville);
                $stmt_insert_ville->bindParam(":code_postal", $code_postal);
                $stmt_insert_ville->execute();
                $id_ville = $pdo->lastInsertId();
            } else {
                $id_ville = $existing_ville['id_ville'];
            }            
            $query_insert_address = "INSERT INTO adresse (numero_rue, nom_rue, id_ville) VALUES (:numero_rue, :nom_rue,:id_ville);";
            $stmt_insert_address = $pdo->prepare($query_insert_address);
            $stmt_insert_address->bindParam(":numero_rue", $numero);
            $stmt_insert_address->bindParam(":nom_rue", $nom_rue);
            $stmt_insert_address->bindParam(":id_ville", $id_ville);
            $stmt_insert_address->execute();
            $id_adr = $pdo->lastInsertId();
        } else {
            $id_adr = $existing_address['id_adr'];
        }
        $query_update_entreprises = "UPDATE entreprises SET id_adr = :id_adr WHERE id_entreprise = :id_entreprise";
        $stmt_update_entreprises = $pdo->prepare($query_update_entreprises);
        $stmt_update_entreprises->bindParam(":id_adr", $id_adr);
        $stmt_update_entreprises->bindParam(":id_entreprise", $id_entreprise);
        $stmt_update_entreprises->execute();
    }
    if($nom_ent!==null && $nom_ent!==$nom_ent_precedent){
        $query_entreprise = "UPDATE entreprises SET nom_ent=:nom_ent WHERE id_entreprise=:id_entreprise";
        $stmt_entreprise = $pdo->prepare($query_entreprise);
        $stmt_entreprise->bindParam("nom_ent", $nom_ent);
        $stmt_entreprise->bindParam(":id_entreprise", $id_entreprise);
        $stmt_entreprise->execute();
    }
    
    if ($date_creation !== null && $date_creation!==$date_creation_precedente) {
        $query_date = "UPDATE possede SET date_creation = :date_creation WHERE id_entreprise =:id_entreprise";
        $stmt_date = $pdo->prepare($query_date);
        $stmt_date->bindParam(":date_creation", $date_creation);
        $stmt_date->bindParam(":id_entreprise", $id_entreprise);
        $stmt_date->execute();
    }
    // if($nom_secteur!=="Choisissez une option"){
    //     $query_secteur = "UPDATE possede SET id_secteur=(SELECT id_secteur FROM secteur WHERE nom_secteur=:nom_secteur) WHERE id_entreprise=:id_entreprise";
    //     $stmt_secteur = $pdo->prepare($query_secteur);
    //     $stmt_secteur->bindParam("nom_secteur", $nom_secteur);
    //     $stmt_secteur->bindParam(":id_entreprise", $id_entreprise);
    //     $stmt_secteur->execute();
    // }
    

}
?>