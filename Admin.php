<?php
 session_start();
 include('db.php');
 $sql1= "SELECT * from admin ";
 $execute=$conn->query($sql1);
 if($execute->num_rows>0){
     
     $_SESSION['user_data']=$execute->fetch_object(); // user_data is 
 }
// Add long Distance code

$msg="";
if(isset($_POST["AddLong"])){
    $depart=$_POST['departname'];
    $dest=$_POST['destinationname'];
    $prices=$_POST['longprice'];
    $descript=$_POST['descript'];
    $target_dir="travel/";
    $target_files=$target_dir.basename($_FILES['pImage']['name']);
    move_uploaded_file($_FILES['pImage']['tmp_name'],$target_files);
    
  $fetc="SELECT* from addlongdist where depart='$depart' AND destination='$dest'";
  $mysqlifetch=mysqli_query($conn,$fetc);
  $mysqlinum=mysqli_num_rows($mysqlifetch);
  if($mysqlinum){
    $msg='<div class="alert alert-danger text-center" style="border-radius:12px;">Travel Data is Already Successful added</div>';
  }else{
    $sql="INSERT into addlongdist (depart,destination,Price,description,profiles) VALUES('$depart','$dest','$prices','$descript','$target_files')";
  
    if(mysqli_query($conn,$sql)){
        $msg='<div class="alert alert-success text-center" style="border-radius:12px;">Travel Data is Successful added</div>';
    }else{
        $msg='<div class="alert alert-success text-center" style="border-radius:12px;">Travel Data is not Successful added</div>';
    }
  }
}




// Add taxi data php code

