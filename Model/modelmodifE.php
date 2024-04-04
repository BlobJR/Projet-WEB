<?php
function getmodif($pdo,$idper){
    $nom_promo=$_POST['promotion'];
    $query="SELECT id_promo FROM promotions WHERE nom_promo=:nom_promo";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam("nom_promo", $nom_promo,);
    $stmt->execute();
    $result= $stmt->fetch();
    $id_promo=$result['id_promo'];

    $query0="UPDATE etudiant SET id_promo=:id_promo WHERE idper=:idper";
    $stmt0 = $pdo->prepare($query0);
    $stmt0->bindParam("id_promo", $id_promo,);
    $stmt0->bindParam("idper", $idper,);
    $stmt0->execute();

    $nom = !empty($_POST['nom']) ? $_POST['nom'] : null;
    $prenom = !empty($_POST['prenom']) ? $_POST['prenom'] : null;
    $mail = !empty($_POST['mail']) ? $_POST['mail'] : null;
    $mdp = !empty($_POST['mdp']) ? $_POST['mdp'] : null;
    
    $query1 = "UPDATE personne SET";
    
    $setValues = array();
    if ($nom !== null) {
        $setValues[] = "nom = :nom";
    }
    if ($prenom !== null) {
        $setValues[] = "prenom = :prenom";
    }
    if ($mail !== null) {
        $setValues[] = "email = :mail";
    }
    if ($mdp !== null) {
        $setValues[] = "mdp = :mdp";
    }
    
    $query1 .= " " . implode(", ", $setValues) . " WHERE idper = :idper";
    $stmt1 = $pdo->prepare($query1);
    if ($nom !== null) {
        $stmt1->bindParam(":nom", $nom);
    }
    if ($prenom !== null) {
        $stmt1->bindParam(":prenom", $prenom);
    }
    if ($mail !== null) {
        $stmt1->bindParam(":mail", $mail);
    }
    if ($mdp !== null) {
        $stmt1->bindParam(":mdp", $mdp);
    }
    
    $stmt1->bindParam(":idper", $idper);
    
    $stmt1->execute();

}
function getE($pdo,$idper){
    $query = "SELECT nom,prenom,email,mdp FROM personne WHERE idper=:idper";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":idper", $idper);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}
function getpromo($pdo){
    $query="SELECT nom_promo FROM promotions ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result= $stmt->fetchAll(PDO::FETCH_ASSOC);;
    return $result;
}
?>