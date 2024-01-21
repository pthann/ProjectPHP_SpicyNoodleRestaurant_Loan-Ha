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
            $array = [];
            ?>
            <?php foreach ($this->getData("cart") as $key => $value) : ?>
                <?php if($value["user_id"] == $_SESSION["userLogin"]){
                     foreach ($this->getData("food") as $key => $food){
                        if($value["food_id"] == $food["id"]){
                            $array[] = [
                                "food_id" => $food["id"],
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
                            <div>
                                <img src="<?= $foods['image'] ?>" alt="" class="img-fluid">
                                <br>
                                <b><?= $foods['name'] ?></b>
                            </div>
            
                            <p class="card-text price" data-food-price="<?= $foods['price'] ?>">Price: $<?= $foods['price'] ?></p>
                            <form method="post" action="/cart/increase_decrease" class="update-form">
                                <input type="number" name="itemId" value="1" min="1" data-food-id="<?= $foods['food_id'] ?>">
                                <button type="button" class="btn btn-success increase-btn increase">+</button>
                                <button type="button" class="btn btn-warning decrease-btn">-</button>
                            </form>
            
                            <form method="post" action="/cart/remove">
                                <input type="hidden" name="itemId" value="<?= $foods['food_id'] ?>">
                                <button type="button" class="btn btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#deleteItermModal">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        
        <div class="modal fade" id="deleteItermModal" tabindex="-1" aria-labelledby="deleteItermModalLabel" aria-hidden="true">
          <form action="" method="post">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="deleteItermModalLabel">Delete Iterm</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Are you sure to delete the item <span id="userNameDelete"></span>?</p>
                  <input type="hidden" name="id" id="userIdDelete">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-danger" name="deleteUser">Delete</button>
                </div>
              </div>
            </div>
          </form>
        </div>
    </div>

<script>
   document.addEventListener("DOMContentLoaded", function() {
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(deleteButton => {
        deleteButton.addEventListener('click', function() {
            console.log("Delete button clicked");
            const modal = document.getElementById('deleteItermModal');
            const userNameDelete = modal.querySelector('#userNameDelete');
            const userIdDelete = modal.querySelector('#userIdDelete');

            const card = this.closest('.card');
            const foodId = card.querySelector('[name="itemId"]').value;

            userNameDelete.textContent = foodId; 
            userIdDelete.value = foodId;

            const bsModal = new bootstrap.Modal(modal);
            bsModal.show();
        });
    });

    const updateForms = document.querySelectorAll('.update-form');

    updateForms.forEach(form => {
        form.addEventListener('click', function(event) {
            event.preventDefault();

            const inputField = this.querySelector('[name="itemId"]');
            const currentValue = parseInt(inputField.value, 10);

            if (event.target.classList.contains('increase-btn')) {
                inputField.value = currentValue + 1;
                updatePrice(this, currentValue + 1);
            } else if (event.target.classList.contains('decrease-btn')) {
                inputField.value = Math.max(currentValue - 1, 1);
                updatePrice(this, Math.max(currentValue - 1, 1));
            }
        });
    });

    function updatePrice(element, quantity) {
        const priceElement = element.closest('.card-body').querySelector('.price');
        const foodPrice = parseFloat(priceElement.getAttribute('data-food-price'));
        const totalPrice = quantity * foodPrice;
        priceElement.textContent = `$${totalPrice.toFixed(3)}`;
    }
});

</script>

</body>
</html>

<?php
include_once('views/components/Footer.php');
?>
