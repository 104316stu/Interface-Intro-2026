<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="utf-8">
<title>Blog - Post</title>
<link rel="stylesheet" href="../css/postpage.css">
<script src="../scripts/postpage.js" defer></script>
</head>
<body>

<header>
    <h1>BLOG</h1>
    <nav>
        <a href="../index.php">Home</a>
        <a href="blogs.php">Blogs</a>
        <a class="active" href="postpage.php">Post</a>
    </nav>
</header>

<form class="layout" action="../Data/SendData.php" method="post" enctype="multipart/form-data">
    <aside>
        <label for="image">Main Image:</label>
        <div class="upload">
            <img alt="" class="preview-image">
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>

        <label for="author">Name:</label>
        <input type="text" id="author" name="author" placeholder="e.g: John Johnathan" required>

        <p class="hints-title">Hints:</p>
        <ul class="hints">
            <li id="hint-title">
                <strong>Page Has a title.</strong>
                <span>Geef je post een titel</span>
            </li>
            <li id="hint-length">
                <strong>Title is less than 70 chars.</strong>
                <span>0 / 70 tekens</span>
            </li>
            <li id="hint-image">
                <strong>Image</strong>
                <span>Kies een afbeelding</span>
            </li>
        </ul>

        <button class="post-button" type="submit">Plaatsen</button>
    </aside>

    <main>
        <p class="preview-title">Preview:</p>
        <img alt="" class="preview-image">

        <input id="input-title" class="title-input" type="text" name="title" placeholder="Titel van je post" maxlength="70" required>
        <textarea class="body-input" name="body" placeholder="Schrijf hier je post..." required></textarea>
    </main>
</form>

</body>
</html>
