<?php
function getstatsP($pdo,$idper){
    $query="SELECT nom, prenom, email  FROM personne WHERE idper=:idper";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':idper', $idper);
    $stmt->execute();
    $result=$stmt->fetch();
    return $result;
}
function getstatsPE($pdo,$idper){
    $query="SELECT nom_ent  FROM entreprises WHERE id_pil=(SELECT id_pil FROM pilote WHERE idper=:idper)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':idper', $idper);
    $stmt->execute();
    $result=$stmt->fetchAll();
    return $result;
}
function supprimerP($pdo,$idper){
    $query = "UPDATE entreprises SET id_pil = NULL WHERE id_pil=(SELECT id_pil FROM pilote WHERE idper=:idper)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam("idper", $idper);
    $stmt->execute();
    $query0 = "UPDATE offre_stage SET id_pil = NULL WHERE id_pil=(SELECT id_pil FROM pilote WHERE idper=:idper)";
    $stmt0 = $pdo->prepare($query0);
    $stmt0->bindParam("idper", $idper);
    $stmt0->execute();
    $query1 = "UPDATE etudiant SET id_pil = NULL WHERE id_pil=(SELECT id_pil FROM pilote WHERE idper=:idper)";
    $stmt1 = $pdo->prepare($query1);
    $stmt1->bindParam("idper", $idper);
    $stmt1->execute(); 
    $query2 = "UPDATE admin SET idper = NULL WHERE idper=:idper";
    $stmt2 = $pdo->prepare($query2);
    $stmt2->bindParam("idper", $idper);
    $stmt2->execute();
    $query4 = "DELETE FROM pilote WHERE idper=:idper";
    $stmt4 = $pdo->prepare($query4);
    $stmt4->bindParam("idper", $idper);
    $stmt4->execute();
    $query3 = "DELETE FROM personne WHERE idper=:idper";
    $stmt3 = $pdo->prepare($query3);
    $stmt3->bindParam("idper", $idper);
    $stmt3->execute();
    header("Location: rechercheP.php");
}
?>