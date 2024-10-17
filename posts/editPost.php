<?php
    require '../../includes/connection.php';
    require '../../includes/functions.php';

    session_start();

    $postId = $_GET['id'];
    $result = getSinglePost($conn, $postId);
    $photo = $result['photo'] ? $result['photo'] : '';

    if ($_SESSION['user_id'] != $result['user_id']) {
        header('Location: ../index.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $content = htmlspecialchars($_POST['content']);
        $newPhoto = $photo; 

        if(isset($_POST['delete_photo'])) {
            $newPhoto = '';
            if ($photo && file_exists('../../uploads/' . $photo)) {
                unlink('../../uploads/' . $photo);
            }
        }

        if (!empty($_FILES['photo']['name'])) {
            $uploadResult = checkPhoto($_FILES['photo'], true);

            if ($uploadResult) {
                $newPhoto = $uploadResult;
                if ($photo && file_exists('../../uploads/' . $photo)) {
                    unlink('../../uploads/' . $photo);
                }
            }
        }

        if (updatePost($conn, $postId, $content, $newPhoto)) {
            header('Location: ../index.php');
            exit();
        } else {
            echo "<script>alert('Failed to update post!')</script>";
        }
    }
?>
