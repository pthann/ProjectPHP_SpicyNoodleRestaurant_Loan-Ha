<?php
function generateRandomCode() {
    $prefix = 'MDH';
    $randomPart = substr(uniqid(), 7, 6);

    return $prefix . $randomPart;
}
$randomCode = generateRandomCode();
?>
<?php
    $userData = $this->getData('userData');
    ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once("views/components/AdminHead.php") ?>
<link rel="stylesheet" href="/views/styles/admin/Product.css">

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include_once("views/components/AdminNavBar.php") ?>
        <?php include_once("views/components/AdminAside.php") ?>
        <div class="content-wrapper">
            <?php include_once("views/components/AdminHeader.php") ?>
            <section class="content container-fluid">
                <div class="d-flex justify-content-between">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addFoodModal">Add
                        Order</button>
                </div>



                <div class="table-container mt-2">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Name Foot</th>
                                <th scope="col">Price Foot</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Totabl</th>
                                <th scope="col">Id User</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Code</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Table</th>
                                <th scope="col">Date</th>
                                <th scope="col">Active</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            $totalAmount = 0;
                            $totalQtyAmount = 0;

                            $columnTotalAmount = [
                                'qty' => 0,
                                'price' => 0,
                            ];

                            foreach ($this->getData("order") as $key => $value) :
                                $i++;
                                $foodInfo = $this->getFoodNameById($value['id_foood']);
                                
                                $qtyAmount = floatval($foodInfo['price']) * intval($value['qty']);
                                $totalQtyAmount += $qtyAmount;
                                
                                $columnTotalAmount['qty'] += floatval($foodInfo['price']) * intval($value['qty']);
                                $columnTotalAmount['price'] += floatval($foodInfo['price']);
                            ?>

                            <tr>
                                <td><?= $i;?></td>
                                <td><?= $foodInfo['name']; ?></td>
                                <td><?= $foodInfo['price']; ?></td>
                                <td>
                                    <form action="" method="post" class="row">
                                        <div class="col-5">
                                            <input type="number" step="1" min="1" max="99" value="<?=$value['qty']?>"
                                                name="qty" class="quantity-field border-0 text-center w-100">
                                        </div>
                                        <div class="col-7">
                                            <input type="hidden" name="id" value="<?=$value['id']?>">
                                            <button type="submit" name="update_qty"
                                                class="btn btn-info w-100">Update</button>
                                        </div>
                                    </form>
                                </td>
                                <td><?= number_format($qtyAmount, 3, '.', ','); ?></td>
                                <td><?=$value['id_user']?></td>
                                <td><?=$value['customer_name']?></td>
                                <td><?=$value['code']?></td>
                                <td><?=$value['phone']?></td>
                                <td><?=$value['table_id']?></td>
                                <td><?=$value['date']?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <button onclick='showValueUpdateFood(
                                            <?= $value["id"] ?>,
                                            "<?= $value["id_foood"] ?>",
                                            "<?= $value["id_user"] ?>",
                                            "<?= $value["customer_name"] ?>",
                                            "<?= $value["qty"] ?>",
                                            "<?= $value["phone"] ?>",
                                            "<?= $value["table_id"] ?>",
                                            "<?= $value["description"] ?>"
                                        )' class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#updateFoodModal">Update</button>
                                        </div>
                                        <div class="col-xl-6">
                                            <button
                                                onclick='showMessageDeleteFood("<?= $value["id"] ?>","<?= $value["code"] ?>")'
                                                class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteFoodModal">Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <?php endforeach; ?>


                        </tbody>

                    </table>
                    <div class="row">
                        <div class="col-2">
                            <span style="list-style: none;">Total Amount by Column :</span>
                        </div>
                        <div class="col-10">
                            <span
                                style="color:red;"><?= number_format($columnTotalAmount['qty'], 3, '.', ','); ?></span>
                        </div>
                    </div>
                </div>


                <?php if ($this->getData("errorMessage") != "") { ?>
                <div class="alert alert-danger" role="alert"><?= $this->getData("errorMessage") ?></div>
                <?php } ?>
                <?php if ($this->getData("successMessage") != "") { ?>
                <div class="alert alert-success" role="alert"><?= $this->getData("successMessage") ?></div>
                <?php } ?>
                <div class="modal fade" id="updateFoodModal" tabindex="-1" aria-labelledby="updateFoodModalLabel"
                    aria-hidden="true">

                    <form action="" method="post">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="updateFoodModalLabel">Update Product</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="foodName" class="form-label">Product Name:</label>
                                        <select class="form-select" name="id_foood" id="id_foood"
                                            aria-label="Default select example">
                                            <?php foreach ($this->getData("foods") as $key => $item) : ?>
                                            <option value="<?= $item['id'] ?>">
                                                <?= $item['name'] ?>
                                                <span> || </span>
                                                <?= $item['price'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="code" value="<?=$randomCode?>">

                                    <div class="mb-3">
                                        <label for="foodName" class="form-label">Name:</label>
                                        <select class="form-select" name="id_user" id="id_user"
                                            aria-label="Default select example">
                                            <?php foreach ($this->getData("users") as $key => $item) : ?>
                                            <option value="<?= $item['name'] ?>(<?= $item['role'] ?>)">
                                                <?= $item['name'] ?>
                                                <span> || </span>
                                                <?= $item['role'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="customer_name" class="form-label">Name Customer:</label>
                                        <input type="text" class="form-control" name="customer_name" id="customer_name"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Telephone:</label>
                                        <input type="number" class="form-control" name="phone" id="phone_id"
                                            value="<?= $value['phone'] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="table_id22" class="form-label">Table Name:</label>
                                        <select class="form-select" name="table_id" id="table_id"
                                            aria-label="Default select example">
                                            <?php foreach ($this->getData("tables") as $key => $tab) : ?>
                                            <option value="<?=$tab['name']?>"><?=$tab['name']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description:</label>
                                        <textarea class="form-control" name="description" id="description"
                                            rows="3">Description</textarea>
                                    </div>
                                    <input type="hidden" name="id" id="orderIdUpdate">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-info" name="updateorderFood">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <!-- add order -->
                <div class="modal fade" id="addFoodModal" tabindex="1" aria-labelledby="addFoodModalLabel"
                    aria-hidden="true">
                    <form action="" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addFoodModalLabel">Add Order</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="foodName" class="form-label">Product Name:</label>
                                        <select class="form-select" name="id_food[]" id="foodName"
                                            aria-label="Default select example" multiple>
                                            <?php foreach ($this->getData("foods") as $key => $item) : ?>
                                            <option value="<?= $item['id'] ?>">
                                                <?= $item['name'] ?>
                                                <span> || </span>
                                                <?= $item['price'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <input type="hidden" name="code" value="<?=$randomCode?>">
                                    <input type="hidden" name="qty" value="1">
                                    <div class="mb-3">
                                        <label for="foodName" class="form-label">Name:</label>
                                        <select class="form-select" name="id_user" aria-label="Default select example">
                                            <?php foreach ($this->getData("users") as $key => $item) : ?>
                                            <option value="<?= $item['name'] ?>(<?= $item['role'] ?>)">
                                                <?= $item['name'] ?>
                                                <span> || </span>
                                                <?= $item['role'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="foodPrice" class="form-label">Customer Name:</label>
                                        <input type="text" class="form-control" name="customer_name" id="foodPrice"
                                            required placeholder="Enter the customer's name">
                                    </div>

                                    <div class="mb-3">
                                        <label for="foodPrice" class="form-label">Phone:</label>
                                        <input type="text" class="form-control" name="phone" id="foodPrice" required
                                            placeholder="Enter the customer's phone number">
                                    </div>

                                    <div class="mb-3">
                                        <label for="foodName" class="form-label">Table Name:</label>
                                        <select class="form-select" name="table_id" id="foodName"
                                            aria-label="Default select example">
                                            <?php foreach ($this->getData("tables") as $key => $tab) : ?>
                                            <option value="<?=$tab['name']?>"><?=$tab['name']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description:</label>
                                        <textarea class="form-control" name="description" id="description" rows="3"
                                            placeholder="Enter notes for customers"></textarea>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="addorderFood" class="btn btn-success">Add</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <!-- delete -->
                <div class="modal fade" id="deleteFoodModal" tabindex="-1" aria-labelledby="deleteFoodModalLabel"
                    aria-hidden="true">
                    <form action="" method="post">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteFoodModalLabel">Delete Product</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure to delete the product with name <span id="foodNameDelete"></span>?
                                    </p>
                                    <input type="hidden" name="id" id="foodIdDelete">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger" name="deleteFood">Delete</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


        </div>
        </section>
    </div>
    <?php include_once("views/components/AdminFooter.php") ?>
    </div>
    <?php include_once("views/components/AdminScript.php") ?>
    <script src="/views/scripts/order.js"></script>
    <script>
    function incrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('td');
        var quantityField = parent.find('input[name=' + fieldName + ']');
        var currentVal = parseInt(quantityField.val(), 10);

        if (!isNaN(currentVal)) {
            quantityField.val(currentVal + 1);
        } else {
            quantityField.val(0);
        }
    }

    function decrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('td');
        var quantityField = parent.find('input[name=' + fieldName + ']');
        var currentVal = parseInt(quantityField.val(), 10);

        if (!isNaN(currentVal) && currentVal > 0) {
            quantityField.val(currentVal - 1);
        } else {
            quantityField.val(0);
        }
    }

    $('.input-group').on('click', '.button-plus', function(e) {
        console.log('Button Plus Clicked');
        incrementValue(e);
    });

    $('.input-group').on('click', '.button-minus', function(e) {
        console.log('Button Minus Clicked');
        decrementValue(e);
    });
    $('.input-group').on('change', '.quantity-field', function() {
        var quantityValue = $(this).val();
        console.log('Quantity:', quantityValue);
    });
    </script>

</body>

</html>