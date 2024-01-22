<?php
include_once('views/components/Header.php');
$foodData = $this->getData("food");

if (is_array($foodData) && count($foodData) > 0) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Restaurant Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/views/styles/user/DetailFood.css">
</head>

<body>
    <div class="row container-fluid">
        <?php foreach ($foodData as $key => $value) : ?>
        <div class="col-md-8">
            <div class="foodDescription">
                <h2 class="nameFood"><?= $value['name'] ?></h2>
                <p class="descriptionFood"><?= $value['description'] ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <a href="/detail?id=<?= $value['id'] ?>" class="imageFoodOfHome">
                <img class="imageFood" src="<?= $value['image_link'] ?>" alt="<?= $value['name'] ?>"
                    class="img-fluid "><br>
            </a>
        </div>

        <form method="post" action="">
            <input type="hidden" name="user_id" value="<?= $_SESSION['userLogin'] ?>">
            <input type="hidden" name="foodId" value="<?= $value['id'] ?>">
            <input type="hidden" name="foodName" value="<?= $value['name'] ?>">
            <input type="hidden" name="foodPrice" value="<?= $value['price'] ?>">
            <input type="hidden" name="foodimg" value="<?= $value['image_link'] ?>">
            <input type="hidden" name="foodqty" value="1">
            <button type="submit" name="add" class="btn btn-danger addCart">Add to cart</button>
        </form>

        <?php if (($key + 1) % 2 === 0) : ?>
        <div class="w-100"></div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
</body>

</html>
<?php
} else {
    echo "No food data available.";
}

include_once('views/components/Footer.php');
?>