<?php
function inscription($pdo,$id_pil,$id_admin){
    require_once'../../model/modelinscription.php';
    insertto($pdo,$id_pil,$id_admin);
}
?>