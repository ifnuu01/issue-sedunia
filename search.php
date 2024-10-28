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

    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <title>Search | Issue Sedunia</title>
</head>

<body>
    <?php
    include 'components/navbar.php';
    echo navbar();
    ?>
    <h2 class="heading text-center mb-6">Posts</h2>

    <div class="music-container hidden p-c cream border shadow rounded-lg">
        <h2 class="font-bold mb-6">Soundboard</h2>
    </div>

    <dialog class="dialog cream shadow border rounded-lg">
        <div class="p-c border-b grid grid-cols-3">
            <div class="flex gap-3 items-center">
                <div class="w-5 h-5 rounded-full shadow border red"></div>
                <div class="w-5 h-5 rounded-full shadow border yellow"></div>
                <div class="w-5 h-5 rounded-full shadow border green"></div>
            </div>
            <h2 class="text-center font-bold">New Post</h2>
            <button type="button" class="cancel-post text-end font-medium">Cancel</button>
        </div>
        <div class="p-c flex gap-6">
            <div class="avatar white rounded-full shadow border"></div>
            <form action="" class="w-full" enctype="multipart/form-data" method="POST">
                <div class="mb-6">
                    <label for="kategori" class="heading block mb-2">Category</label>
                    <select name="kategori" id="kategori" class="px-6 py-2 purple rounded shadow border w-full">
                        <option value="Front-End" selected>Front-End</option>
                        <option value="Back-End">Back-End</option>
                        <option value="Full-Stack">Full-Stack</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="title" class="heading block mb-2">Title Post</label>
                    <input type="text" name="title" id="title" placeholder="Raana! What's new?" class="w-full blue p-c rounded-lg border shadow">
                </div>
                <div class="mb-6">
                    <label for="description" class="heading block mb-2">Description Post</label>
                    <input type="text" name="description" id="description" placeholder="What's your describe about this post" class="w-full yellow p-c rounded-lg border shadow">
                </div>
                <div class="mb-10">
                    <label for="photoPost" class="heading block mb-2">Photo Post</label>
                    <input type="file" name="photoPost" id="photoPost" class="mb-6 w-full light-green p-c rounded-lg border shadow">
                    <button type="button" class="btn px-4 py-2 red rounded shadow border font-medium">Delete Photo Post</button>
                </div>
                <button type="submit" class="btn auth w-full px-6 font-bold py-2 flex text-center justify-center border shadow rounded-lg">Post</button>
            </form>
        </div>
    </dialog>

    <article class="btn-upload-modal flex gap-6 items-center mb-6">
        <div class="avatar white shadow border rounded-full"></div>
        <div class="w-full p-c cream shadow border rounded-full">Hi Raana! What's new?</div>
    </article>

    <script src="js/script.js"></script>
</body>

</html>