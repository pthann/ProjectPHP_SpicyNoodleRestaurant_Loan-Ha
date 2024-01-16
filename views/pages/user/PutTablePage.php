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
    
</head>
<body class="container-fluid">
    <h1 class="titleTable">Choose table</h1>
    <div class="tables">
        <div class="row">
        <?php
                foreach ($this->getData("tables") as $table) {
                    echo "<label class='col-md-2 tableItem' data-table-id='{$table['id']}' id='radio'>
                                <input type='radio' name='table' class='radioTables'>
                                <div class='tableName'>
                                    <b><p>{$table['name']}</p></b>
                                </div>
                            </label>";
                }
        ?>
        </div>
    </div>
</body>
</html>

<?php
include_once('views/components/Footer.php');
?>
</html>
<script>
     var radioButtons = document.querySelectorAll('input[name="table"]');
    radioButtons.forEach(function(button) {
        button.addEventListener('change', function() {
            document.querySelectorAll('.tableItem').forEach(function(label) {
                label.style.backgroundColor = 'black';
            });
            if (this.checked) {
                var label = this.closest('.tableItem');
                label.style.backgroundColor = 'red';
            }
        });
    });
</script>