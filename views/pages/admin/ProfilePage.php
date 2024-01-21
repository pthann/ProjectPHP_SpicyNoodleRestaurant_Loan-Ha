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

                <?php
                if ($this->getData('userData')) {
                    $userData = $this->getData('userData');
                    ?>

                <?php if ($this->getData("errorMessage") != "") { ?>
                <div class="alert alert-danger" role="alert"><?= $this->getData("errorMessage") ?></div>
                <?php } ?>
                <?php if ($this->getData("successMessage") != "") { ?>
                <div class="alert alert-success" role="alert"><?= $this->getData("successMessage") ?></div>
                <?php } ?>
                <div class="card-body">
                    <div class="card-profile">
                        <div class="card-header-profile">
                            <div class="profile-image">
                                <img src="<?= $userData["avatar"] ?>" alt="">
                            </div>

                            <div class="profile-info">
                                <h3 class="profile-name"><?= $userData["name"] ?></h3>
                                <p class="profile-desc"><?= $userData["role"] ?></p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#profileupdatepassword">
                                    Đổi mật khẩu
                                </button>
                            </div>
                        </div>
                        <div class="profile-card-body">
                            <ul class="status">
                                <li class="m-3">
                                    <span class="status-value">SDT :</span>
                                    <span class="status-text"><?= $userData["telephone"] ?></span>
                                </li>
                                <li class="m-3">
                                    <span class="status-value">Email</span>
                                    <span class="status-text"><?= $userData["email"] ?></span>
                                </li>
                            </ul>

                            <!-- Button trigger modal -->

                            <div class="action">

                                <button onclick='showValueUpdateUser(
                                    "<?= $userData["id"] ?>",
                                    "<?= $userData["email"] ?>",
                                    "<?= $userData["name"] ?>",
                                    "<?= $userData["role"] ?>",
                                    "<?= $userData["telephone"] ?>",
                                    "<?= $userData["block"] ?>")' class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#updateUserModal">Update</button>

                                <button type="button" class="btn btn-outline" data-bs-toggle="modal"
                                    data-bs-target="#profiledetailModal">
                                    Chi tiết
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    } else {
                        echo '<p style="color:red;">Không có thông tin người dùng.</p>';
                    }
                    ?>


                <!-- Modal -->
                <div class="modal fade" id="profileupdatepassword" tabindex="-1"
                    aria-labelledby="profileupdatepasswordLabel" aria-hidden="true">

                    <form action="" method="post">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="profileupdatepasswordLabel">Đổi mật khẩu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label for="passwordUpdate" class="form-label">Password old:</label>
                                    <input type="password" value="<?= $userData["password"] ?>" class="form-control"
                                        id="passwor" required>

                                    <label for="passwordUpdate" class="form-label">Password New:</label>
                                    <input type="password" name="password" class="form-control" id="passwordUpdate"
                                        required>
                                    <span id="togglePassword" class="eye-icon" onclick="togglePassword()">👁️</span>

                                    <input type="hidden" name="id" value="<?= $userData["id"] ?>" id="userIdUpdate">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info"
                                        name="updatePasswordProfile">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <script>
                var passwordInputId = 'passwordUpdate';

                function togglePassword() {
                    const passwordInput = document.getElementById(passwordInputId);
                    const togglePasswordIcon = document.getElementById('togglePassword');

                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        togglePasswordIcon.innerHTML = '👁️';
                    } else {
                        passwordInput.type = 'password';
                        togglePasswordIcon.innerHTML = '👁️';
                    }
                }
                </script>

                <!-- modal update -->
                <div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="updateUserModalLabel"
                    aria-hidden="true">
                    <form action="" method="post">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <h5 class="modal-title" id="profiledetailModalLabel">
                                    Update profile
                                </h5>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="userEmailUpdate" class="form-label">Email:</label>
                                        <input type="email" value="<?= $userData["email"] ?>" class="form-control"
                                            name="email" id="userEmailUpdate" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userNameUpdate" class="form-label">Name:</label>
                                        <input type="text" class="form-control" value="<?= $userData["name"] ?>"
                                            name="name" id="userNameUpdate" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userAvatarUpdate" class="form-label">Avatar_link:</label>
                                        <input type="text" class="form-control" value="<?= $userData["avatar"] ?>"
                                            name="avatar" id="userAvatarUpdate" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userTelephoneUpdate" class="form-label">Telephone:</label>
                                        <input type="text" class="form-control" value="<?= $userData["telephone"] ?>"
                                            name="telephone" id="userTelephoneUpdate" required>
                                        <span id="telephoneError" style="color: red;"></span>
                                    </div>

                                    <div class="mb-3">
                                        <label for="userRoleUpdate" class="form-label">Role:</label>
                                        <select class="form-select" name="role" id="userRoleUpdate" required>
                                            <option value="ADMIN" <?= $userData["role"] == 'ADMIN' ? 'selected' : '' ?>>
                                                ADMIN</option>
                                            <option value="USER" <?= $userData["role"] == 'USER' ? 'selected' : '' ?>>
                                                USER</option>
                                        </select>
                                    </div>

                                    <input type="hidden" name="id" value="<?= $userData["id"] ?>" id="userIdUpdate">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-info" name="updateprofileUser">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

        </div>

        <script>
        document.getElementById('userTelephoneUpdate').addEventListener('input', function() {
            var telephoneInput = this.value;
            var telephoneError = document.getElementById('telephoneError');

            // Kiểm tra nếu độ dài không nằm trong khoảng từ 10 đến 11
            if (telephoneInput.length < 10 || telephoneInput.length > 11) {
                telephoneError.textContent = 'Số điện thoại phải có từ 10 đến 11 số';
            } else {
                telephoneError.textContent = ''; // Xóa thông báo nếu hợp lệ
            }
        });
        </script>


        <!-- Modal chi tiết-->
        <div class="modal fade" id="profiledetailModal" tabindex="-1" aria-labelledby="profiledetailModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content-profile">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profiledetailModalLabel">
                            <?= $userData["name"] ?>
                            <span>|</span>
                            <?= $userData["role"] ?>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="exampleInputname">Avatar</label>
                                    <img src="<?= $userData["avatar"] ?>" alt="" style="width:100%;">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" value="<?= $userData["email"] ?>" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="exampleInputname">Name</label>
                                            <input type="text" value="<?= $userData["name"] ?>" class="form-control"
                                                id="exampleInputname" aria-describedby="namelHelp" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="exampleInputname">Role</label>
                                            <input type="text" value="<?= $userData["role"] ?>" class="form-control"
                                                id="exampleInputname" aria-describedby="namelHelp" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputname">Telephone</label>
                                    <input type="text" value="<?= $userData["telephone"] ?>" class="form-control"
                                        id="exampleInputname" aria-describedby="namelHelp" disabled>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="exampleInputname">Gender</label>
                                            <input type="text"
                                                value="?= $userData["gender"] == '' ? 'Không có thông tin' : $userData["gender"] ?>"
                                                class="form-control" id="exampleInputname" aria-describedby="namelHelp"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="exampleInputname">Point</label>
                                            <input type="text"
                                                value="?= $userData["point"] == 0 ? 'Không có thông tin' : $userData["point"] ?>"
                                                class="form-control" id="exampleInputname" aria-describedby="namelHelp"
                                                disabled>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label for="exampleInputname">Block</label>
                                    <input type="text"
                                        value="?= $userData["block"] == 0 ? 'Không có thông tin' : $userData["block"] ?>"
                                        class="form-control" id="exampleInputname" aria-describedby="namelHelp"
                                        disabled>
                                </div> -->

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" value="<?= $userData["password"] ?>" class="form-control"
                                        id="exampleInputPassword1" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    </div>
                </div>
            </div>
        </div>

        </section>
    </div>
    <?php include_once("views/components/AdminFooter.php") ?>
    </div>
    <?php include_once("views/components/AdminScript.php") ?>
    <script src="/views/scripts/Users.js"></script>
    <script src="/views/scripts/Users.js"></script>
