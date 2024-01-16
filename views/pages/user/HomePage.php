<?php
include_once('views/components/Header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/views/styles/user/HomePage.css">
    <meta charset="UTF-8">
    <title>Restaurant Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container-fluid">
    <div class="groupImgHomepage">
        <img class="imageOfHomePage" src="https://micayhothot.vn/wp-content/uploads/2021/01/126284597_2782411405364385_2974907809222406954_o.jpg" alt="Image">
        <h1 class="welcome">Welcome To<br>HOT HOT Spicy Noodles Restaurant</h1>
    </div>

    <div>
        <h2>Restaurant space</h2>
        <img class="imageOfHomePage" src="https://cdn.hanamihotel.com/wp-content/uploads/2022/10/my-cay-hot-hot-phan-tu-1.jpg" alt=""><br>
        <img class="imageOfHomePage" src="https://micayhothot.vn/wp-content/uploads/2021/01/126284597_2782411405364385_2974907809222406954_o.jpg" alt=""><br>
        <h2>Food and drinks</h2>
   
    <div class="foodHomepage">
            <div class="row">
                <?php foreach ($this->getData("food") as $key => $value) : ?>
                <a href="/detail?id=<?= $value['id'] ?>" class="col-md-2 imageFoodOfHome">
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
<?php 
include_once('views/components/Footer.php'); 
?>
</html>



