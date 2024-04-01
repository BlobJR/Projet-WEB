<?php
function insertto($pdo,$id_pil,$id_admin){
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
        switch ($role) {
            case "Admin":
                $query_insert2 = "INSERT INTO admin (idper) VALUES (:id_personne)";
                $stmt_insert2 = $pdo->prepare($query_insert2);
                $stmt_insert2->bindParam(':id_personne', $id_personne);
                $stmt_insert2->execute();
                exit();
            case "Etudiant":
                $query_insert1 = "INSERT INTO etudiant (idper, id_pil, id_admin) VALUES (:id_personne, :id_pil, :id_admin)";
                $stmt_insert1 = $pdo->prepare($query_insert1);
                $stmt_insert1->bindParam(':id_personne', $id_personne);
                if($id_pil=="NULL"){
                    $id_pil=null;
                    $stmt_insert1->bindParam(':id_pil',$id_pil, PDO::PARAM_NULL);
                    $stmt_insert1->bindParam(':id_admin', $id_admin);
                    }else{
                    $id_admin=null;
                    $stmt_insert1->bindParam(':id_pil',$id_pil);
                    $stmt_insert1->bindParam(':id_admin',$id_admin, PDO::PARAM_NULL);
                    }
                $stmt_insert1->execute();
                exit();
            case "pilote":
                $query_insert3 = "INSERT INTO pilote (idper) VALUES (:id_personne)";
                $stmt_insert3 = $pdo->prepare($query_insert3);
                $stmt_insert3->bindParam(':id_personne', $id_personne);
                $stmt_insert3->execute();
                exit();
        }
    }
}
?>