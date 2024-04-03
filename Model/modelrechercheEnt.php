<?php
function getEnt($pdo){
    $query = "SELECT ville.nom_ville, entreprises.nom_ent, entreprises.id_entreprise, secteur.nom_secteur, possede.date_creation, possede.note, adresse.nom_rue ,adresse.numero_rue
    FROM entreprises
    INNER JOIN adresse ON entreprises.id_adr = adresse.id_adr
    INNER JOIN ville ON adresse.id_ville = ville.id_ville
    LEFT JOIN possede ON entreprises.id_entreprise = possede.id_entreprise
    LEFT JOIN secteur ON possede.id_secteur = secteur.id_secteur";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $result;
}
function getEntR($pdo,$id_entreprise,$nom_ent,$nom_ville,$nom_secteur){
    $query = "SELECT ville.nom_ville, entreprises.nom_ent, entreprises.id_entreprise, secteur.nom_secteur, possede.date_creation, possede.note, adresse.nom_rue ,adresse.numero_rue
    FROM entreprises
    INNER JOIN adresse ON entreprises.id_adr = adresse.id_adr
    INNER JOIN ville ON adresse.id_ville = ville.id_ville
    LEFT JOIN possede ON entreprises.id_entreprise = possede.id_entreprise
    LEFT JOIN secteur ON possede.id_secteur = secteur.id_secteur WHERE 1=1 ";
     $params = array(); 

     if (!empty($nom_ent)) {
         $query .= " AND entreprises.nom_ent = :nom_ent";
         $params['nom_ent'] = $nom_ent;
     }
 
     if (!empty($nom_ville)) {
         $query .= " AND ville.nom_ville = :nom_ville";
         $params['nom_ville'] = $nom_ville;
     }
 
     if (!empty($nom_secteur)) {
         $query .= " AND secteur.nom_secteur = :nom_secteur";
         $params['nom_secteur'] = $nom_secteur;
     }
     if (!empty($id_entreprise)) {
         $query .= " AND entreprises.id_entreprise = :id_entreprise";
         $params['id_entreprise'] = $id_entreprise;
     }
 
     $stmt = $pdo->prepare($query);
 
     foreach ($params as $key => &$value) {
         $stmt->bindParam(':' . $key, $value);
     }
 
     $stmt->execute();
     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
     return $result;
}
?>