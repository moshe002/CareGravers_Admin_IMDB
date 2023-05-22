<?php
include("database.php");
$sql = "SELECT * FROM gravesite WHERE 1";
$result = mysqli_query($conn, $sql);
include("crud.php");
?>

<h1>pricing</h1>