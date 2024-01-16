<?php
include_once('views/components/Header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Restaurant Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/views/styles/user/Search.css">
</head>

<body>
    <section class="content container-fluid">
        <div class="d-flex justify-content-between">
            <form class="d-flex" method="GET" id="search">
                <input class="form-control me-2 search" type="search" name="search" placeholder="Search by product name" id="searchFood" aria-label="Search">
                <button class="btn btn-outline-success">Search</button>
            </form>
        </div>

        <?php
        if (isset($_GET["search"])) {
            $searchTerm = $_GET["search"];
            $searchModel = new SearchModel();
            $searchResults = $searchModel->searchBy($searchTerm);

            if (empty($searchResults)) {
                echo '<h2 class="text-center">No result for ' . $searchTerm . '</h2>';
            } else {
                echo '<div class="row">';

                foreach ($searchResults as $result) {
                    echo '<a href="/detail?id=' . $result['id'] . '" class="col-md-3 col-sm-6 productMenu">';
                    echo '<div>';
                    echo '<img src="' . $result['image_link'] . '" alt="' . $result['name'] . '" class="img-fluid imageFood">';
                    echo '<br>';
                    echo '<b>' . $result['name'] . '</b>';
                    echo '</div>';
                    echo '</a>';
                }
                echo '</div>';
            }
        }
        ?>
    </section>

</body>

</html>

<?php
include_once('views/components/Footer.php');
?>
 