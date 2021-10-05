<?php
require_once('./db_login.php');
$valid = TRUE;
$isi = $_GET['add_misi'];
if($isi == ''){
    $valid = FALSE;
}
if($valid){
    $isi = $db->real_escape_string($isi);
    $query = "INSERT INTO profil (id_profil,isi,kategori) VALUES(NULL,'$isi','misi') ";
    $result = $db->query($query);
    if(!$result){
        die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
    }else{
        $db->close();
        header('Location: manage_visimisi.php?v_misi=add true');
    }
}else{
    header('Location: manage_visimisi.php?v_misi=add false');
}
?>