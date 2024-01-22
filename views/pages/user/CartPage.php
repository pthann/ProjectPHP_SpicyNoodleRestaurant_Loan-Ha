<?php
include_once('views/components/Header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="/views/styles/user/Cart.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>


<body>
    <div class="container">
        <h1 class="title">Cart</h1>
        <?php
        if (isset($_SESSION['deleteSuccess']) && $_SESSION['deleteSuccess'] === true) {
            echo '<div id="deleteSuccessAlert" class="alert alert-success" role="alert">Đơn hàng đã được xóa thành công!</div>';
            unset($_SESSION['deleteSuccess']);
        }
        ?>

        <?php
        if (isset($_SESSION['updateSuccess'])) {
            echo '<div id="updateSuccessAlert" class="alert alert-success" role="alert">' . $_SESSION['updateSuccess'] . '</div>';
            unset($_SESSION['updateSuccess']);
        }
        ?>
        <?php if(isset($_SESSION['addtocartfood']) !=''): ?>
        <div class="row">
            <div class="col-xl-8">
                <div class="row">
                    <?php
                    $totalPrice = 0;
                    foreach ($_SESSION['addtocartfood'] as $foods):
                     
                        $productPrice = $foods['foodPrice'] * $foods['foodqty'];
                        $totalPrice += $productPrice;
                    ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="">
                                    <input type="hidden" name="deleteFoodId" value="<?= $foods['foodId'] ?>">
                                    <button type="submit" class="btn btn-danger delete-btn" name="deleteFood">X</button>
                                </form>

                                <h5 class="card-title"><?= $foods['foodName'] ?></h5>
                                <div>
                                    <img src="<?= $foods['foodimg'] ?>" alt="" class="img-fluid">
                                    <br>
                                </div>
                                <input type="hidden" name="id_user" value="<?= $_SESSION['userLogin'] ?>">
                                <input type="hidden" name="foodPrice" value="<?= $foods['foodPrice'] ?>">
                                <input type="hidden" name="foodimg" value="<?= $foods['foodimg'] ?>">
                                <input type="hidden" name="foodName" value="<?= $foods['foodName'] ?>">
                                <input type="hidden" name="id_foood" value="<?= $foods['foodId'] ?>">

                                <p class="card-text price" data-price="<?= $foods['foodPrice'] ?>">
                                    Price:<?= number_format($productPrice, 0, '.', '.') ?>.000 vnđ
                                </p>

                               
                                <label for="">Quantity</label><br>

                                <form action="" method="post">
                                    <div class="mb-3">
                                        <input type="number" name="updatedQty" value="<?= $foods['foodqty'] ?>" min="1"
                                            max="10">
                                        <input type="hidden" name="foodId" value="<?= $foods['foodId'] ?>">
                                    </div>
                                    <button type="submit" class="btn btn-success" name="updateQty">Update
                                        Quantity</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-xl-4">
                <form method="post" action="">
                    <p>Total Price:<span style="color:red;"> <?= number_format($totalPrice, 0, '.', '.')  ?>.000
                            vnđ</span> </p>
                    <h4>Form Information</h4>
                    <?php foreach ($_SESSION['addtocartfood'] as $foods): ?>
                    <input type="hidden" name="food_id[]" value="<?= $foods['foodId'] ?>">
                    <input type="hidden" name="foodimg[]" value="<?= $foods['foodimg'] ?>">
                    <input type="hidden" name="foodName[]" value="<?= $foods['foodName'] ?>">
                    <input type="hidden" name="food_qty[]" value="<?= $foods['foodqty'] ?>">
                    <input type="hidden" name="foodPrice[]" value="<?= $foods['foodPrice'] ?>">
                    <input type="hidden" name="id_user" value="<?= $_SESSION['userLogin'] ?>">
                    <input type="hidden" name="code" value="<?=$randomCode?>">

                    <?php endforeach; ?>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Customer name</label>
                        <input type="text" name="customer_name" class="form-control" id="exampleFormControlInput1"
                            placeholder="Enter the customer's name">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tele Phone</label>
                        <input type="text" name="phone" class="form-control" id="exampleFormControlInput1"
                            placeholder="Enter the customer's name">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Number table</label>
                        <select class="form-select" name="table_id" aria-label="Default select example">
                            <option selected>--Select number table--</option>
                            <?php foreach ($this->getData("tables") as $key => $tab) : ?>
                            <option value="<?=$tab['name']?>"><?=$tab['name']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Payment Methods</label>
                        <select class="form-select" name="payment_methods" aria-label="Default select example">
                            <option selected>--Select Payment Methods--</option>
                            <option value="1">Direct</option>
                            <option value="2">VnPay</option>
                            <option value="3">QR</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Note</label>
                        <textarea class="form-control" name="description" id="description" rows="3"
                            placeholder="You can write notes here up to 255 words"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="createAddToOrDer" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>


        </div>
        <?php else: ?>
        <p><?php echo 'Cart empty' ?></p>

        <?php endif; ?>
    </div>

    <script>
    setTimeout(function() {
        var deleteSuccessAlert = document.getElementById('deleteSuccessAlert');
        if (deleteSuccessAlert) {
            deleteSuccessAlert.style.display = 'none';
        }
    }, 2000);
    </script>
    <script>
    setTimeout(function() {
        var updateSuccessAlert = document.getElementById('updateSuccessAlert');
        if (updateSuccessAlert) {
            updateSuccessAlert.style.display = 'none';
        }
    }, 2000);
    </script>

    <script>
    function placeOrder() {
        window.location = "http://localhost:3009/payment";
    }

    document.addEventListener("DOMContentLoaded", function() {
        const totalAmountElement = document.getElementById('totalAmount');
        let totalPrice = 0;
        let priceElements = document.querySelectorAll(".price");
        priceElements.forEach(function(priceElement) {
            console.log(priceElement.getAttribute('data-price'));
            let foodPrice = parseFloat(priceElement.getAttribute('data-price'));
            totalPrice += foodPrice
        });
        totalAmountElement.textContent = totalPrice.toFixed(2);
        const prices = totalPrice;
        console.log(prices);

        const updateForms = document.querySelectorAll('.update-form');

        updateForms.forEach(form => {
            form.addEventListener('click', function(event) {
                event.preventDefault();

                const inputField = this.querySelector('[name="itemId"]');
                const currentValue = parseInt(inputField.value, 10);

                if (event.target.classList.contains('increase-btn')) {
                    inputField.value = currentValue + 1;
                    increaseQuantity(this, currentValue + 1);
                } else if (event.target.classList.contains('decrease-btn')) {
                    inputField.value = Math.max(currentValue - 1, 1);
                    reduceAmount(this, Math.max(currentValue - 1, 1));
                }
            });
        });

        function increaseQuantity(element, quantity) {
            const priceElement = element.closest('.card-body').querySelector('.price');
            const foodPrice = parseFloat(priceElement.getAttribute('data-price'));
            totalPrice += foodPrice
            totalAmountElement.textContent = totalPrice;
        };

        function reduceAmount(element, quantity) {
            let countQuantity = 0;
            if (quantity == 1) {
                countQuantity += 1;
            }
            if (countQuantity == 2) {
                return
            }
            const priceElement = element.closest('.card-body').querySelector('.price');
            const foodPrice = parseFloat(priceElement.getAttribute('data-price'));
            if (prices >= totalPrice) {
                totalAmountElement.textContent = prices.toFixed(3);
            } else {
                totalPrice -= foodPrice
                if (prices >= totalPrice) {
                    totalAmountElement.textContent = prices.toFixed(3);
                } else {
                    totalAmountElement.textContent = totalPrice.toFixed(3);
                }

            }
        }

    });
    </script>
    <?php
    include_once('views/components/Footer.php');
    ?>
</body>

</html>