<?php
function statsE($pdo,$idper){
    require_once'../../model/modelstatsE.php';
    $statsE=getstatsE($pdo,$idper);
    return $statsE;
}
function statsP($pdo,$idper){
    require_once'../../model/modelstatsE.php';
    $statsP=getstatsP($pdo,$idper);
    return $statsP;
}
?>