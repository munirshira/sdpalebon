<?php
require_once('db_login.php');

$id = $_GET['id'];
//assign query
$query = "DELETE FROM catatan_alumni WHERE id_catat = ".$id."";
//execute query
$result = $db->query($query);
if (!$result) {
    die("Could not query the database: <br/>" . $db->error . '<br>Query' . $query);
} else {
    header('Location: catatan_alumni.php?valid=delete true');
}
?>