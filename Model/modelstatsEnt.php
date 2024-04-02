<?php
function getstatsEnt($pdo,$id_entreprise){
    $query = "SELECT nom_ent FROM entreprises WHERE id_entreprise= :id_entreprise";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_entreprise', $id_entreprise);
    $stmt->execute();
    $result=$stmt->fetch();
    return $result;
}
function getstatsEntA($pdo,$id_entreprise){
    $query = "SELECT id_adr FROM entreprises WHERE id_entreprise= :id_entreprise";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_entreprise', $id_entreprise);
    $stmt->execute();
    $result=$stmt->fetch();
    $id_adr=$result['id_adr'];
    $query0 = "SELECT numero_rue, nom_rue FROM adresse WHERE id_adr= :id_adr";
    $stmt0 = $pdo->prepare($query0);
    $stmt0->bindParam(':id_adr', $id_adr);
    $stmt0->execute();
    $result0=$stmt0->fetch();
    return array('id_adr'=>$id_adr,'result'=>$result0);
}
function getstatsEntV( $pdo,$id_adr){
    $query = "SELECT id_ville FROM adresse WHERE id_adr= :id_adr";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_adr', $id_adr);
    $stmt->execute();
    $result=$stmt->fetch();
    $id_ville=$result['id_ville'];
    $query0 = "SELECT nom_ville, code_postal FROM ville WHERE id_ville= :id_ville";
    $stmt0 = $pdo->prepare($query0);
    $stmt0->bindParam(':id_ville', $id_ville);
    $stmt0->execute();
    $result0=$stmt0->fetch();
    return  $result0;
}
function getstatsEntS($pdo,$id_entreprise){
    $query = "SELECT id_secteur,date_creation FROM possede WHERE id_entreprise= :id_entreprise";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_entreprise', $id_entreprise);
    $stmt->execute();
    $result=$stmt->fetch();
    $id_secteur=$result['id_secteur'];
    $date=$result['date_creation'];
    $query0 = "SELECT nom_secteur FROM secteur WHERE id_secteur= :id_secteur";
    $stmt0 = $pdo->prepare($query0);
    $stmt0->bindParam(':id_secteur', $id_secteur);
    $stmt0->execute();
    $result0=$stmt0->fetch();
    return array('date'=>$date,'secteur'=>$result0);
}
?>