<?php
require_once('./db_login.php');
$valid = TRUE;
$id = $_GET['id_misi'];
$isi = $_GET['edit_misi'];
if($isi == ''){
    $valid = FALSE;
}
if($valid){
    $isi = $db->real_escape_string($isi);
    $query = "UPDATE profil SET isi='$isi' WHERE id_profil='$id' ";
    $result = $db->query($query);
    if(!$result){
        die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
    }else{
        $db->close();
        header('Location: manage_visimisi.php?v_misi=edit true');
    }
}else{
    header('Location: manage_visimisi.php?v_misi=edit false');
}
?>