</body>

</html>

<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap");

.card-body {
    display: flex;
    height: 80vh;
    justify-content: center;
    align-items: center;
}

.card-profile {
    width: 500px;
    position: absolute;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 2rem;
    background-color: white;
    border-radius: 1rem;
    box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.6);
}

.profile-image img {
    position: relative;
    top: -60px;
    border-radius: 1rem;

    width: 20rem;
    height: 20rem;
    background-position: center;
    background-size: cover;
    box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.4);
}

.profile-info {
    text-align: center;
    margin-top: -3rem;
    margin-bottom: 1rem;
}

.profile-info.profile-name {
    color: #020d2c;
}

.profile-info>.profile-desc {
    color: #666666;
    font-size: 0.9rem;
}

.status {
    list-style: none;
    display: flex;
    justify-content: space-between;
    text-align: center;
    line-height: 1rem;
    margin-bottom: 1.3rem;
}

.status-value {
    color: #212121;
    font-weight: 700;
}

.status-text {
    font-size: 0.8rem;
    color: #7c7c7d;
}

.action {
    display: flex;
    justify-content: space-between;
}

.btn {
    border: none;
    padding: 0.8em 1.9em;
    border-radius: 0.35rem;
    cursor: pointer;
    font-weight: 600;
}

.btn-success {
    background: #133185;
    color: white;
}

.btn-outline {
    border: 1px solid;
    background: transparent;
    color: #133185;
}

.btn-success:hover {
    background: #1331859d;
    color: white;
}

.btn-outline:hover {
    border: 1px solid;
    background: transparent;
    color: #1331859d;
}
</style>