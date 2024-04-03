<?php
function getStatsEnt($pdo, $id_entreprise) {
    $query = "SELECT entreprises.nom_ent, adresse.numero_rue, adresse.nom_rue, ville.nom_ville, ville.code_postal, possede.date_creation, secteur.nom_secteur
              FROM entreprises
              JOIN adresse ON entreprises.id_adr = adresse.id_adr
              JOIN ville ON adresse.id_ville = ville.id_ville
              JOIN possede ON entreprises.id_entreprise = possede.id_entreprise
              JOIN secteur ON possede.id_secteur = secteur.id_secteur
              WHERE entreprises.id_entreprise = :id_entreprise";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_entreprise', $id_entreprise);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    
    if (strpos($result['nom_rue'], '?') !== false) {
        $result['nom_rue'] = str_replace('?', 'é', $result['nom_rue']);
    }

    return $result;
}
?>