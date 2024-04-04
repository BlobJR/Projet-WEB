<?php
require_once'../../model/modelmodifP.php';
function insertpilote($pdo,$idper){
   $result=insertP($pdo,$idper);
   return $result;
}
function modification($pdo,$idper){
   getmodifP($pdo,$idper);
}
?>