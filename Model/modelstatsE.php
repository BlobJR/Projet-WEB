<?php
function getstats($pdo,$id_etudiant){
    $query = "SELECT idper FROM etudiant WHERE id_etudiant= :id_etudiant";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_etudiant', $id_etudiant);
    $stmt->execute();
    $result=$stmt->fetch();
    $idper=$result['idper'];
    $query0="SELECT nom, prenom, email FROM personne WHERE idper=:idper ";
    $stmt0 = $pdo->prepare($query0);
    $stmt0->bindParam(':idper', $idper);
    $stmt0->execute();
    $result0=$stmt0->fetch();
    return $result0;
}
?>