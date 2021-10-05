<?php
require_once('./db_login.php');
$valid = TRUE;
$lomba = $_POST['lomba'];
if($lomba == ''){
    $valid = FALSE;
}
$tahun = $_POST['tahun'];
if($tahun == ''){
    $valid = FALSE;
}
$juara = $_POST['juara'];
if($juara == ''){
    $valid = FALSE;
}
$pemenang = $_POST['pemenang'];
if($pemenang == ''){
    $valid = FALSE;
}
$temp = explode(".", $_FILES["image"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
$target = "images/".$newfilename;		 
$file_gambar = $_FILES['image']['name'];
if($file_gambar != ''){
    $uploaded = TRUE;
}else{
    $file_gambar = 'trofi_default.jpg';
    $uploaded = FALSE;
}
if($valid){
    if($uploaded){
        $query = "INSERT INTO prestasi (id_prestasi,lomba,tahun,juara,pemenang,gambar_lomba) VALUES(NULL,'$lomba','$tahun','$juara','$pemenang','$newfilename') ";
        $result = $db->query($query);
        if(!$result){
            die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
        }else{
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                $msg = "Post upload success";
                $db->close();
                echo("<script>location.href = 'manage_prestasi.php?valid=add true';</script>");
                }
            else{
                $msg = "There was a problem uploading image";
            }
        }
    }else{
        $query = "INSERT INTO prestasi (id_prestasi,lomba,tahun,juara,pemenang,gambar_lomba) VALUES(NULL,'$lomba','$tahun','$juara','$pemenang','$file_gambar') ";
        $result = $db->query($query);
        if(!$result){
            die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
        }else{
            $db->close();
            header('Location: manage_prestasi.php?valid=add true');
        }
    }    
}else{
    header('Location: manage_prestasi.php?valid=add false');
}
?>