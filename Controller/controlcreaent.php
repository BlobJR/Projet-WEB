<?php
function insertsecteur($pdo){
require_once'../../model/modelesecteur.php';
$secteurs=getsecteur($pdo);
return $secteurs;
}
 

function insertent($pdo){
//Ville-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
$ville=$_POST["ville"];
$cp=$_POST['cp'];
$query_check = "SELECT id_ville FROM ville WHERE nom_ville = :ville";
$stmt_check = $pdo->prepare($query_check);
$stmt_check->bindParam(':ville', $ville);
$stmt_check->execute();
if ($stmt_check->rowCount() > 0) {
    $row = $stmt_check->fetch(PDO::FETCH_ASSOC);
    $id_ville = $row['id_ville'];
} else {
    
    $query_insert = "INSERT INTO ville (nom_ville, code_postal) VALUES (:ville, :cp)";
    $stmt_insert = $pdo->prepare($query_insert);
    $stmt_insert->bindParam(':ville', $ville);
    $stmt_insert->bindParam(':cp', $cp);
    $stmt_insert->execute();

    
    $id_ville = $pdo->lastInsertId();
}
//adresse----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
$adresse_complete = $_POST["adresse"];
list($numero, $nom_rue) = explode(' ', $adresse_complete, 2);
$query = "INSERT INTO adresse (nom_rue, numero_rue, id_ville) VALUES (:nom_rue, :numero, :id_ville)";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':nom_rue', $nom_rue);
$stmt->bindParam(':numero', $numero);
$stmt->bindParam(':id_ville', $id_ville);
$stmt->execute();
$id_adresse = $pdo->lastInsertId();

//entreprise----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
$nom_ent = $_POST["nom_ent"];
$query1 = "INSERT INTO entreprises (nom_ent, id_adr) VALUES (:nom_ent, :id_adresse)";
$stmt1 = $pdo->prepare($query1);
$stmt1->bindParam(':nom_ent', $nom_ent);
$stmt1->bindParam(':id_adresse', $id_adresse);
$stmt1->execute();
$id_entreprise = $pdo->lastInsertId();
//possede----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
$secteur = $_POST["secteur"];
$query2 = "SELECT id_secteur FROM secteur WHERE nom_secteur=:secteur";
$stmt2 = $pdo->prepare($query2);
$stmt2->bindParam(':secteur', $secteur);
$stmt2->execute();
if ($stmt2->rowCount() > 0) {
    
    $row = $stmt2->fetch(PDO::FETCH_ASSOC);
    $id_secteur = $row['id_secteur'];
    
} else {
    
    echo "Aucun secteur trouvé pour le nom spécifié.";
}
$date=$_POST['date'];
$query3 = "INSERT INTO possede (id_entreprise, id_secteur, date_creation) VALUES (:id_entreprise, :id_secteur, :date_creation);";
$stmt3 = $pdo->prepare($query3);
$stmt3->bindParam(':id_entreprise', $id_entreprise);
$stmt3->bindParam(':id_secteur', $id_secteur);
$stmt3->bindParam(':date_creation', $date);
$stmt3->execute();
header("Location: compteA.php");
}
?>