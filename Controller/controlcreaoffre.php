<?php
function insertsecteur($pdo){
require_once'../../model/modelesecteur.php';
$secteurs=getsecteur($pdo);
return $secteurs;
}
?>