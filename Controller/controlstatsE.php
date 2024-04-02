<?php
function statsE($pdo,$id_etudiant){
    require_once'../../model/modelstatsE.php';
    $statsE=getstatsE($pdo,$id_etudiant);
    return $statsE;
}
function statsP($pdo,$id_etudiant){
    require_once'../../model/modelstatsE.php';
    $statsP=getstatsP($pdo,$id_etudiant);
    return $statsP;
}
?>