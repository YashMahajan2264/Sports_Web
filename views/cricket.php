<?php
session_start();
require_once '../controllers/AccessControl.php';  // Include the AccessControl.php file

if (!hasAccessToPage('cricket')) {
    $_SESSION['error'] = 'You do not have access to the Cricket page.';
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Cricket - Alaybee Sports</title>
  <style>
    body {
      margin: 0px;
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

    

    .jumbotron {
      background-color: #3197ED;
      color: white;
      padding: 50px 0px 30px 0px;
      text-align: center;
    }

    #tagline {
      color: #000123;
      font-style: italic;
      margin-top: -10px;
    }

    .product-section {
      text-align: center;
      margin: 20px;
    }

    .product-section h2 {
      color: #3197ED;
    }

    .row {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
    }

    .col-sm-3 {
      flex: 0 0 23%;
      margin: 1%;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
      border-radius: 10px;
      overflow: hidden;
      transition: 0.3s;
    }

    .col-sm-3:hover {
      box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5);
    }

    .col-sm-3 img {
      width: 100%;
      border-radius: 10px;
    }

    .col-sm-3 h4 {
      background-color: #000123;
      color: white;
      padding: 10px;
      margin: 0;
    }
  </style>
</head>

<body>
  <div class="jumbotron">
    <h2>Cricket - Alaybee Sports</h2>
    <p id="tagline">For all cricket lovers!</p>
  </div>

  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="cricket.php">Cricket</a></li>
    <li><a href="football.php">Football</a></li>
  </ul>

  <div class="product-section">
    <h2>Explore Cricket Products</h2>
    <div class="row">
      <div class="col-sm-3">
        <img src="../pics/b1.jpeg" alt="Cricket Bat">
        <h4>Cricket Bat</h4>
      </div>
      <div class="col-sm-3">
        <img src="../pics/b3.jpeg" alt="Cricket Ball">
        <h4>Cricket Ball</h4>
      </div>
      <div class="col-sm-3">
        <img src="../pics/gloves.jpg" alt="Cricket Gloves">
        <h4>Gloves</h4>
      </div>
      <div class="col-sm-3">
        <img src="../pics/pads.jpg" alt="Cricket Pads">
        <h4>Pads</h4>
      </div>
    </div>
  </div>
</body>

</html>
