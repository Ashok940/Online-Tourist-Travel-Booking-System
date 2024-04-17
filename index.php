<?php
session_start();

include('db.php');
include('smtp/PHPMailerAutoload.php');
$msg="";

// contact messages
if(isset($_POST["contact1"])){
  $name=$_POST["contactname"];
  $email=$_POST["contactemail"];
  $contact=$_POST["contactnum"];
  $querys=$_POST["query"];
  
  $sql1="SELECT * from contactus where Email='$email'";
  $mysqlis1=mysqli_query($conn,$sql1);
  $mysqlinum=mysqli_num_rows($mysqlis1);
  if($mysqlinum>0){
    $msg=$msg="<div class='alert alert-danger'>Your Query is Already Submitted ! you try after 2 days!</div>";
  }else{
     $sql="INSERT INTO contactus(id,Name,Email,Mobile,Query) VALUES (null,'$name','$email','$contact','$querys')";
     $mysqlis=mysqli_query($conn,$sql);
     smtp_mailer($email," ","Hello".$name."<br>Thank you for your query. I will contact to you after few hours.");
    if($mysqlis){
      $msg="<div class='alert alert-success'>Your Query is Successfully submitted</div>";
    }else{
      $msg="<div class='alert alert-danger'>Something Error!</div>";
    }
  }

  
}

// for the Admin Pages

if(isset($_POST['Admin'])){
  $adminmail=$_POST['Adminmail'];
  $adminpass=$_POST['AdminPass'];
  $asql=" SELECT* FROM admin where email='$adminmail' AND password='$adminpass' ";
  $amysqli=mysqli_query($conn,$asql);
  $Amysqlinum=mysqli_num_rows($amysqli);
  if($Amysqlinum){
    header("refresh:3,Admin.php");
  }
  else{
    $msg="<div class='alert alert-danger'>Something Error!</div>";
  }

}


// user signUp Page


if(isset($_POST["Usignup"])){

  $name=$_POST["Uname"];
  $email=$_POST["Uemail"];
  $contact=$_POST["Umobile"];
  $pass1=$_POST["Upassword1"];
  $pass2=$_POST["Upassword2"];
  
  $sql1="SELECT * from register where Mobile='$contact'";
  $mysqlis1=mysqli_query($conn,$sql1);
  $mysqlinum=mysqli_num_rows($mysqlis1);
  if($mysqlinum>0){
    $msg=$msg="<div class='alert alert-danger'>Your Mobile Number is Already register | please login or register another number !</div>";
  }else{
    if ($pass1!=$pass2){
      $msg="<div class='alert alert-danger'>Oops! Password did not match! Try again.</div> ";
  }else{
     $sql="INSERT INTO register(id,Name,Email,Mobile,password,cpassword) VALUES (null,'$name','$email','$contact','$pass1','$pass2')";
     $_SESSION['UNames']=$name;
     $mysqlis=mysqli_query($conn,$sql);
     $resultq="SELECT*FROM register where Mobile='$contact'";
     $resultu=mysqli_query($conn,$resultq);
     $row=mysqli_fetch_array($resultu);
    $_SESSION['unames']=$name;
    $_SESSION['umobiles']=$contact;
    $_SESSION['id']=$row['id'];
    if($mysqlis){
      $msg="<div class='alert alert-success'>You are Successfully Register</div>";
      header("refresh:5,loginUsers.php");
    }else{
      $msg="<div class='alert alert-danger'>Something Error!</div>";
    }
  }
  }

  
}



// for the user login pages

if(isset($_POST['logins'])){
  $umobile=$_POST['loginemob'];
  $upass=$_POST['loginpassword'];
  $sql=" SELECT * FROM register where Mobile='$umobile' AND password='$upass'";
  $mysqlqu=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($mysqlqu);
  $mysqlinum1=mysqli_num_rows($mysqlqu);
  if($mysqlinum1>0){
    $_SESSION['UNames']=$row['Name'];
    // $_SESSION['UName1']=$row['Name'];
    $_SESSION['lname']=$row['Name'];
    $_SESSION['lmob']=$row['Mobile'];
    $_SESSION['ids']=$row['id'];
    $msg="<div class='alert alert-success'>You have Successfully login</div>";
    header("refresh:5,loginUsers.php");
  }else{
    $msg="<div class='alert alert-danger'>Oops ! Your Password is doen't match </div>";
  }
}



