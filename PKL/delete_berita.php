<?php
require_once('db_login.php');

$id = $_GET['id'];
//assign query
$query = "DELETE FROM berita WHERE id_berita = ".$id."";
//execute query
$result = $db->query($query);
if (!$result) {
    die("Could not query the database: <br/>" . $db->error . '<br>Query' . $query);
} else {
    header('Location: manage_berita.php?valid=delete true');
}
?>