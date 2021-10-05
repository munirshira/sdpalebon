<?php
require_once('./db_login.php');
$valid = TRUE;
$isi = $_GET['sambutan'];
if($isi == ''){
    $valid = FALSE;
}
if($valid){
    $isi = $db->real_escape_string($isi);
    $query = "UPDATE profil SET isi='".$isi."' WHERE kategori='sambutan'";
    $result = $db->query($query);
    if(!$result){
        die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
    }else{
        $db->close();
        header('Location: manage_sambutan.php?valid=true');
    }
}else{
    header('Location: manage_sambutan.php?valid=false');
}
?>