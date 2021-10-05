<?php
require_once('./db_login.php');
$valid = TRUE;
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
    $query = "INSERT INTO daftar_buku (id_buku,judul,pengarang,penerbit,kategori) VALUES(NULL,'$judul','$pengarang','$penerbit','$kategori') ";
    $result = $db->query($query);
    if(!$result){
        die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
    }else{
        $db->close();
        header('Location: manage_buku.php?valid=add true');
    }
}else{
    header('Location: manage_buku.php?valid=add false');
}
?>