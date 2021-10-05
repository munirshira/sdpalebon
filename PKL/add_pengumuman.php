<?php
require_once('./db_login.php');
$valid = TRUE;

$id = $_POST['id_admin'];

$judul = $_POST['judul'];
if($judul == ''){
    $valid = FALSE;
}

$temp = explode(".", $_FILES["pdf"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
$target = "pdf/".$newfilename;	 
$file_image = $_FILES['pdf']['name'];
if($file_image == ''){
    $valid = FALSE;
}
if($valid){
        $query = "INSERT INTO pdf (id_pdf,nama_pdf,Judul,tanggal_pdf,id_akun) VALUES(NULL,'$newfilename','$judul',NOW(),'$id') ";
        $result = $db->query($query);
        if(!$result){
            die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
        }else{
            if (move_uploaded_file($_FILES['pdf']['tmp_name'], $target)){
                $msg = "Post upload success";
                $db->close();
                echo("<script>location.href = 'manage_PPD.php?valid=add true';</script>");
                }
            else{
                $msg = "There was a problem uploading pdf";
            }
        }    
}else{
    header('Location: manage_PPD.php?valid=add false');
}
?>