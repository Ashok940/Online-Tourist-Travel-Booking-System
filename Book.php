<?php
session_start();
include 'db.php';
$depts=$_SESSION['departs'];
$dest=$_SESSION['Desti'];
$tours=$_SESSION['Tours'];
$i=0;
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

<script>
$(document).ready(function(){
  $("#seemore").click(function(){
    document.getElementById("seemore").innerHTML="see more.."
    $(".lis").toggle();
  });
});
</script>

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
          <a class="nav-link text-white" aria-current="page" href="loginUsers.php">home</a>
        </li>
        <!-- <li><a href="" >Update</a></li> -->
        
       
        
      </ul>

      <ul class="nav navbar-nav navbar-right" id="navrights">
                    
                    <li><a href="logout.php" ><?php
                    echo "<div class='alert alert-success bordered-circle' > Welcome ".$_SESSION['UNames'] ."</div>";
                    ?></a></li>
                    
                  </ul>
      
    </div>
  </div>
</nav>

<header>
  <div class="row">
    <div class="col">
    <div class="card-body">
    <span><i class="fa-solid fa-hotel ids"></i></span>
     <p>Hotel Twin Sharing Basis</p>
     </div>
    </div>
    <div class="col">
    <div class="card-body">
    <span><i class="fa-solid fa-utensils ids"></i></span>
     <p>Food Veg & Non Veg</p>
     </div>
    </div>
    <div class="col">
    <div class="card-body">
    <span><i class="fa-solid fa-taxi ids"></i></span>
     <p>Transfers in Private Car</p>
     </div>
    </div>
    <div class="col">
    <div class="card-body">
    <span><i class="fa-solid fa-bus ids"></i></span>
     <p style="margin-left: 20px;">Volvo Train Tickets</p>
     </div>
    </div>
  </div>
</header>


    <?php
    //  $tours=$_SESSION['depts'];
    $sql="SELECT*from addtaxidata where depart='$dest'";
    $result=mysqli_query($conn,$sql);

    ?>

    <div class="container setData" id="dataContainer">
    <div class="row mt-4">
    <?php 

        while($row=mysqli_fetch_array($result)){


       ?> 
             <div class="col-lg-4">
              <br>
                <div class="card"  style="height:auto;" >
                    <img src="<?= $row['profiles']; ?>" class="card-img-top" height="200" alt="">
                    <div class="card-body">
                    <h3><?= $row['depart'];  ?> - <?= $row['destination'];" "  ?></h3>
                    <span class=" icons"><i class="fa-solid fa-bed"></i></span>
                    <span class=" icons"><i class="fa-solid fa-jet-fighter-up"></i></span>
                    <span class=" icons"><i class="fa-solid fa-bowl-rice"></i></span>
                    <span class=" icons"><i class="fa-solid fa-car"></i></span>
                    
                    <h4 class="card-title">Package Inclusion:</h4>
                        <!-- <p><?= $row['description']; ?></p> -->
                               <ul>
                                <li >
                               Morning Tea with Breakfast & Dinner</li>
                                    <li>3 Night / 4days stay in respective room</li>

                                    <li>Welcome Drink (Non Alcoholic) On Arrival</li>
                                    <li>Candle Light Dinner once night</li>
                                    <li class="lis">Flowers Bed Decoration once night</li>
                                    <li class="lis">Hot Kesar Badam Milk once night</li>
    
                                    <li class="lis">10% Discount on Additional Food, Beverages and Laundry</li>
                               </ul>
                             
                          
                             <button class="text-primary" id="seemore" style="float:right;">See less..</button>
                             <br>
                        <div class="price ml-4">
                        <span><a href="https://rzp.io/l/lPb2YCajP" role="button" class="btn btn-primary">Book Travel</a></span>
                        <i class="fa-solid fa-indian-rupee-sign" style="margin-left: 40px;"> 1</i>
                         <span>onwards</span>
                         
                        </div>
                        
                      <!-- <a href="" class="btn btn-success"><form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_NtmmUNrtWTChg3" async> </script> </form></a> -->
                    </div>
                </div>
             </div>
             <?php } ?>
        </div>
    </div>

    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="599ad1bd-3833-4b53-8085-941ee0439647";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();
          </script>

  </body>
</html>
<?php
?>