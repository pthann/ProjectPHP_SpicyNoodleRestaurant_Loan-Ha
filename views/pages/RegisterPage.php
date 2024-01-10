<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>
</head>
<style>
    form {
        width: 600px;
    }
    .login{
        background-color: green;
    }
    .login:hover{
        background-color: red;
    }
    .login a{
        text-decoration: none; 
        color:white;
        outline: none;
    }
</style>
<body>
<?php 
    include_once('views/components/HeaderAccountLinks.php');
?>
    <form class="card w-50 m-auto p-3 mt-5" action="" method="POST">
        <h2 class="text-center">Register</h2>
        <div class="row mt-3">
            <div class="col-3">
                <label for="fullname">Full name:</label>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-3">
                <label for="email">Email:</label>
            </div>
            <div class="col">
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-3">
                <label for="password">Password:</label>
            </div>
            <div class="col">
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-3">
                <label for="telephone">Phone number:</label>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="telephone" id="telephone" required>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-3">
                <label for="avatar">Avatar Link:</label>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="avatar" id="avatar" required>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-3">
                <label for="role">Role:</label>
            </div>
            <div class="col">
                <select class="form-select" name="role" id="role" required>
                    <option value="ADMIN">Admin</option>
                    <option value="USER">Customer</option>
                </select>
            </div>
        </div>
        <div class="mt-3 text-center">
           <p>You have an account? <button class="login"><a href="/login">Login now</a></button></p>
        </div>
        <button type="submit" class="btn btn-primary mt-3" name="submitRegister">Register</button>
        <span class="text-danger mt-3"><?= $this->getData("errorMessage")?></span>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php 
  include_once('views/components/FooterAccountLinks.php');
?>
</body>
</html>
