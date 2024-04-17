<?php
session_start();
include 'db.php';

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="styling2.css">
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    

    <style>
        body{
            margin: 0px;
            padding: 0px;
            font-family:Arial, Helvetica, sans-serif;
        }
     .navbar-brand{
        font-size:20px;
        box-shadow:12px solid red;
     }
     #navrights li a{
        text-decoration:none;
        
        font-size:13px;
        color:white;
     }
     .icons i{
        width:40px;
        font-size: 25px;
        color: blue;
        margin:10px;
     }
     
     .price{
        margin:20px;
     }
     header{
        padding:40px;
       
        background-color:#ffc107;
     }
     span .ids{
        margin-left: 70px;
        font-size: 30px;
        color:white;
     }
    </style>

  </head>
  <body>

  
  <nav class="navbar navbar-expand-lg  bg-dark ">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="index.php">TourTravels</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon bg-white"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="floatsright">
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="Admin.php">Admin page</a>
        </li>
        <!-- <li><a href="" >Update</a></li> -->
        
       
        
      </ul>

      <ul class="nav navbar-nav navbar-right" id="navrights">
                    
      <?php
                if(isset($_SESSION['user_data'])){
                    echo "<a class='btn btn-success' href='logout.php'>Admin</a>";
                }
                
                ?>
                    
                  </ul>
      
    </div>
  </div>
</nav>
      
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Mobile Num</th>
      <th scope="col">depart</th>
      <th scope="col">destination</th>
      <th scope="col">Tours Place</th>
      <th scope="col">Duration</th>
      <th scope="col">Booked Date</th>
      <th scope="col">Travel Mode</th>

    </tr>
  </thead>
  <tbody>
  <?php
    $id=1;
    $query = $conn->query("SELECT * FROM userlong ");
    if ($query) {
        while($fetch = $query->fetch_array()) {
            ?>
            <tr>
                <th scope="row"><?= $id ; ?></th>
                <td scope="row"><?= $fetch['Name']; ?></td>
                <td scope="row"><?= $fetch['Mobile']; ?></td>
                <td scope="row"><?= $fetch['depart']; ?></td>
                <td scope="row"><?= $fetch['destination']; ?></td>
                <td scope="row"><?= $fetch['ToursPlace']; ?></td>
                <td scope="row"><?= $fetch['Duration']; ?></td>
                <td scope="row"><?= $fetch['BookedDate']; ?></td>
                <td scope="row"><?= $fetch['Mode']; ?></td>
            </tr>
            <?php
            $id++;
        }
    }
    ?>
    
  </tbody>
</table>

  </body>
</html>
