<?php
require_once('./db_login.php');
$valid = TRUE;
$nama = $_GET['nama'];
if($nama == ''){
    $valid = FALSE;
}
$angkatan = $_GET['angkatan'];
if($angkatan == ''){
    $valid = FALSE;
}

if($valid){
    $query = "INSERT INTO catatan_alumni (id_catat,nama,angkatan) VALUES(NULL,'$nama','$angkatan') ";
    $result = $db->query($query);
    if(!$result){
        die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
    }else{
        $db->close();
        header('Location: catatan_alumni.php?valid=add true');
    }
}else{
    header('Location: catatan_alumni.php?valid=add false');
}
?>