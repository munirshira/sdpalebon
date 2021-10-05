<?php
require_once('./db_login.php');
$valid = TRUE;
$nip = $_POST['nip'];
if($nip == ''){
    $valid = FALSE;
}
$nama_guru = $_POST['nama_guru'];
if($nama_guru == ''){
    $valid = FALSE;
}
$jabatan = $_POST['jabatan'];
if($jabatan == ''){
    $valid = FALSE;
}



if($jabatan == 'Kepala Sekolah'){
    $role = 1;
}else if($jabatan == 'Guru'){
    $role = 2;
}else{
    $role = 3;
}

$temp = explode(".", $_FILES["image"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
$target = "images/".$newfilename;	 
$file_gambar = $_FILES['image']['name'];
if($file_gambar != ''){
    $uploaded = TRUE;
}else{
    $file_gambar = 'guru_default.jpg';
    $uploaded = FALSE;
}
if($valid){
    if($uploaded){
        $query = "INSERT INTO guru (id_guru,nip,nama_guru,jabatan,gambar_guru,role) VALUES(NULL,'$nip','$nama_guru','$jabatan','$newfilename','$role') ";
        $result = $db->query($query);
        if(!$result){
            die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
        }else{
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                $msg = "Post upload success";
                $db->close();
                echo("<script>location.href = 'manage_pengajar.php?valid=add true';</script>");
                }
            else{
                $msg = "There was a problem uploading image";
            }
        }
    }else{
        $query = "INSERT INTO guru (id_guru,nip,nama_guru,jabatan,gambar_guru,role) VALUES(NULL,'$nip','$nama_guru','$jabatan','$file_gambar','$role') ";
        $result = $db->query($query);
        if(!$result){
            die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
        }else{
            $db->close();
            header('Location: manage_pengajar.php?valid=add true');
        }
    }    
}else{
    header('Location: manage_pengajar.php?valid=add false');
}
?>