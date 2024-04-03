<?php
function statsEnt($pdo,$id_entreprise){
    require_once'../../model/modelstatsEnt.php';
    $statsEnt=getstatsEnt($pdo,$id_entreprise);
    return $statsEnt;
}

?>