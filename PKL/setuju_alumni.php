<?php
require_once('db_login.php');

$id = $_GET['id'];
//assign query
$query = "UPDATE alumni SET auth='Sudah Disetujui' WHERE id_alumni = ".$id."";
//execute query
$result = $db->query($query);
if (!$result) {
    die("Could not query the database: <br/>" . $db->error . '<br>Query' . $query);
} else {
    header('Location: manage_data_alumni.php?valid=setuju');
}
?>