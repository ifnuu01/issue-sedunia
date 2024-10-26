<?php
function registerUser($conn, $username, $email, $password)
{
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row['email'] == $email) {
        echo "<script>alert('Email already use!')</script>";
        return false;
    }
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    return $conn->query("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$passwordHash')");
}

function loginUser($conn, $email, $password)
{
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            return $user;
        } else {
            echo "<script>alert('Invalid password!')</script>";
        }
    } else {
        echo "<script>alert('Invalid email!')</script>";
    }
    return false;
}
function addPost($conn, $user_id, $content, $photo)
{
    $sql = "INSERT INTO posts (user_id, content, photo) VALUES ('$user_id', '$content', '$photo')";
    return $conn->query($sql);
}

function getPosts($conn)
{
    $sql = "SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY created_at DESC";
    return $conn->query($sql);
}

function getSinglePost($conn, $id)
{
    $sql = "SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = '$id' ORDER BY created_at DESC";
    return $conn->query($sql)->fetch_assoc();
}

function updatePost($conn, $id, $content, $photo)
{
    $sql = "UPDATE posts SET content = '$content', photo = '$photo' WHERE id = '$id'";
    return $conn->query($sql);
}

function deletePost($conn, $id)
{
    $sql = "DELETE FROM posts WHERE id = '$id'";
    return $conn->query($sql);
}

function checkPhoto($data, $isEdit)
{
    $fileName = $data['name'];
    $fileSize = $data['size'];
    $tmpName = $data['tmp_name'];
    var_dump($data);

    $validExt = ['jpg', 'jpeg', 'png'];
    $fileExt = explode('.', $fileName);
    $fileExt = strtolower(end($fileExt));

    if (!in_array($fileExt, $validExt)) {
        echo "<script>alert('Invalid file type!')</script>";
        return false;
    }

    if ($fileSize > 1000000) {
        echo "<script>alert('File too large!')</script>";
        return false;
    }

    // $newFileName = uniqid();
    $newFileName = date('Y-m-d H.i.s');
    $newFileName .= '.';
    $newFileName .= $fileExt;

    if ($isEdit) { // masukan ke folder img/profels
        move_uploaded_file($tmpName, '../img/profiles' . $newFileName);
    } else { // masukan ke folder img/posts
        move_uploaded_file($tmpName, '../img/posts' . $newFileName);
    }

    return $newFileName;
}

function ifPhoto($photo)
{ //memeriksa apakah foto di input atau tidak
    if ($photo) { //jika foto di input
        return true;
    } else { //jika foto tidak di input
        return false;
    }
}

function deletePhoto($conn, $id)
{
    $sql = "UPDATE posts SET photo = NULL WHERE id = '$id'";
    $queryPhoto = "SELECT photo FROM posts WHERE id = '$id'";
    $result = $conn->query($queryPhoto);
    $photo = $result->fetch_assoc()['photo'];
    if ($photo) {
        unlink('../img/posts/' . $photo);
    }
    return $conn->query($sql);
}

function deleteUser($conn, $id)
{
    $sql = "DELETE FROM users WHERE id = '$id'";
    return $conn->query($sql);
}

function checkPassword($conn, $id, $password)
{
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        return true;
    } else {
        return false;
    }
}

function updateProfile($conn, $id, $username, $fullname, $bio, $newPassword, $oldPassword, $photo)
{
    ifPhoto($photo);
    if ($photo) {
        $statusPhoto = checkPhoto($photo, false);
        if ($statusPhoto != false) {
            $status = checkPassword($conn, $id, $oldPassword);
            $photo = $statusPhoto;
            if ($status) {
                $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                $sql = "UPDATE users SET username = '$username', fullname = '$fullname', bio = '$bio', password = '$passwordHash', photo = '$photo' WHERE id = '$id'";
                return $conn->query($sql);
            } else {
                echo "<script>alert('Wrong Current Password!')</script>";
                return null;
            }
        } else {
            return null;
        }
    } else {
        $status = checkPassword($conn, $id, $oldPassword);
        if ($status) {
            $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET username = '$username', fullname = '$fullname', bio = '$bio', password = '$passwordHash' WHERE id = '$id'";
            return $conn->query($sql);
        } else {
            echo "<script>alert('Wrong Current Password!')</script>";
            return null;
        }
    }


}

function editPost($conn, $id, $category, $title, $content, $photo)// fungsi editPost
{
    if ($category == 1) {
        $category = 1; //front end
        ifPhoto($photo);
        if ($photo) { //jika foto di input
            $statusPhoto = checkPhoto($photo, false); // cek foto
            if ($statusPhoto != false) {
                $photo = $statusPhoto;
                $sql = "UPDATE posts SET category_id = '$category', title = '$title', 'content' = 'content', photo ='$photo' WHERE id = '$id'";
                return $conn->query($sql);
            } else {
                return null;
            }
        } else { //jika foto tidak di input
            $sql = "UPDATE posts SET category_id = '$category', title = '$title', 'content' = 'content' WHERE id = '$id'";
            return $conn->query($sql);
        }
    } else if ($category == 2) {
        $category = 2; //back end
        ifPhoto($photo);
        if ($photo) { //jika foto di input
            $statusPhoto = checkPhoto($photo, false); // cek foto
            if ($statusPhoto != false) {
                $sql = "UPDATE posts SET category_id = '$category', title = '$title', 'content' = 'content', photo ='$photo' WHERE id = '$id'";
                return $conn->query($sql);
            } else {
                return null;
            }
        } else { //jika foto tidak di input
            $sql = "UPDATE posts SET category_id = '$category', title = '$title', 'content' = 'content' WHERE id = '$id'";
            return $conn->query($sql);
        }
    } else {
        $category = 3; //fullstack
        ifPhoto($photo);
        if ($photo) { //jika foto di input
            $statusPhoto = checkPhoto($photo, false); // cek foto
            if ($statusPhoto != false) {
                $sql = "UPDATE posts SET category_id = '$category', title = '$title', 'content' = 'content', photo ='$photo' WHERE id = '$id'";
                return $conn->query($sql);
            } else {
                return null;
            }
        } else { //jika foto tidak di input
            $sql = "UPDATE posts SET category_id = '$category', title = '$title', 'content' = 'content' WHERE id = '$id'";
            return $conn->query($sql);
        }
    }
}
?>