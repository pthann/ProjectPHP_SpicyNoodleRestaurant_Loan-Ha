<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Restaurant Website</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-...." crossorigin="anonymous" />
  <style>
    .logoHeader {
      width: 150px;
      height: 150px;
      margin-top: 50px;
    }

    .containerHeader {
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 20px;
      background-color: black;
      color: white;
      padding: 40px;
      width: 100%;
    }

    .groupAHeader {
      margin-top: 2px;
      width: 100%;
      display: flex;
    }

    .aOfHeader,
    .profile,
    .logout,
    .tables {
      text-decoration: none;
      color: white;
      padding: 15px 20px;
      border-radius: 5px;
      font-size: 30px;
      cursor: pointer;
    }

    .aOfHeader:hover,
    .tables:hover {
      color: red;
    }

    .dropdown {
      margin-top: 16px;
    }
  </style>
</head>


<body>
  <div class="containerHeader container-fluid">
    <div><img class="logoHeader" src="/views/images/logos/logo.png" alt="Logo"></div>
    <div>
      <nav class="groupAHeader">
        <a class="aOfHeader" onclick="home()" href="#">Home</a>
        <a class="aOfHeader" onclick="menu()" href="#">Menu</a>
        <a class="aOfHeader" onclick="searchs()" href="#">Search</a>
        <a class="aOfHeader" onclick="cart()" href="#">Cart</a>
        <a class="aOfHeader" onclick="tables()" href="#">Table</a>
        <a class="aOfHeader" onclick="payment()" href="#">Payment</a>
        
        <div class="dropdown">
          <a class="aOfHeader dropdown-toggle" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown"
            aria-expanded="false">
            Profile
          </a>
          <ul class="dropdown-menu" aria-labelledby="profileDropdown">
            <li><a class="dropdown-item profile" onclick="viewProfile()" href="#">View Profile</a></li>
            <li><a class="dropdown-item logout"  href="/logout">Logout</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </div>

  <script>
    function home() {
      window.location = "http://localhost:3009/home";
    }

    function menu() {
      window.location = "http://localhost:3009/menu";
    }

    function searchs() {
      window.location = "http://localhost:3009/search";
    }

    function viewProfile() {
      window.location = "http://localhost:3009/user/ViewProfilePage.php";
    }
    function cart() {
      window.location = "http://localhost:3009/cart";
    }

    function order() {
      window.location = "http://localhost:3009/user/OrderPage.php";
    }

    function tables() {
      window.location = "http://localhost:3009/table";
    }

    function payment() {
      window.location = "http://localhost:3009/payment";
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>




