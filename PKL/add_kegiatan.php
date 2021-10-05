<?php
require_once('./db_login.php');
$valid = TRUE;
$nama = $_GET['nama'];
if($nama == ''){
    $valid = FALSE;
}
$jam = $_GET['jam'];
if($jam == ''){
    $valid = FALSE;
}
$tanggal = $_GET['tanggal'];
if($tanggal == ''){
    $valid = FALSE;
}

if($valid){
    $isi = $db->real_escape_string($isi);
    $query = "INSERT INTO kegiatan (id_kegiatan,nama_kegiatan,tanggal_kegiatan,jam) VALUES(NULL,'$nama','$tanggal','$jam') ";
    $result = $db->query($query);
    if(!$result){
        die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
    }else{
        $db->close();
        header('Location: manage_jadwal_kegiatan.php?valid=add true');
    }
}else{
    header('Location: manage_jadwal_kegiatan.php?valid=add false');
}
?>