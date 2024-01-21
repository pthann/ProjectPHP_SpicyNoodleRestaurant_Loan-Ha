<!DOCTYPE html>
<html lang="en">
<?php include_once("views/components/AdminHead.php") ?>
<link rel="stylesheet" href="/views/styles/admin/Users.css">

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include_once("views/components/AdminNavBar.php") ?>
        <?php include_once("views/components/AdminAside.php") ?>
        <div class="content-wrapper">
            <?php include_once("views/components/AdminHeader.php") ?>
            <section class="content container">
                <div class="d-flex justify-content-between">

                    <form class="d-flex" method="GET">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search by Email, Name"
                            id="searchUser" aria-label="Search">
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
                                <th scope="col">ID</th>
                                <th scope="col">FullName</th>
                                <th scope="col">Email</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Role</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Point</th>
                                <th scope="col">Enable</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->getData("users") as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?= $value["id"] ?></th>
                                <td><?= $value["name"] ?></td>
                                <td><?= $value["email"] ?></td>
                                <td><?= $value["gender"] ?></td>
                                <td>
                                    <img width="50px" src="<?= $value["avatar"] ?>" alt="User Avatar">
                                </td>

                                <td><?= $value["role"] ?></td>
                                <td><?= $value["telephone"] ?></td>
                                <td><?= $value["point"] ?></td>
                                <td><?= $value["block"] ? 'Blocked' : 'Active' ?></td>
                                <td>
                                    <button
                                        onclick='showValueUpdateUser("<?= $value["id"] ?>","<?= $value["email"] ?>","<?= $value["name"] ?>","<?= $value["role"] ?>","<?= $value["telephone"] ?>","<?= $value["block"] ?>")'
                                        class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#updateUserModal">Update</button>

                                    <button
                                        onclick='showMessageDeleteUser("<?= $value["id"] ?>","<?= $value["name"] ?>")'
                                        class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteUserModal">Delete</button>
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




                <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel"
                    aria-hidden="true">
                    <form action="" method="post">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteUserModalLabel">Delete User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure to delete the user with name <span id="userNameDelete"></span>?</p>
                                    <input type="hidden" name="id" id="userIdDelete">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger" name="deleteUser">Delete</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="updateUserModalLabel"
                    aria-hidden="true">
                    <form action="" method="post">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="userEmailUpdate" class="form-label">Email:</label>
                                        <input type="email" class="form-control" name="email" id="userEmailUpdate"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userNameUpdate" class="form-label">Name:</label>
                                        <input type="text" class="form-control" name="name" id="userNameUpdate"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userAvatarUpdate" class="form-label">Avatar_link:</label>
                                        <input type="text" class="form-control" name="avatar" id="userAvatarUpdate"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userTelephoneUpdate" class="form-label">Telephone:</label>
                                        <input type="text" class="form-control" name="telephone"
                                            id="userTelephoneUpdate" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="userRoleUpdate" class="form-label">Role:</label>
                                        <select class="form-select" name="role" id="userRoleUpdate" required>
                                            <option value="ADMIN">Admin</option>
                                            <option value="USER">Customer</option>
                                        </select>
                                    </div>


                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="block"
                                            id="userBlockUpdate" <?= $value["block"] ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="userBlockUpdate">Block User</label>
                                    </div>

                                    <input type="hidden" name="id" id="userIdUpdate">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
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
    <script src="/views/scripts/Users.js"></script>
</body>

</html>