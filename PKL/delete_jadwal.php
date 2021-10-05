<?php
require_once('db_login.php');

$id = $_GET['id'];
//assign query
$query = "DELETE FROM jadwal WHERE id_jadwal = ".$id."";
//execute query
$result = $db->query($query);
if (!$result) {
    die("Could not query the database: <br/>" . $db->error . '<br>Query' . $query);
} else {
    header('Location: manage_jadwal.php?valid=delete true');
}
?>