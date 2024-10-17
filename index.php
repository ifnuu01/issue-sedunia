<?php
    include '../includes/connection.php';
    include '../includes/functions.php';

    session_start();

    $username = $_SESSION['username'];
    if(!isset($username)) {
        header('Location: login.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $content = htmlspecialchars($_POST['content']);
        $user_id = $_SESSION['user_id'];
        $photo = $_FILES['photo'] ? checkPhoto($_FILES['photo'], false) : '';
        var_dump($photo);

        if(addPost($conn, $user_id, $content, $photo)) {
            header('Location: index.php');
        } else {
            echo "<script>alert('Failed to add post!')</script>";
        }
    }

    $posts = getPosts($conn);
?>

