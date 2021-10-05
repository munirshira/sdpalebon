<?php
require_once('./db_login.php');
$valid = TRUE;
$id = $_GET['id_catat'];
$nama = $_GET['nama'];
if($nama == ''){
    $valid = FALSE;
}
$angkatan = $_GET['angkatan'];
if($angkatan == ''){
    $valid = FALSE;
}

if($valid){
    $isi = $db->real_escape_string($isi);
    $query = "UPDATE catatan_alumni SET nama='".$nama."',angkatan='".$angkatan."' WHERE id_catat='$id' ";
    $result = $db->query($query);
    if(!$result){
        die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
    }else{
        $db->close();
        header('Location: catatan_alumni.php?valid=edit true');
    }
}else{
    header('Location: catatan_alumni.php?valid=edit false');
}
?>