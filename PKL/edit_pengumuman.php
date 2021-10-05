<?php
require_once('./db_login.php');
$valid = TRUE;
$id = $_GET['id_pdf'];
$judul = $_GET['judul'];
if($judul == ''){
    $valid = FALSE;
}
if($valid){
    $isi = $db->real_escape_string($isi);
    $query = "UPDATE pdf SET Judul='".$judul."' WHERE id_pdf='$id' ";
    $result = $db->query($query);
    if(!$result){
        die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
    }else{
        $db->close();
        header('Location: manage_PPD.php?valid=edit true');
    }
}else{
    header('Location: manage_PPD.php?valid=edit false');
}
?>