<?php
require_once('./db_login.php');
$valid = TRUE;
$id = $_GET['id_jadwal'];
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
    $query = "UPDATE jadwal SET hari='".$hari."',jam='".$jam."',mapel='".$mapel."',kelas='".$kelas."',id_pengajar='".$id_pengajar."' WHERE id_jadwal='$id' ";
    $result = $db->query($query);
    if(!$result){
        die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
    }else{
        $db->close();
        header('Location: manage_jadwal.php?valid=edit true');
    }
}else{
    header('Location: manage_jadwal.php?valid=edit false');
}
?>