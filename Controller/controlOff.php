<?php
require_once'../../model/modelOff.php';
function insertOff($pdo,$id_offre){
    $result=getOff($pdo,$id_offre);
    return $result; 
}
?>