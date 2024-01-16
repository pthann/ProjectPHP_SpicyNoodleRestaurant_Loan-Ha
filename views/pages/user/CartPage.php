<?php
include_once('views/components/Header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
</head>
<body>
    <div class="container">
        <h2>Cart</h2>
        <div class="row">
            <?php 
            $array=[];
             ?>
                <?php foreach ($this->getData("cart") as $key => $value) : ?>
                    <?php if($value["user_id"] == $_SESSION["userLogin"]){
                         foreach ($this->getData("food") as $key => $food){
                            if($value["food_id"] == $food["id"]){
                                $array[] = [
                                    "image" => $food["image_link"],
                                    "price" => $food["price"],
                                    "name" => $food["name"],
                                ];
                            }
                         }     
                    } ?>
                <?php endforeach; ?>
            <?php foreach($array as $foods) :?>
                <div class="col-md-4">
                            <div class="card">
                                <img src="" alt="" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text"><?php echo $foods['image']?></p>
                                    <p class="card-text">Price:<?php echo $foods['name']?></p>
                                    <p class="card-text">Quantity:  ?></p>

                                    <form method="post" action="/cart/increase">
                                        <input type="hidden" name="itemId"  ?>">
                                        <button type="submit" class="btn btn-success">+</button>
                                    </form>

                                    <form method="post" action="/cart/decrease">
                                        <input type="hidden" name="itemId"  ?>">
                                        <button type="submit" class="btn btn-warning">-</button>
                                    </form>

                                    <form method="post" action="/cart/remove">
                                        <input type="hidden" name="itemId"  ?>">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php endforeach ?>
        </div>
    </div>
</body>
</html>

<?php
include_once('views/components/Footer.php');
?>
