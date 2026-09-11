<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="utf-8">
<title>Blog - Blogs</title>
<link rel="stylesheet" href="../css/blogs.css">
</head>
<body>

<header>
    <h1>BLOG</h1>
    <nav>
        <a href="../index.php">Home</a>
        <a class="active" href="blogs.php">Blogs</a>
        <a href="postpage.php">Post</a>
    </nav>
</header>

<div class="layout">
    <main>
        <?php foreach ($blogs as $blog): ?>
            <a class="blog" href="blogpage.php?id=<?= $blog['id'] ?>">
                <img src="<?= $blog['image'] ?>" alt="">
                <div>
                    <h2><?= $blog['title'] ?></h2>
                    <p><strong><?= $blog['author'] ?></strong> - <span class="date"><?= $blog['date'] ?></span></p>
                </div>
            </a>
        <?php endforeach; ?>
    </main>
</div>

</body>
</html>
