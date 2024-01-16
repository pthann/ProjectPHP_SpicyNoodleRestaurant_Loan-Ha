<?php
include_once('views/components/Header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restaurant Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/views/styles/user/Menu.css">
    
</head>
<body class="container-fluid">
    <h1 class="titleTable">Menu</h1>
    <div class="Menu">
            <div class="row">
                <?php foreach ($this->getData("food") as $key => $value) : ?>
                <a href="/detail?id=<?= $value['id'] ?>" class="col-md-2 productMenu">
                        <div>
                            <img src="<?= $value['image_link'] ?>" alt="<?= $value['name'] ?>" class="img-fluid">
                            <br>
                            <b><?= $value['name'] ?></b>
                        </div>
                </a>
                <?php if (($key + 1) % 6 === 0) : ?>
            </div>
            <div class="row"> <?php endif; ?> <?php endforeach; ?></div>
    </div>
</body>
</html>

<?php
include_once('views/components/Footer.php');
?>
</html>
