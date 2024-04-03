<?php
function getE($pdo){
    $query="SELECT personne.nom, personne.prenom, personne.email,personne.idper FROM personne JOIN etudiant ON personne.idper = etudiant.idper;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function getinsertER($pdo, $email, $nom, $prenom, $idper){
    $query = "SELECT personne.nom, personne.prenom, personne.email, personne.idper FROM personne WHERE 1=1";

    $params = array(); 

    if (!empty($nom)) {
        $query .= " AND personne.nom = :nom";
        $params['nom'] = $nom;
    }

    if (!empty($prenom)) {
        $query .= " AND personne.prenom = :prenom";
        $params['prenom'] = $prenom;
    }

    if (!empty($email)) {
        $query .= " AND personne.email = :email";
        $params['email'] = $email;
    }
    if (!empty($idper)) {
        $query .= " AND personne.idper = :idper";
        $params['idper'] = $idper;
    }

    $stmt = $pdo->prepare($query);

    foreach ($params as $key => &$value) {
        $stmt->bindParam(':' . $key, $value);
    }

    $stmt->execute();
    $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $etudiants;
}

?>