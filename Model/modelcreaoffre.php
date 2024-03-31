<?php
function insertoffre($pdo,$id_pil,$id_admin){
    //secteur-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    $nom_secteur=$_POST["secteur"];
    $query = "SELECT id_secteur FROM secteur WHERE nom_secteur=:nom";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nom', $nom_secteur);
    $stmt->execute();
    $result = $stmt->fetch(); 
    $id_secteur = $result['id_secteur']; 
    //entreprise-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    $nom=$_POST["ent"];
    $query0 = "SELECT id_entreprise FROM entreprises WHERE nom_ent=:nom";
    $stmt0 = $pdo->prepare($query0);
    $stmt0->bindParam(':nom', $nom);
    $stmt0->execute();
    $result0 = $stmt0->fetch(); 
    if (!$result0) {
        echo "<script>alert('L'entreprise saisie n'a pas encore été créée ');</script>";
        return; 
    }
    $id_entreprise = $result0['id_entreprise']; 
    
    //offre_stage----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    $nbr_places=$_POST["nbrPlace"];
    $lvl=$_POST["lvl"];
    $intitule=$_POST["intitule"];
    $comp_requises=$_POST["comp_requises"];
    $query1 = "INSERT INTO offre_stage (intitule, niveau_requis, nbr_places, comp_requises, id_secteur, id_pil, id_admin, id_entreprise) VALUES (:intitule, :niveau_requis, :nbr_places, :comp_requises, :id_secteur, :id_pil, :id_admin ,:id_entreprise)";
    $stmt1 = $pdo->prepare($query1);
    $stmt1->bindParam(':intitule', $intitule);
    $stmt1->bindParam(':niveau_requis', $lvl);
    $stmt1->bindParam(':nbr_places', $nbr_places);
    $stmt1->bindParam(':comp_requises', $comp_requises);
    $stmt1->bindParam(':id_secteur', $id_secteur);
    $stmt1->bindParam(':id_entreprise', $id_entreprise);
    if($id_pil=="NULL"){
        $id_pil=null;
        $stmt1->bindParam(':id_pil',$id_pil, PDO::PARAM_NULL);
        $stmt1->bindParam(':id_admin', $id_admin);
        }else{
        $id_admin=null;
        $stmt1->bindParam(':id_pil',$id_pil);
        $stmt1->bindParam(':id_admin',$id_admin, PDO::PARAM_NULL);
        }
    $stmt1->execute();
    echo "<script>alert('Ofrre publié avec succès ');</script>";
}
?>