<?php
 session_start();
 include('db.php');
 $sql1= "SELECT * from register ";
 $execute=$conn->query($sql1);
 if($execute->num_rows>0){
     
     $_SESSION['user_data']=$execute->fetch_object(); // user_data is 
 }
// Add long Distance code

$msg="";




// $departsql=" SELECT*FROM travels";
// $departMysql=mysqli_query($conn,$departsql);

// if(isset($_POST['searchs'])){
//     $val1=$_POST['Dval1'];
//     $val2=$_POST['Dval2'];
//     $name=$_SESSION['unames'];
//     $mobile=$_SESSION['umobiles'];
//     $id=$_SESSION['id'];
//     $sql=" INSERT INTO userLong (id,Name,Mobile,depart,destination) VALUES ('$id','$name','$mobile','$val1','$val2')";
//     $mysqlis=mysqli_query($conn,$sql);
//     if($mysqlis){
//         $msg="<div class='alert alert-success'>Successfull inserted</div>";
//         header("refresh:5,index.php");
//     }else{
//         $msg="<div class='alert alert-danger'>something error</div>";
//     }
// }



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Notes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="styling1.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
       
  </head>
  <body>
    <!--Navigation Bar-->  
      <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
      
          <div class="container-fluid">
            
              <div class="navbar-header">
              
                  <a class="navbar-brand">TourTravels</a>
                  <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  
                  </button>
              </div>
              <div class="navbar-collapse collapse" id="navbarCollapse">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="#">Update</a></li>
                  </ul>

                  <ul class="nav navbar-nav navbar-right">
                    <li>
                            
                    <?php
                    echo "<div class='alert alert-success bordered-circle' > Welcome ".$_SESSION['UNames'] ."</div>";
              
                
                ?>

                   </li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="ulogout.php" >logout</a></li>
                  </ul>

                 
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href=""></a></li>
                  </ul>
              
              </div>
          </div>
      
      </nav>

      <!-- Add the Search of Traveling -->

    
      
       
      
    
    
    <!-- Footer-->
      <div class="footer">
          <div class="container">
              <p>datasciencetech.com Copyright &copy; 2024-<?php $today = date("Y"); echo $today?>.</p>
          </div>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="javascript.js"></script>
  </body>
</html>