// send comment msg to the user
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "ashokkr7675@gmail.com";
	$mail->Password = "bnufciwtkmlakatx ";
	$mail->SetFrom("ashokkr7675@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}











?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Travel Booking System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="styling.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
      <!-- <script
      src="https://apis.mappls.com/advancedmaps/api/3f1da70395e855e929c6d6f4587c9ee1/map_sdk?layer=vector&v=3.0&callback=initMap1"
      defer async></script> -->
      <script src="https://apis.mappls.com/advancedmaps/api/3f1da70395e855e929c6d6f4587c9ee1/map_sdk?layer=vector&v=3.0&callback=initMap1" defer async></script>
      
            </head>
      <style>
        #map {
        margin-top: 20px;
        padding: 0;
        width: 100%;
        height: 60vh;
      }
      #copyright0,#watermark_logo0{
        display:none;
      }
      #rp_0 a{
        display:none;
      }
      </style>
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
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#adminModal" data-toggle="modal">Admin</a></li>
                    <li><a href="#contactModal" data-toggle="modal">Contact us</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="#loginModal" data-toggle="modal">Login</a></li>
                  </ul>
              
              </div>
          </div>
      
      </nav>
      <br>
      <div id="map"></div>
    
    <!--Jumbotron with Sign up Button-->
      <div class="jumbotron" id="myContainer">
          <h1>Online Travel Booking System</h1>
          
          <button type="button" class="btn btn-lg green signup" data-target="#signupModal" data-toggle="modal">Sign up-It's free</button>
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
                  <?php
                      echo $msg;
                  ?>
              </div>
              <div class="modal-body">
                  
                  <!--Login message from PHP file-->
                  <div id="loginmessage"></div>
                  

                  <div class="form-group">
                      <label for="loginemail" class="sr-only">Mobile Number:</label>
                      <input class="form-control" type="tel" name="loginemob" id="loginmob" placeholder="Mobile Number" maxlength="50">
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
                  <input class="btn green" name="logins" type="submit" value="Login">
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

 <!--contact us -->    
       <form method="post" id="contactform">
        <div class="modal" id="contactModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Contact Us: 
                  </h4>
                <?php
            echo $msg;

?>

              </div>
              <div class="modal-body">
                  
                  <!--contact message from PHP file-->
                  <div id="contactmessage"></div>
                  
                  <div class="form-group">
                      <label for="contactemail" class="sr-only">Name:</label>
                      <input class="form-control" type="text" name="contactname" id="contactename" placeholder="Name" maxlength="50" required>
                  </div>
                  <div class="form-group">
                      <label for="contactemail" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="contactemail" id="contactemail" placeholder="Email" maxlength="50" required>
                  </div>
                  <div class="form-group">
                      <label for="contactNum" class="sr-only">Mobile Number:</label>
                      <input class="form-control" type="tel" name="contactnum" id="contactnums" placeholder="Mobile Number" maxlength="50" required>
                  </div>
                  <label for="textquery" class="">Your Query</label>
                  <div class="form-group">
                      <textarea name="query" id="querys" cols="30" rows="5" required></textarea>
                  </div>
                  
                  
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="contact1" type="submit" value="Contact Us">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
                
              </div>
          </div>
      </div>
      </div>
      </form>




<!--Admin login -->    
<form method="post" id="Adminform">
        <div class="modal" id="adminModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Admin login: 
                  </h4>
                  <?php
            echo $msg;

