<?php
require_once('./db_login.php');
$valid = TRUE;
$id = $_GET['id_buku'];
$judul = $_GET['judul'];
if($judul == ''){
    $valid = FALSE;
}
$pengarang = $_GET['pengarang'];
if($pengarang == ''){
    $valid = FALSE;
}
$penerbit = $_GET['penerbit'];
if($penerbit == ''){
    $valid = FALSE;
}
$kategori = $_GET['kategori'];
if($kategori == ''){
    $valid = FALSE;
}

if($valid){
    $isi = $db->real_escape_string($isi);
    $query = "UPDATE daftar_buku SET judul='".$judul."',pengarang='".$pengarang."',penerbit='".$penerbit."',kategori='".$kategori."' WHERE id_buku='$id' ";
    $result = $db->query($query);
    if(!$result){
        die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
    }else{
        $db->close();
        header('Location: manage_buku.php?valid=edit true');
    }
}else{
    header('Location: manage_buku.php?valid=edit false');
}
?>