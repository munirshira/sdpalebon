<?php
require_once('./db_login.php');
$valid = TRUE;

$nama_ekskul = $_POST['nama_ekskul'];
if($nama_ekskul == ''){
    $valid = FALSE;
}
$keterangan = $_POST['keterangan'];
if($keterangan == ''){
    $valid = FALSE;
}

$temp = explode(".", $_FILES["image"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
$target = "images/".$newfilename;	 
$file_gambar = $_FILES['image']['name'];
if($file_gambar == ''){
    $valid = FALSE;
}
if($valid){
        $query = "INSERT INTO ekskul (id_ekskul,nama_ekskul,keterangan,gambar_ekskul) VALUES(NULL,'$nama_ekskul','$keterangan','$newfilename') ";
        $result = $db->query($query);
        if(!$result){
            die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
        }else{
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                $msg = "Post upload success";
                $db->close();
                echo("<script>location.href = 'manage_ekstrakurikuler.php?valid=add true';</script>");
                }
            else{
                $msg = "There was a problem uploading image";
            }
        }    
}else{
    header('Location: manage_ekstrakurikuler.php?valid=add false');
}
?>