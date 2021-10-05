<?php
require_once('./db_login.php');
$valid = TRUE;
$hari = $_GET['hari'];
if($hari == ''){
    $valid = FALSE;
}
$jam = $_GET['jam'];
if($jam == ''){
    $valid = FALSE;
}
$mapel = $_GET['mapel'];
if($mapel == ''){
    $valid = FALSE;
}
$kelas = $_GET['kelas'];
if($kelas == ''){
    $valid = FALSE;
}
$id_pengajar = $_GET['pengajar'];
if($id_pengajar == ''){
    $valid = FALSE;
}
if($valid){
    $isi = $db->real_escape_string($isi);
    $query = "INSERT INTO jadwal (id_jadwal,hari,jam,mapel,kelas,id_pengajar) VALUES(NULL,'$hari','$jam','$mapel','$kelas','$id_pengajar') ";
    $result = $db->query($query);
    if(!$result){
        die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
    }else{
        $db->close();
        header('Location: manage_jadwal.php?valid=add true');
    }
}else{
    header('Location: manage_jadwal.php?valid=add false');
}
?>