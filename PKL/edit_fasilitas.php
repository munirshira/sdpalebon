<?php
require_once('./db_login.php');
$valid = TRUE;
$id = $_POST['id_fasilitas'];
$nama_fasilitas = $_POST['nama_fasilitas'];
if($nama_fasilitas == ''){
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
if($file_gambar != ''){
    $uploaded = TRUE;
}else{
    $uploaded = FALSE;
}

if($valid){
    if($uploaded){
        $query = "UPDATE fasilitas SET nama_fasilitas='".$nama_fasilitas."',keterangan='".$keterangan."',gambar_fasilitas='".$newfilename."' WHERE id_fasilitas='$id' ";
        $result = $db->query($query);
        if(!$result){
            die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
        }else{
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                $msg = "Post upload success";
                $db->close();
                echo("<script>location.href = 'manage_fasilitas.php?valid=edit true';</script>");
                }
            else{
                $msg = "There was a problem uploading image";
            }
        }
    }else{
        $isi = $db->real_escape_string($isi);
        $query = "UPDATE fasilitas SET nama_fasilitas='".$nama_fasilitas."',keterangan='".$keterangan."' WHERE id_fasilitas='$id' ";
        $result = $db->query($query);
        if(!$result){
            die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
        }else{
            $db->close();
            header('Location: manage_fasilitas.php?valid=edit true');
        }
    }

}else{
    header('Location: manage_fasilitas.php?valid=edit false');
}
?>