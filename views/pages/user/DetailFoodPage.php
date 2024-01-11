<?php
include_once('views/components/Header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <title>Restaurant Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/views/styles/user/DetailFood.css">
</head>

<body class="container-fluid">
    <div class="row">
        <?php foreach ($this->getData("foods") as $key => $value) : ?>
                <div class="col-md-8">
                        <div class="foodDescription">
                            <h2 class="nameFood"><?= $value['name'] ?></h2>
                            <p class="descriptionFood"><?= $value['description'] ?></p>
                            
                        </div>
                </div>
                <div class="col-md-4">
                        <a href="/detail?id=<?= $value['id'] ?>" class="imageFoodOfHome">
                            <img class="imageFood" src="<?= $value['image_link'] ?>" alt="<?= $value['name'] ?>" class="img-fluid "><br>
                        </a>

                </div>
                <div class="addCart">
                        <button type="submit" class="btn btn-danger" > <a class="addFood" href="/add-to-cart?id=<?= $value['id'] ?>">Add to cart</a></button>
                </div>

                <?php if (($key + 1) % 2 === 0) : ?>
                        <div class="w-100"></div>
                <?php endif; ?>
        <?php endforeach; ?>
    </div>
</body>
</html>
<?php 
include_once('views/components/Footer.php'); 
?>