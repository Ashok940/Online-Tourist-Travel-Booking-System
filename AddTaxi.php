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

// Add taxi data php code

if(isset($_POST["AddTaxis"])){
  $depart=$_POST['taxidept'];
  $dest=$_POST['taxidest'];
  $prices=$_POST['taxiprice'];
  $descript=$_POST['taxidescript'];
  $target_dir="taxi/";
  $target_files=$target_dir.basename($_FILES['TImage']['name']);
  move_uploaded_file($_FILES['TImage']['tmp_name'],$target_files);
  
$fetc="SELECT* from addtaxidata where depart='$depart' AND destination='$dest'";
$mysqlifetch=mysqli_query($conn,$fetc);
$mysqlinum=mysqli_num_rows($mysqlifetch);
if($mysqlinum){
  $msg='<div class="alert alert-danger text-center" style="border-radius:12px;">Taxi Data is Already Successful added</div>';
}else{
  $sql="INSERT into addtaxidata (depart,destination,Price,description,profiles) VALUES('$depart','$dest','$prices','$descript','$target_files')";

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
                    <li><a href="#AddTaxis" data-toggle="modal">AddTaxiData</a></li>
                
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
                    <li><a href="viewTravel.php" data-toggle="modal">view taxi book</a></li>
                  </ul>

                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="Admin.php" >Admin home</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href=""></a></li>
                  </ul>
              
              </div>
          </div>
      
      </nav>
    
    


<!--Add taxi Distace Data -->    
<form method="post" enctype="multipart/form-data">
        <div class="modal" id="AddTaxis" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Add Taxi Distance: 
                  </h4>
                 <?php
                      echo $msg;
                 ?>
              </div>
              <div class="modal-body">
                  
                  <!--taxi distance php code-->
                  <div id="longmessage"></div>
                  
                  <div class="form-group">
                      <label for="Addtaxidepart" class="sr-only">Depart:</label>
                      <input class="form-control" type="text" name="taxidept" id="taxiname" placeholder="Depart" maxlength="50" required>
                  </div>
                  <div class="form-group">
                      <label for="contactemail" class="sr-only">Destination:</label>
                      <input class="form-control" type="text" name="taxidest" id="destname" placeholder="Destination" maxlength="50" required>
                  </div>
                  <div class="form-group">
                      <label for="Addprice" class="sr-only">Price:</label>
                      <input class="form-control" type="text" name="taxiprice" id="contactename" placeholder="Price" maxlength="50" required>
                  </div>
                  <div class="form-group">
                      <label for="descriptions" class="sr-only">Description:</label>
                      <input class="form-control" type="text" name="taxidescript" id="descriptions" placeholder="Description" maxlength="50" required>
                  </div>
                  <div class="form-group">
                                    <div class="custom-file">
                                    <input type="file" name="TImage" class="custom-file-input" required>
                                    
                   </div>
                  
                  
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="AddTaxis" type="submit" value="AddTaxi">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
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
    <script src="js/bootstrap.min.js"></script>
    <script src="javascript.js"></script>
  </body>
</html>