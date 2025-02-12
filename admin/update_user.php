<?php
include('../Database/database_connectivity.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $contactno = $_POST["contactno"];
    $password = $_POST["password"];

    $sql = "UPDATE user_signup SET username='$username', email='$email', contactno='$contactno', password='$password' WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        echo "<script>alert('User updated successfully!'); window.location.href='admin_user.php';</script>";
    } else {
        echo "Error updating record: " . $connection->error;
    }
}
?>