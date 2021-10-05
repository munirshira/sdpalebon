<?php
require_once('./db_login.php');
$valid = TRUE;
$id = $_GET['id'];
if($id == ''){
    $valid = FALSE;
}
if($valid){
    $query = "UPDATE akun SET password='827ccb0eea8a706c4c34a16891f84e7b' WHERE id_admin=$id";
    $result = $db->query($query);
    if(!$result){
        die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
    }else{
        $db->close();
        header('Location: reset_password.php?valid=reset true');
    }
}
?>