<?php
function getstatsE($pdo,$idper){
    $query0="SELECT nom, prenom, email  FROM personne WHERE idper=:idper";
    $stmt0 = $pdo->prepare($query0);
    $stmt0->bindParam(':idper', $idper);
    $stmt0->execute();
    $result0=$stmt0->fetch();
    return $result0;
}
function getstatsP($pdo,$idper){
    $query = "SELECT id_promo FROM etudiant WHERE idper= :idper";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':idper', $idper);
    $stmt->execute();
    $result=$stmt->fetch();
    $id_promo=$result['id_promo'];
    $query0="SELECT nom_promo,niveau_diplome  FROM promotions WHERE id_promo=:id_promo ";
    $stmt0 = $pdo->prepare($query0);
    $stmt0->bindParam(':id_promo', $id_promo);
    $stmt0->execute();
    $result0=$stmt0->fetch();
    return $result0;
}
?>
