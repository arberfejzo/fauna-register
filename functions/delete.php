<?php
include '../database.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM animal_table WHERE animal_id=$id") or die($conn->error);
}

header("Location: ../views/list.php");
