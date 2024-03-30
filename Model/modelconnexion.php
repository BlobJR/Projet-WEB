<?php
function getmr($pdo){
 $email = $_POST['email'];  
 $mdp = $_POST['mdp'];
 $sql = "SELECT idper, role FROM personne WHERE email = :email AND mdp = :mdp";
 $stmt = $pdo->prepare($sql);
 $stmt->bindParam(':email', $email);
 $stmt->bindParam(':mdp', $mdp); 
 $stmt->execute();
 return $stmt;
}
function getadmin($pdo,$idper){
    $stmt = $pdo->prepare('SELECT id_admin FROM admin WHERE idper = :idper');
    $stmt->bindParam(':idper', $idper);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['id_admin'];
}
function getpil($pdo,$idper){
    $stmt = $pdo->prepare('SELECT id_pil FROM pilote WHERE idper = :idper');
    $stmt->bindParam(':idper', $idper);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['id_pil'];
    
}
?>