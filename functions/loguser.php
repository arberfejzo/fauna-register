<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../database.php";

$user_name = addslashes($_POST['user_name']);
$user_password = addslashes($_POST['user_password']);

$stmt = $conn->prepare("SELECT user_id, user_name, user_password FROM user_table WHERE user_name = ?");
$stmt->bind_param("s", $user_name,);

$stmt->execute();
$stmt->store_result();

$stmt->bind_result($user_id, $user_name, $userpwd);

if ($stmt->num_rows == 1) {
    $stmt->fetch();
    if (password_verify($user_password, $userpwd)) {
        $_SESSION['user_name'] = $user_name;
        $_SESSION['user_id'] = $user_id;
        header("Location: ../views/list.php");
    } else {

        $_SESSION = [];
        session_destroy();
        echo "<script>
alert('Wrong credentials');
window.location.href='../views/login.php';
</script>";
    }
}
