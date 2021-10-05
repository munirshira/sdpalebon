<?php
require_once('./db_login.php');
$valid = TRUE;
$link = $_GET['link'];
if($link == ''){
    $valid = FALSE;
}
if($valid){
    $isi = $db->real_escape_string($isi);
    $query = "UPDATE link SET alamat='".$link."' WHERE untuk='daftar'";
    $result = $db->query($query);
    if(!$result){
        die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
    }else{
        $db->close();
        header('Location: manage_PPD.php?vlink=edit true');
    }
}else{
    header('Location: manage_PPD.php?vlink=edit false');
}
?>