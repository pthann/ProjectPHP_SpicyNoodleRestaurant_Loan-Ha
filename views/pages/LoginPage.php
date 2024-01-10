<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<style>
    .register{
        background-color: green;
    }
    .register:hover{
        background-color: red;
    }
    .register a{
        text-decoration: none; 
        color:white;
        outline: none;
    }
</style>
<body>
<?php 
  include_once('views/components/HeaderAccountLinks.php');
?>
    <form class="card w-25 m-auto p-3 mt-5" method="POST">
        <h2 class="text-center">Login</h2>
        <div class="row mt-3">
            <div class="col-3">
                <label for="">Email: </label>
            </div>
            <div class="col">
                <input type="email" class="form-control" name="email" id="" required>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-3">
                <label for="">Password: </label>
            </div>
            <div class="col">
                <input type="password" class="form-control" name="password" id="" required>
            </div>
        </div>
        <div class="mt-3 text-center">
           <p>You don't have an account? <button class="register"><a href="/register">Register now</a></button></p>
        </div>

        <button type="submit" class="btn btn-primary mt-3" name="submitLogin"> Login</button>
        <span class="text-danger mt-3"><?= $this->getData("errorMessage") ?></span>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php 
  include_once('views/components/FooterAccountLinks.php');
?>
</body>
</html>

