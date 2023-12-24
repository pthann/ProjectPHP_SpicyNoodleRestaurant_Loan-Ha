<!DOCTYPE html>
<html lang="en">
<?php include_once("views/components/AdminHead.php") ?>
<link rel="stylesheet" href="/views/styles/Category.css">
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php include_once("views/components/AdminNavBar.php") ?>
    <?php include_once("views/components/AdminAside.php") ?>
    <div class="content-wrapper">
      <?php include_once("views/components/AdminHeader.php") ?>
      <section class="content container">
        <div class="d-flex justify-content-between">
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add Category</button>
          <form class="d-flex" method="GET">
            <input class="form-control me-2" type="search" name="search" placeholder="Search by id, name" id= "searchCategory" aria-label="Search">
            <button class="btn btn-outline-success">Search</button>
          </form>
        </div>

        <!--Content -->
        <div class="table-container mt-2">
          <table class="table" >
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody  >
              <?php foreach ( $this->getData("categories") as $key => $value) { ?>
                <tr>
                  <th scope="row"><?= $value["id"] ?></th>
                  <td><?= $value["name"] ?></td>
                  <td>
                    <button onclick='showValueUpdateCategory("<?= $value["id"] ?>","<?= $value["name"] ?>")' class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateModal">Update</button>
                    <button onclick='showMessageDeleteCategory("<?= $value["id"] ?>","<?= $value["name"] ?>")' class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>

          </table>
          </div>
        <!-- Message -->
        <?php
        if ($this->getData("errorMessage") != "") {
        ?>
          <!-- Alert -->
          <div class="alert alert-danger alert-dismissible fade show" role="alert"><?= $this->getData("errorMessage") ?></div>
        <?php
        }
        ?>
        <?php
        if ($this->getData("successMessage") != "") {
        ?>
          <!-- Alert -->
          <div class="alert alert-success alert-dismissible fade show" role="alert"><?= $this->getData("successMessage") ?></div>
        <?php
        }
        ?>
        <!-- Add Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
          <form action="" method="POST">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="addModalLabel">Add Category</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <label for="">Category name:</label>
                  <input type="text" class="form-control" name="name">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" name="addCategory" class="btn btn-success"> Add </button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!--  Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <form action="" method="post">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Category</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Are you sure delete category has name <span id="categoryNameDelete"></span> ?</p>
                  <input type="hidden" name="id" id="categoryIdDelete">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-danger" name="deleteCategory">Delete</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- Update Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
          <form action="" method="post">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="updateModalLabel">Update Category</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="text" class="form-control" name="name" id="categoryNameUpdate">
                  <input type="hidden" name="id" id="categoryIdUpdate">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-info" name="updateCategory">Update</button>
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
  <script src="/views/scripts/Category.js"></script>
</body>

</html>