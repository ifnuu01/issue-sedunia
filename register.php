<?php
// include '../includes/connection.php';
// include '../includes/functions.php';

// if($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $username = htmlspecialchars($_POST['username']);
//     $email = htmlspecialchars($_POST['email']);
//     $password = htmlspecialchars($_POST['password']);

//     if(registerUser($conn, $username, $email, $password)) {
//         echo "<script>alert('Registration successful!')</script>";
//         header('Location: login.php');
//     } else {
//         echo "<script>alert('Registration failed!')</script>";
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- styles -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/auth.css">

    <title>Register | Issue Sedunia</title>
</head>

<body>
    <div class="mb-6 flex items-center gap-6">
        <img src="assets/icons/logo.svg" alt="logo">
        <h1 class="text-center font-bold text-lg">Register</h1>
    </div>
    <form action="" class="mb-6 p-c w-full cream border shadow rounded-lg">
        <div class="mb-6">
            <label for="username" class="heading block mb-2">Username</label>
            <input type="text" name="username" id="username" placeholder="Ex: fuyu" class="w-full red p-c rounded-lg border shadow">
        </div>
        <div class="mb-6">
            <label for="email" class="heading block mb-2">Email</label>
            <input type="email" name="email" id="email" placeholder="Ex: fuyu@gmail.com" class="w-full yellow p-c rounded-lg border shadow">
        </div>
        <div class="mb-10">
            <label for="password" class="heading block mb-2">Password</label>
            <input type="password" name="password" id="password" placeholder="Min 4 characters" class="w-full green p-c rounded-lg border shadow">
        </div>
        <a href="" class="btn px-6 font-bold py-2 flex text-center justify-center border shadow rounded-lg">Register</a>
    </form>
    <div>Already have account? <a href="login.php" class="blue px-1 py-1">Login</a></div>
</body>

</html>