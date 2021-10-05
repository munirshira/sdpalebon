<?php
require_once('./db_login.php');
$valid = TRUE;
$id = $_GET['id_kegiatan'];
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
    $query = "UPDATE kegiatan SET nama_kegiatan='".$nama."',jam='".$jam."',tanggal_kegiatan='".$tanggal."' WHERE id_kegiatan='$id' ";
    $result = $db->query($query);
    if(!$result){
        die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
    }else{
        $db->close();
        header('Location: manage_jadwal_kegiatan.php?valid=edit true');
    }
}else{
    header('Location: manage_jadwal_kegiatan.php?valid=edit false');
}
?>