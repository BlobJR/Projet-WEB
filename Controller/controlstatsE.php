<?php
function statsE($pdo,$id_etudiant){
    require_once'../../model/modelstatsE.php';
    $statsE=getstats($pdo,$id_etudiant);
    return $statsE;
}
?>