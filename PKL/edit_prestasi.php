<?php
require_once('./db_login.php');
$valid = TRUE;
$id = $_POST['id_prestasi'];
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
    $uploaded = FALSE;
}

if($valid){
    if($uploaded){
        $query = "UPDATE prestasi SET lomba='".$lomba."',tahun='".$tahun."',juara='".$juara."',pemenang='".$pemenang."', gambar_lomba='".$newfilename."' WHERE id_prestasi='$id' "; 
        $result = $db->query($query);
        if(!$result){
            die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
        }else{
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                $msg = "Post upload success";
                $db->close();
                echo("<script>location.href = 'manage_prestasi.php?valid=edit true';</script>");
                }
            else{
                $msg = "There was a problem uploading image";
            }
        }
    }else{
        $isi = $db->real_escape_string($isi);
        $query = "UPDATE prestasi SET lomba='".$lomba."',tahun='".$tahun."',juara='".$juara."',pemenang='".$pemenang."' WHERE id_prestasi='$id' ";
        $result = $db->query($query);
        if(!$result){
            die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
        }else{
            $db->close();
            header('Location: manage_prestasi.php?valid=edit true');
        }
    }
}else{
    header('Location: manage_prestasi.php?valid=edit false');
}
?>