if(isset($_POST["AddTaxis"])){
  $depart=$_POST['taxidept'];
  $dest=$_POST['taxidest'];
  $prices=$_POST['taxiprice'];
  $descript=$_POST['taxidescript'];
  $target_dir="taxi/";
  $target_files=$target_dir.basename($_FILES['TImage']['name']);
  move_uploaded_file($_FILES['pImage']['tmp_name'],$target_files);
  
$fetc="SELECT* from addtaxidata where depart='$depart' AND destination='$dest'";
$mysqlifetch=mysqli_query($conn,$fetc);
$mysqlinum=mysqli_num_rows($mysqlifetch);
if($mysqlinum){
  $msg='<div class="alert alert-danger text-center" style="border-radius:12px;">Taxi Data is Already Successful added</div>';
}else{
  $sql="INSERT into addlongdist (depart,destination,Price,description,profiles) VALUES('$depart','$dest','$prices','$descript','$target_files')";

  if(mysqli_query($conn,$sql)){
      $msg='<div class="alert alert-success text-center" style="border-radius:12px;">Taxi Data is Successful added</div>';
  }else{
      $msg='<div class="alert alert-success text-center" style="border-radius:12px;">Taxi Data is not Successful added</div>';
  }
}
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Notes</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="styling.css" rel="stylesheet">
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
                    <li><a href="viewTaxi.php">View Travel Book</a></li>
                    <li><a href="AddTaxi.php">AddTaxiData</a></li>
                    <li><a href="#AddlongtModal" data-toggle="modal">AddlongDist</a></li>
                    <li ><a id="dynamic" class="bg bg-primary"></a></li>
                  </ul>

                  <ul class="nav navbar-nav navbar-right">
                    <li>
                            
                    <?php
                if(isset($_SESSION['user_data'])){
                    echo "<a class='btn btn-success' href='logout.php'>Admin</a>";
                }
                
                ?>

                    </a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="viewTravel.php" >view taxi data</a></li>
                  </ul>

                  
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href=""></a></li>
                  </ul>
              
              </div>
          </div>
      
      </nav>
    

<!-- Sennd message to the user button -->

      <div class="jumbotron" id="myContainer">
          <h1>Send the Message to the user</h1>
          
          <a href="test.php" type="button" class="btn btn-lg green signup" >Send Message</a>
      </div>


    
    <!--Login form-->    
      <form method="post" id="loginform">
        <div class="modal" id="loginModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Login: 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Login message from PHP file-->
                  <div id="loginmessage"></div>
                  

                  <div class="form-group">
                      <label for="loginemail" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="loginemail" id="loginemail" placeholder="Email" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="loginpassword" class="sr-only">Password</label>
                      <input class="form-control" type="password" name="loginpassword" id="loginpassword" placeholder="Password" maxlength="30">
                  </div>
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="rememberme" id="rememberme">
                        Remember me
                      </label>
                          <a class="pull-right" style="cursor: pointer" data-dismiss="modal" data-target="#forgotpasswordModal" data-toggle="modal">
                      Forgot Password?
                      </a>
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="login" type="submit" value="Login">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="signupModal" data-toggle="modal">
                  Register
                </button>  
              </div>
          </div>
      </div>
      </div>
      </form>

 <!--Add Long Distace Data -->    
       <form method="post" enctype="multipart/form-data">
        <div class="modal" id="AddlongtModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Add Long Distace: 
                  </h4>
                 <?php
                      echo $msg;
                 ?>
              </div>
              <div class="modal-body">
                  
                  <!--long distance php code-->
                  <div id="longmessage"></div>
                  
                  <div class="form-group">
                      <label for="Addlongdepart" class="sr-only">Depart:</label>
                      <input class="form-control" type="text" name="departname" id="contactename" placeholder="Depart" maxlength="50" required>
                  </div>
                  <div class="form-group">
                      <label for="contactemail" class="sr-only">Destination:</label>
                      <input class="form-control" type="text" name="destinationname" id="destname" placeholder="Destination" maxlength="50" required>
                  </div>
                  <div class="form-group">
                      <label for="Addprice" class="sr-only">Price:</label>
                      <input class="form-control" type="text" name="longprice" id="contactename" placeholder="Price" maxlength="50" required>
                  </div>
                  <div class="form-group">
                      <label for="descriptions" class="sr-only">Description:</label>
                      <input class="form-control" type="text" name="descript" id="descriptions" placeholder="Description" maxlength="50" required>
                  </div>
                  <div class="form-group">
                                    <div class="custom-file">
                                    <input type="file" name="pImage" class="custom-file-input" required>
                                    
                   </div>
                  
                  
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="AddLong" type="submit" value="AddLongsDist">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
                
              </div>
          </div>
      </div>
      </div>
      </form>

    <!--Sign up form--> 
      <form method="post" id="signupform">
        <div class="modal" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Sign up today and Start using our online travel booking! 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Sign up message from PHP file-->
                  <div id="signupmessage"></div>
                  
                  <div class="form-group">
                      <label for="username" class="sr-only">Name:</label>
                      <input class="form-control" type="text" name="username" id="username" placeholder="Name" maxlength="30">
                  </div>
                  <div class="form-group">
                      <label for="email" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="email" id="email" placeholder="Email Address" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="password" class="sr-only">Choose a password:</label>
                      <input class="form-control" type="password" name="password" id="password" placeholder="Choose a password" maxlength="30">
                  </div>
                  <div class="form-group">
                      <label for="password2" class="sr-only">Confirm password</label>
                      <input class="form-control" type="password" name="password2" id="password2" placeholder="Confirm password" maxlength="30">
                  </div>
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="signup" type="submit" value="Sign up">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
              </div>
          </div>
      </div>
      </div>
      </form>

    <!--Forgot password form-->
      <form method="post" id="forgotpasswordform">
        <div class="modal" id="forgotpasswordModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Forgot Password? Enter your email address: 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--forgot password message from PHP file-->
                  <div id="forgotpasswordmessage"></div>
                  

                  <div class="form-group">
                      <label for="forgotemail" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="forgotemail" id="forgotemail" placeholder="Email" maxlength="50">
                  </div>
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="forgotpassword" type="submit" value="Submit">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="signupModal" data-toggle="modal">
                  Register
                </button>  
              </div>
          </div>
      </div>
      </div>
      </form>
    <!-- Footer-->
      <div class="footer">
          <div class="container">
              <p>datasciencetech.com Copyright &copy; 2024-<?php $today = date("Y"); echo $today?>.</p>
          </div>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script>
      setInterval(dynamics, 1000);
       function dynamics(){
           var date=new Date();
           var cur=date.toLocaleTimeString();
           document.getElementById("dynamic").innerHTML=cur;
       }
      </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="javascript.js"></script>
  </body>
</html>