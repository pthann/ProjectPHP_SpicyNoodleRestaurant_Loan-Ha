<!DOCTYPE html>
<html lang="en">
<?php include_once("views/components/AdminHead.php") ?>
<link rel="stylesheet" href="/views/styles/User.css">

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php include_once("views/components/AdminNavBar.php") ?>
    <?php include_once("views/components/AdminAside.php") ?>
    <div class="content-wrapper">
      <?php include_once("views/components/AdminHeader.php") ?>
      <section class="content container">
        <div class="d-flex justify-content-between">
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add User</button>
          <form class="d-flex" method="GET">
            <input class="form-control me-2" type="search" name="search" placeholder="Search by id, name" id="searchCategory" aria-label="Search">
            <button class="btn btn-outline-success">Search</button>
          </form>
        </div>
        <?php
        if (isset($_GET["search"])) {
          echo "<h3 class=\"mt-3 mb-3 text-bold\">Result for " . $_GET["search"] . ":</h3>";
        }
        ?>
        <!--Content -->
        <div class="table-container mt-2">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">FullName</th>
                <th scope="col">Gender</th>
                <th scope="col">Avatar</th>
                <th scope="col">Role</th>
                <th scope="col">Telephone </th>
                <th scope="col">Point</th>
                <th scope="col">Enable</th>
                <th scope="col">Action</th>

              </tr>
            </thead>

            <tbody>
              <?php foreach ($this->getData("users") as $key => $value) { ?>
                <tr>
                  <th scope="row"><?= $value["id"] ?></th>
                  <td><?= $value["first_name"] . " " .$value["last_name"] ?></td>
                  <td><?= $value["gender"] ?></td>
                  <td><img class="rounded-circle" width="120px" src="/views/images/uploads/users/<?=$value["avatar"]?>" alt=""></td>
                  <td><?= $value["role"] ?></td>
                  <td><?= $value["telephone"] ?></td>
                  <td><?= $value["point"] ?></td>
                  <td><?= $value["enable"] ?></td>


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
        if (isset($_SESSION["errorFlashMessage"])) {
        ?>
          <!-- Alert -->
          <div class="alert alert-danger alert-dismissible fade show" role="alert"><?= $_SESSION["errorFlashMessage"] ?></div>
        <?php
          unset($_SESSION["errorFlashMessage"]);
        }
        ?>
        <?php
        if (isset($_SESSION["successFlashMessage"])) {
        ?>
          <!-- Alert -->
          <div class="alert alert-success alert-dismissible fade show" role="alert"><?= $_SESSION["successFlashMessage"] ?></div>
        <?php
          unset($_SESSION["successFlashMessage"]);
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
                  <label for="">User name:</label>
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
                  <h1 class="modal-title fs-5" id="deleteModalLabel">Delete User</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Are you sure delete user has name <span id="categoryNameDelete"></span> ?</p>
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
        <!-- Update Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
          <form action="" method="post">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="updateModalLabel">Update User</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="text" class="form-control" name="name" id="userNameUpdate">
                  <input type="hidden" name="id" id="userIdUpdate">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-info" name="updateUser">Update</button>
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