?>
              </div>
              <div class="modal-body">
                  
                  <!--Admin files-->
                  <div id="contactmessage"></div>
                  <div class="form-group">
                      <label for="contactemail" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="Adminmail" id="Adminsemail" placeholder="Email" maxlength="50" required>
                  </div>
                  <div class="form-group">
                      <label for="contactNum" class="sr-only">Password:</label>
                      <input class="form-control" type="password" name="AdminPass" id="Adminpas" placeholder="password" maxlength="50" required>
                  </div>
                
                  
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="Admin" type="submit" value="Admin Login">
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

                  <?php
                         echo $msg;
                  ?>
              </div>
              <div class="modal-body">
                  
                  <!--Sign up message from PHP file-->
                  <div id="signupmessage"></div>
                  
                  <div class="form-group">
                      <label for="username" class="sr-only">Name:</label>
                      <input class="form-control" type="text" name="Uname" id="username" placeholder="Name" maxlength="30">
                  </div>
                  <div class="form-group">
                      <label for="email" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="Uemail" id="email" placeholder="Email Address" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="mobile" class="sr-only">Mobile:</label>
                      <input class="form-control" type="text" name="Umobile" id="email" placeholder="mobile" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="password" class="sr-only">Choose a password:</label>
                      <input class="form-control" type="password" name="Upassword1" id="password" placeholder="Choose a password" maxlength="30">
                  </div>
                  <div class="form-group">
                      <label for="password2" class="sr-only">Confirm password</label>
                      <input class="form-control" type="password" name="Upassword2" id="password2" placeholder="Confirm password" maxlength="30">
                  </div>
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="Usignup" type="submit" value="Sign up">
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
    <script src="js/bootstrap.min.js"></script>
    <script src="javascript.js"></script>
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="a40b2383-4d55-497e-a7b0-0e9088905750";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
    <script>
        function initMap1() {
            var map = new mappls.Map("map", {
                center: [28.61, 77.23],
                zoomControl: true,
                location: true,
                zoom: 4,
            });

            const size = 200;

            const pulsingDot = {
                width: size,
                height: size,
                data: new Uint8Array(size * size * 4),

                onAdd: function() {
                    const canvas = document.createElement("canvas");
                    canvas.width = this.width;
                    canvas.height = this.height;
                    this.context = canvas.getContext("2d");
                },

                render: function() {
                    const duration = 1000;
                    const t = (performance.now() % duration) / duration;

                    const radius = (size / 2) * 0.3;
                    const outerRadius = (size / 2) * 0.7 * t + radius;
                    const context = this.context;

                    context.clearRect(0, 0, this.width, this.height);
                    context.beginPath();
                    context.arc(
                        this.width / 2,
                        this.height / 2,
                        outerRadius,
                        0,
                        Math.PI * 2
                    );
                    context.fillStyle = `rgba(255, 200, 200, ${1 - t})`;
                    context.fill();

                    context.beginPath();
                    context.arc(
                        this.width / 2,
                        this.height / 2,
                        radius,
                        0,
                        Math.PI * 2
                    );
                    context.fillStyle = "rgba(255, 100, 100, 1)";
                    context.strokeStyle = "white";
                    context.lineWidth = 2 + 4 * (1 - t);
                    context.fill();
                    context.stroke();

                    this.data = context.getImageData(
                        0,
                        0,
                        this.width,
                        this.height
                    ).data;

                    map.triggerRepaint();

                    return true;
                },
            };

            map.on("load", () => {
                map.addImage("pulsing-dot", pulsingDot, {
                    pixelRatio: 2
                });

                map.addSource("dot-point", {
                    type: "geojson",
                    data: {
                        type: "FeatureCollection",
                        features: [{
                            type: "Feature",
                            geometry: {
                                type: "Point",
                                coordinates: [77.23, 28.61],
                            },
                        }, ],
                    },
                });
                map.addLayer({
                    id: "layer-with-pulsing-dot",
                    type: "symbol",
                    source: "dot-point",
                    layout: {
                        "icon-image": "pulsing-dot",
                    },
                });
            });
        }
    </script>
  </body>
</html>