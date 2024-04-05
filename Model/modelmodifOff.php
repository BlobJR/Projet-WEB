<?php
function getOff($pdo,$id_offre){
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
function getsecteur($pdo){
    $query = "SELECT * FROM secteur";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $secteurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $secteurs;
}
function  getmodif($pdo,$id_offre){
    $intitule = !empty($_POST['intitule']) ? $_POST['intitule'] : null;
    $niveau_requis = !empty($_POST['niveau_requis']) ? $_POST['niveau_requis'] : null;
    $nom_secteur = !empty($_POST['nom_secteur']) ? $_POST['nom_secteur'] : null;
    $nbr_places = !empty($_POST['nbr_places']) ? $_POST['nbr_places'] : null;
    $comp_requises = !empty($_POST['comp_requises']) ? $_POST['comp_requises'] :null;
    $id_secteur=null;
    if ($nom_secteur !== null) {
    $query = "SELECT id_secteur FROM secteur WHERE nom_secteur=:nom_secteur";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nom_secteur', $nom_secteur);
    $stmt->execute();
    $result= $stmt->fetch();
    if ($result) {
        $id_secteur = $result['id_secteur'];
    } else {
        $id_secteur = null;
    }
    }
    $query1 = "UPDATE offre_stage SET ";
    $setValues = array();
    if ($intitule !== null) {
        $setValues[] = "intitule=:intitule";
    }
    if ($nbr_places !== null) {
        $setValues[] = "nbr_places=:nbr_places";
    }
    if ($niveau_requis !== null) {
        $setValues[] = "niveau_requis=:niveau_requis";
    }
    if ($comp_requises !== null) {
        $setValues[] = "comp_requises=:comp_requises";
    }
    if($nom_secteur!==null){
        $setValues[] = "id_secteur=:id_secteur";
    }

    $query1 .= " " . implode(", ", $setValues) . " WHERE id_offre = :id_offre";
    $stmt1 = $pdo->prepare($query1);
    if ($intitule !== null) {
        $stmt1->bindParam(":intitule", $intitule);
    }
    if ($nbr_places !== null) {
        $stmt1->bindParam(":nbr_places", $nbr_places);
    }
    if ($niveau_requis !== null) {
        $stmt1->bindParam(":niveau_requis", $niveau_requis);
    }
    if ($comp_requises !== null) {
        $stmt1->bindParam(":comp_requises", $comp_requises);
    }
    if($id_secteur!==null){
        $stmt1->bindParam(":id_secteur", $id_secteur);
    }
    $stmt1->bindParam(":id_offre", $id_offre);

    $stmt1->execute();
    header("Location: accueil.php");
    }
?>