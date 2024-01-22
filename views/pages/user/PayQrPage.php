<?php
include_once('views/components/Header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Restaurant Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/views/styles/user/PutTable.css">
    <title>Qr Image</title>
</head>
<style>
.ds_plex {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.image-container {
    width: 600px;
}

img {
    width: 100%;
    height: auto;
}
</style>

<body class="container-fluid">
    <h1 class="titleTable">Thanh Toán QR</h1>
    <div class="ds_plex">
        <div class="image-container">
            <img src="https://baolamdong.vn/file/e7837c02845ffd04018473e6df282e92/dataimages/202211/original/images2493316_img_4804.jpg"
                alt="">
        </div>
    </div>
    <a href="/home" class="btn btn-primary">Home</a>

</body>

</html>
<?php
include_once('views/components/Footer.php');
?>