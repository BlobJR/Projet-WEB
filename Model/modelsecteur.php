<?php
function getsecteur($pdo){
    $query = "SELECT nom_secteur FROM secteur";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $secteurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $secteurs;
}
?>