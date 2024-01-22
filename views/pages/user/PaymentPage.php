<?php
include_once('views/components/Header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restaurant Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/views/styles/user/Menu.css">
</head>
<body class="container-fluid">
    <h1 class="titleTable">Choose payment method</h1>
    
    <?php
    // Lấy giá trị tổng số tiền từ tham số truyền vào
    //$totalAmount = isset($_GET['totalAmount']) ? $_GET['totalAmount'] : 0;
    ?>

    <p>The total amount of your order is <?php //echo number_format($totalAmount); ?> VND</p>

    <form action="process_payment.php" method="post">
        <label>
            <input type="radio" name="payment_method" value="cash">
            Cash payment
        </label>

        <label>
            <input type="radio" name="payment_method" value="qr_code">
            Scan the shop's QR code
        </label>

        <input type="submit" value="Submit">
    </form>
    
</body>
</html>

<?php
include_once('views/components/Footer.php');
?>
