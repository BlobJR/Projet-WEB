<?php
function insertto($pdo){
$mail=$_POST['mail'];
   $mdp=$_POST['mdp'];
   $nom=$_POST['nom'];
   $prenom=$_POST['prenom'];
   $query_check = "SELECT * FROM personne WHERE email=:email";
    $stmt_check = $pdo->prepare($query_check);
    $stmt_check->bindParam(':email', $mail);
    $stmt_check->execute();
    if($stmt_check->rowCount()>0){
        echo "<script>alert('email deja utilisé');</script>";
    }else{
        $role=$_POST['role'];
        if($role==="etudiant"){
            $role="Etudiant";

        }
        $query_insert = "INSERT INTO personne (nom, prenom,email,mdp,role) VALUES (:nom, :prenom, :mail, :mdp, :role)";
        $stmt_insert = $pdo->prepare($query_insert);
        $stmt_insert->bindParam(':nom', $nom);
        $stmt_insert->bindParam(':prenom', $prenom);
        $stmt_insert->bindParam(':mail', $mail);
        $stmt_insert->bindParam(':mdp', $mdp);
        $stmt_insert->bindParam(':role', $role);
        $stmt_insert->execute();
        header("Location: compteA.php");
        $id_personne= $pdo->lastInsertId();
        if($role==="Etudiant"){
        $query_insert1 = "INSERT INTO etudiant (idper) VALUES (:id_personne)";
        $stmt_insert1 = $pdo->prepare($query_insert1);
        $stmt_insert1->bindParam(':id_personne', $id_personne);
        $stmt_insert1->execute();
        }else {
        $query_insert2 = "INSERT INTO admin (idper) VALUES (:id_personne)";
        $stmt_insert2 = $pdo->prepare($query_insert2);
        $stmt_insert2->bindParam(':id_personne', $id_personne);
        $stmt_insert2->execute();
        }
    }
}
?>