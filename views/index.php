<?php
session_start();

// Check if an error message exists in the session
if (isset($_SESSION['error'])) {
    $error_message = $_SESSION['error'];
    unset($_SESSION['error']); // Clear the error after displaying it
} else {
    $error_message = null; // No error message
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>www.alaybee.com</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style type="text/css">
    body {
      margin: 0px;
      font-family: Arial, sans-serif;
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      width: 100%;
      top: 0;
      background-color: #000123;
      font-size: 20px;
      overflow: hidden;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      text-decoration: none;
      padding: 14px 20px;
    }

    li a:hover {
      text-decoration: none;
      color: deeppink;
      cursor: pointer;
    }

    li:last-child {
      float: right;
    }

    .jumbotron {
      background-color: #3197ED;
      color: white;
      padding: 50px 0px 30px 0px;
    }

    .brandname a {
      color: #000123;
      font-size: 20px;
    }

    #aboutus {
      margin-left: 70px;
      margin-right: 70px;
    }

    .image_with_data {
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
      transition: 0.3s;
      border-radius: 20px;
      margin-bottom: 10px;
    }

    .col-sm-4 {
      padding: 0px;
    }

    .image_with_data2 {
      margin-bottom: 10px;
    }

    .image_with_data:hover {
      box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5);
    }

    .add_data {
      padding: 2px 16px;
      background-color: #000123;
      color: white;
      border-radius: 10px;
      text-align: center;
    }

    .add_data:hover {
      cursor: pointer;
      color: purple;
    }

    .add_data_career {
      padding: 2px 16px;
      background-color: #87CEEB;
      color: #000123;
    }

    .jumbotron {
      padding: 5px;
      background-color: #3197ED;
      text-align: center;
    }

    #tagline {
      color: #000123;
      font-style: italic;
      margin-top: -10px;
    }

    #row2 {
      margin-left: 130px;
    }
  </style>
</head>

