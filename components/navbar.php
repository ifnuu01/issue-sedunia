<?php
function navbar()
{
    $userID = $_SESSION['user']['id'];
    return '
<nav class="navbar cream shadow border rounded-full">
    <a href="/issue-sedunia" class="logo w-12 h-12 flex items-center justify-center rounded-full">
        <img src="assets/icons/logo.svg" alt="logo">
    </a>

    <div class="navbar-options">
        <a href="/issue-sedunia" class="home-icon w-12 h-12 flex items-center justify-center rounded-full">
            <img src="assets/icons/home.svg" alt="home">
        </a>
        <a href="search.php" class="search-icon w-12 h-12 flex items-center justify-center rounded-full">
            <img src="assets/icons/search.svg" alt="search">
        </a>
        <button type="button" class="nav-add-post w-12 h-12 flex items-center justify-center rounded-full">
            <img src="assets/icons/add.svg" alt="add">
        </button>
        <button type="button" class="music-toggler w-12 h-12 flex items-center justify-center rounded-full">
            <img src="assets/icons/music.svg" alt="music">
        </button>
        <a href="/issue-sedunia/profile.php?id=' . htmlspecialchars($userID) . '" class="profile-icon w-12 h-12 flex items-center justify-center rounded-full">
            <img src="assets/icons/profile.svg" alt="profile">
        </a>
    </div>

    <div>
        <a href="editProfile.php?id=' . htmlspecialchars($userID) . '" class="setting-icon setting w-12 h-12 flex items-center justify-center rounded-full">
            <img src="assets/icons/setting.svg" alt="setting">
        </a>
        <a href="logout.php" class="setting-icon setting w-12 h-12 flex items-center justify-center rounded-full" onclick="return confirm(\'Are you sure you want to logout?\')">
            <img src="assets/icons/logout.svg" alt="logout">
        </a>
    </div>
</nav>

<script src="js/navbar.js"></script>
';
}
?>