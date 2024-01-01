<?php
session_start();

$id = isset($_GET['id']) ? $_GET['id'] : null;

include('../CLASS/connection.php');

$connection = new Connection();
$connection->selectDatabase('project');

include('../CLASS/note.php');

Note::deleteNote('Note',$connection->conn,$id);
header("Location: preview.php?id=" . $_SESSION["idE"]);

?>