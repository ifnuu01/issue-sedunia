<?php
    include '../includes/connection.php';
    include '../includes/functions.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        if(registerUser($conn, $username, $email, $password)) {
            echo "<script>alert('Registration successful!')</script>";
            header('Location: login.php');
        } else {
            echo "<script>alert('Registration failed!')</script>";
        }
    }
?>
