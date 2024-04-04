<?php
function insertP($pdo,$idper){
     $query="SELECT nom,prenom,email,mdp FROM personne WHERE idper=:idper";
     $stmt = $pdo->prepare($query);
     $stmt->bindParam(":idper", $idper);
     $stmt->execute();
     $result=$stmt->fetch();
     return $result;
}
function  getmodifP($pdo,$idper){
    $nom = !empty($_POST['nom']) ? $_POST['nom'] : null;
    $prenom = !empty($_POST['prenom']) ? $_POST['prenom'] : null;
    $mail = !empty($_POST['mail']) ? $_POST['mail'] : null;
    $mdp = !empty($_POST['mdp']) ? $_POST['mdp'] : null;
    $query = "UPDATE personne JOIN pilote ON pilote.idper=personne.idper SET ";
    $setValues = [];
    if ($nom !== null){
         $setValues[] = "personne.nom = :nom";
    }
    if ($prenom !== null){
         $setValues[] = "personne.prenom = :prenom";
    }
    if ($mail !== null){
        $setValues[] = "personne.email = :mail";
    }
    if ($mdp !== null){ 
        $setValues[] = "personne.mdp = :mdp";
    }
    $query .= implode(", ", $setValues) . " WHERE pilote.idper = :idper";

    $stmt = $pdo->prepare($query);
    if ($nom !== null){
         $stmt->bindParam(':nom', $nom);
    }
    if ($prenom !== null){
         $stmt->bindParam(':prenom', $prenom);
    }
    if ($mail !== null){
         $stmt->bindParam(':mail', $mail);
    }
    if ($mdp !== null){
         $stmt->bindParam(':mdp', $mdp);
    }
    $stmt->bindParam(':idper', $idper);
    $stmt->execute();

}
?>