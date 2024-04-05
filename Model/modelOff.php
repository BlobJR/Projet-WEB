<?php
function getOff($pdo,$id_offre){
    try {
        
        $sql = "SELECT * FROM offre_stage WHERE id_offre = :id_offre";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_offre', $id_offre);
        $stmt->execute();
        $result= $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
        
        if ($stmt->rowCount() > 0) {
            
            $offre = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            
            echo "Aucune offre correspondant à cet identifiant n'a été trouvée.";
        }
    } catch (PDOException $e) {
       
        echo "Erreur : " . $e->getMessage();
    }

}
?>