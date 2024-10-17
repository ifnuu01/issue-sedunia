<?php
    include '../includes/connection.php';
    include '../includes/functions.php';

    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $user = loginUser($conn, $email, $password);
        if($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: index.php');
        }
    }
?>

