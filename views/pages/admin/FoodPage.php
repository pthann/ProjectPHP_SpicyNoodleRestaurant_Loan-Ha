<!DOCTYPE html>
<html lang="en">
<?php include_once("views/components/AdminHead.php") ?>
<link rel="stylesheet" href="/views/styles/Food.css">
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php include_once("views/components/AdminNavBar.php") ?>
    <?php include_once("views/components/AdminAside.php") ?>
    <div class="content-wrapper">
      <?php include_once("views/components/AdminHeader.php") ?>
      <section class="content container">
        <div class="d-flex justify-content-between">
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addFoodModal">Add Food</button>
          <form class="d-flex" method="GET">
            <input class="form-control me-2" type="search" name="search" placeholder="Search by ID, Name" id="searchFood" aria-label="Search">
            <button class="btn btn-outline-success">Search</button>
          </form>
        </div>
        <?php
          if(isset($_GET["search"])) {
            echo "Result for ".$_GET["search"].":";
          }
        ?>
      
        <div class="table-container mt-2">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($this->getData("foods") as $key => $value) { ?>
                <tr>
                  <th scope="row"><?= $value["id"] ?></th>
                  <td><?= $value["name"] ?></td>
                  <td><img src="<?= $value["image_link"] ?>" alt="<?= $value["name"] ?>" width="50px"></td>
                  <td><?= $value["price"] ?></td>
                  <td><?= $value["description"] ?></td>
                  <td>
                    <button onclick='showValueUpdateFood("<?= $value["id"] ?>","<?= $value["name"] ?>", "<?= $value["image_link"] ?>", "<?= $value["price"] ?>", "<?= $value["description"] ?>")' class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateFoodModal">Update</button>
                    
                    <button onclick='showMessageDeleteFood("<?= $value["id"] ?>","<?= $value["name"] ?>")' class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteFoodModal">Delete</button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

     
        <?php if ($this->getData("errorMessage") != "") { ?>
          <div class="alert alert-danger" role="alert"><?= $this->getData("errorMessage") ?></div>
        <?php } ?>
        <?php if ($this->getData("successMessage") != "") { ?>
          <div class="alert alert-success" role="alert"><?= $this->getData("successMessage") ?></div>
        <?php } ?>

     
        <div class="modal fade" id="addFoodModal" tabindex="1" aria-labelledby="addFoodModalLabel" aria-hidden="true">
          <form action="" method="POST">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="addFoodModalLabel">Add Food</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="foodName" class="form-label">Food Name:</label>
                    <input type="text" class="form-control" name="name" id="foodName" required>
                  </div>
                  <div class="mb-3">
                    <label for="foodImage" class="form-label">Image Link:</label>
                    <input type="text" class="form-control" name="image_link" id="foodImage" required>
                  </div>
                  <div class="mb-3">
                    <label for="foodPrice" class="form-label">Price:</label>
                    <input type="text" class="form-control" name="price" id="foodPrice" required>
                  </div>
                  <div class="mb-3">
                    <label for="foodDescription" class="form-label">Description:</label>
                    <textarea class="form-control" name="description" id="foodDescription" rows="3"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" name="addFood" class="btn btn-success">Add</button>
                </div>
              </div>
            </div>
          </form>
        </div>


        <div class="modal fade" id="deleteFoodModal" tabindex="-1" aria-labelledby="deleteFoodModalLabel" aria-hidden="true">
          <form action="" method="post">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="deleteFoodModalLabel">Delete Food</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Are you sure to delete the food with name <span id="foodNameDelete"></span>?</p>
                  <input type="hidden" name="id" id="foodIdDelete">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-danger" name="deleteFood">Delete</button>
                </div>
              </div>
            </div>
          </form>
        </div>

       
        <div class="modal fade" id="updateFoodModal" tabindex="-1" aria-labelledby="updateFoodModalLabel" aria-hidden="true">
          <form action="" method="post">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="updateFoodModalLabel">Update Food</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="foodNameUpdate" class="form-label">Food Name:</label>
                    <input type="text" class="form-control" name="name" id="foodNameUpdate" required>
                  </div>
                  <div class="mb-3">
                    <label for="foodImageUpdate" class="form-label">Image Link:</label>
                    <input type="text" class="form-control" name="image_link" id="foodImageUpdate" required>
                  </div>
                  <div class="mb-3">
                    <label for="foodPriceUpdate" class="form-label">Price:</label>
                    <input type="text" class="form-control" name="price" id="foodPriceUpdate" required>
                  </div>
                  <div class="mb-3">
                    <label for="foodDescriptionUpdate" class="form-label">Description:</label>
                    <textarea class="form-control" name="description" id="foodDescriptionUpdate" rows="3"></textarea>
                  </div>
                  <input type="hidden" name="id" id="foodIdUpdate">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-info" name="updateFood">Update</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
    <?php include_once("views/components/AdminFooter.php") ?>
  </div>
  <?php include_once("views/components/AdminScript.php") ?>
  <script src="/views/scripts/Food.js"></script>
</body>
</html>
