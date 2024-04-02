<?php
function statsEnt($pdo,$id_entreprise){
    require_once'../../model/modelstatsEnt.php';
    $statsEnt=getstatsEnt($pdo,$id_entreprise);
    return $statsEnt;
}
function statsEntA( $pdo,$id_entreprise){
    require_once'../../model/modelstatsEnt.php';
    $result=$statsEntA=getstatsEntA($pdo,$id_entreprise);
    return $result;
}
function statsEntV( $pdo,$id_adr){
    require_once'../../model/modelstatsEnt.php';
    $result=getstatsEntV( $pdo,$id_adr);
    return $result;
}
function statsEntS( $pdo,$id_entreprise){
    $result=getstatsEntS($pdo,$id_entreprise);
    return $result; 
}
?>