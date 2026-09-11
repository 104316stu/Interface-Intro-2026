<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="utf-8">
<title>Blog - <?= $post['title'] ?></title>
<link rel="stylesheet" href="../css/index.css">
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
        <img src="<?= $post['image'] ?>" alt="">
        <h2><?= $post['title'] ?></h2>
        <p><strong><?= $post['author'] ?></strong> - <span class="date"><?= $post['date'] ?></span></p>
        <?php foreach ($post['body'] as $alinea): ?>
            <p><?= $alinea ?></p>
        <?php endforeach; ?>
    </main>

    <aside>
        <?php foreach ($sidebar as $item): ?>
            <a href="blogpage.php?id=<?= $item['id'] ?>">
                <img src="<?= $item['image'] ?>" alt="">
                <p><?= $item['title'] ?></p>
            </a>
        <?php endforeach; ?>
    </aside>
</div>

</body>
</html>
