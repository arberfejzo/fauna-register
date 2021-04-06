<?php

session_start();

if (!$_SESSION['user_name']) {
    echo "Onlu outhorised users bay add data!";
    exit;
}


include '../database.php';

$new_animal = addslashes($_GET["speces"]);
$new_latitude = addslashes($_GET["latitude"]);
$new_longitude = addslashes($_GET["longitude"]);
$new_notes = addslashes($_GET["notes"]);
$userID = $_SESSION['user_id'];

$stmt = $conn->prepare("INSERT INTO animal_table (animal_speces, latitude, longitude, notes, userID) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi",  $new_animal, $new_latitude, $new_longitude, $new_notes, $userID);

if ($stmt->execute()) {
    header("Location: ../views/list.php");
    $stmt->close();
} else {
    header("Location: ../views/input.php");
}
