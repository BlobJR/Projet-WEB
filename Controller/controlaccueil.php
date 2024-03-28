<?php

function insertoff($pdo){
    require_once'../../Model/modelacceuil.php';
    $offres=getoff($pdo);
    return $offres;
}

?>