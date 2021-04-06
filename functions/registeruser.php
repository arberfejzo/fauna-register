<?php
include '../database.php';

$new_user_name = addslashes($_POST['username']);
$new_user_password = addslashes($_POST['password']);
$new_user_password2 = addslashes($_POST['password2']);

if ($new_user_password != $new_user_password2) {
    echo "<script>
    alert('Passwords do not mach');
    window.location.href='../views/register.php';
    </script>";
    exit;
}

preg_match('/[!@#$%^&*()]+/', $new_user_password, $matches);
if (sizeof($matches) == 0) {
    echo "<script>
    alert('The password must have at leat one special caracter');
    window.location.href='../views/register.php';
    </script>";
    exit;
}

if (strlen($new_user_password) <= 5) {
    echo "<script>
alert('The password must be at leat 5 caracters');
window.location.href='../views/register.php';
</script>";
    exit;
}

$stmt = $conn->prepare("SELECT * FROM user_table where user_name = ?");
$stmt->bind_param("s", $new_user_name);
$stmt->execute();
$stmt->store_result();



if ($stmt->num_rows > 0) {
    echo "<script>
    alert('The user already exists');
    window.location.href='../views/register.php';
    </script>";
    exit;
}

$hashed_pass = password_hash($new_user_password, PASSWORD_DEFAULT);
// insert
$stmt = $conn->prepare("INSERT INTO user_table (user_name, user_password) VALUES (?, ?)");
$stmt->bind_param("ss",  $new_user_name, $hashed_pass);






if ($stmt->execute()) {
    header("Location: ../views/login.php");
    $stmt->close();
} else {
    header("Location: ../views/register.php");
}
