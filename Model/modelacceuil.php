<?php
function getoff($pdo){
    try {
        $sql = "SELECT * FROM offre_stage";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $offres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $offres;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>