<body>
<?php
  // Display the SweetAlert if there's an error message
  if (!is_null($error_message)) {
      echo "
      <script>
          Swal.fire({
              icon: 'error',
              title: 'Access Denied',
              text: '$error_message',
              confirmButtonText: 'OK'
          });
      </script>";
  }
  ?>

    
  <div class="jumbotron">
    <h2>Alaybee Sports</h2>
    <p id="tagline">Sports Sales Since 1988</p>
  </div>

  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="cricket.php">Cricket</a></li>
    <li><a href="football.php">Football</a></li>
    <li><a href="#aboutus">About Us</a></li>
    <li><a href="#product">Product</a></li>
    <li><a href="#services">Services</a></li>
    <li><a href="#careers">Careers</a></li>
    <li><a href="#contactus">Contact US</a></li>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
      echo '<li style="float: right;"><a href="../controllers/logout.php">Logout</a></li>';
    } else {
      echo '<li style="float: right;"><a href="login.php">Login</a></li>';
    }
    ?>
  </ul>

  <div class="container-fluid" id="home">
    <img src="../pics/s2.jpg" style="width: 100%;">
  </div>

  <div class="container-fluid" id="aboutus">
    <br>
    <h1 style="text-align: center;">About US</h1>
    <br>
    <h4><b>ALAYBEE SHOP</b> is an exclusive online sports shop established by <b>Alaybee Enterprises Pvt. Ltd.</b> to provide the customers with the best quality sports equipment & services. Alaybee has been in sports equipment manufacturing since 66 years and has a rich experience of 3 generations with continued success as a leader.</h4>
    <br>
    <h4><b>Alaybee</b> has been awarded No. 1 since 2004-05 for Highest Exports of Athletics Equipment from India by SGEPC.</h4>
    <br>
    <h4><b>ALAYBEE SHOP</b> offers the following benefits to customers:
        <ul>
          <li>Complete range of Alaybee Sports Equipment online.</li>
          <li>Products directly delivered from the manufacturer, ensuring the latest production.</li>
          <li>Clear communication for product queries.</li>
          <li>Authenticity guaranteed as products come directly from Alaybee factory.</li>
          <li>Easy order management through history, wish-list, etc.</li>
          <li>Secure payment options through reliable gateways.</li>
          <li>Access to the latest products more easily.</li>
        </ul>
    </h4>
    <h3>Fast, safe & secure shipping (all over India). Better prices and much more…</h3>
  </div>

  <h1 style="text-align: center;">Products</h1>

  <div class="container-fluid" id="product">
    <h1 style="text-align: center;"><b>Find Your Best Sports Kits</b></h1>
    <h3 style="text-decoration: none; border-bottom: 1px solid blue;">SHOP BY CATEGORIES</h3>

    <div class="row">
      <div class="col-sm-2">
        <div class="image_with_data">
          <img src="../pics/f3.jpeg" style="width:100%; border-radius: 20px;">
        </div>
        <div class="add_data">
          <h4>FOOTBALL</h4>
        </div>
      </div>

      <div class="col-sm-2">
        <div class="image_with_data">
          <img src="../pics/f4.jpeg" style="width:100%; border-radius: 20px;">
        </div>
        <div class="add_data">
          <h4>CRICKET</h4>
        </div>
      </div>

      <div class="col-sm-2">
        <div class="image_with_data">
          <img src="../pics/f5.jpeg" style="width:100%; border-radius: 20px;">
        </div>
        <div class="add_data">
          <h4>BASKETBALL</h4>
        </div>
      </div>

      <div class="col-sm-2">
        <div class="image_with_data">
          <img src="../pics/f6.jpeg" style="width:100%; border-radius: 20px;">
        </div>
        <div class="add_data">
          <h4>VOLLEYBALL</h4>
        </div>
      </div>

      <div class="col-sm-2">
        <div class="image_with_data">
          <img src="../pics/f7.jpeg" style="width:100%; border-radius: 20px;">
        </div>
        <div class="add_data">
          <h4>RUGBY</h4>
        </div>
      </div>

      <div class="col-sm-2">
        <div class="image_with_data">
          <img src="../pics/f2.jpeg" style="width:100%; border-radius: 20px;">
        </div>
        <div class="add_data">
          <h4>TENNIS</h4>
        </div>
      </div>
    </div>

    <br><br>
    <h3 style="text-decoration: none; border-bottom: 1px solid blue;">TOP SELLING PRODUCTS</h3>

    <div class="row" id="row2">
      <div class="col-sm-2">
        <div class="image_with_data">
          <img src="../pics/b1.jpeg" style="width:100%; border-radius: 20px;">
        </div>
        <div class="add_data">
          <h4>Football Kit</h4>
        </div>
      </div>

      <div class="col-sm-2">
        <div class="image_with_data">
          <img src="../pics/b2.jpeg" style="width:100%; border-radius: 20px;">
        </div>
        <div class="add_data">
          <h4>Cricket Bat</h4>
        </div>
      </div>

      <div class="col-sm-2">
        <div class="image_with_data">
          <img src="../pics/b3.jpeg" style="width:100%; border-radius: 20px;">
        </div>
        <div class="add_data">
          <h4>Basketball Shoes</h4>
        </div>
      </div>

      <div class="col-sm-2">
        <div class="image_with_data">
          <img src="../pics/b4.jpeg" style="width:100%; border-radius: 20px;">
        </div>
        <div class="add_data">
          <h4>Volleyball</h4>
        </div>
      </div>

      <div class="col-sm-2">
        <div class="image_with_data">
          <img src="../pics/b5.jpeg" style="width:100%; border-radius: 20px;">
        </div>
        <div class="add_data">
          <h4>Rugby Gear</h4>
        </div>
      </div>

      <div class="col-sm-2">
        <div class="image_with_data">
          <img src="../pics/b6.jpeg" style="width:100%; border-radius: 20px;">
        </div>
        <div class="add_data">
          <h4>Tennis Racket</h4>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
