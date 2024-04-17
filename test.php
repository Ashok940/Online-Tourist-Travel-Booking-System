<?php
include('smtp/PHPMailerAutoload.php');
$msg="";
$conn=mysqli_Connect("localhost","root","","test");
if(isset($_POST['Emsg'])){
	$citys1=$_POST['Ecity'];
	$citys2=$_POST['Ecity1'];
	$Mess=$_POST['EText'];
    $sql="SELECT * FROM emails where city1='$citys1' AND city2='$citys2' ";
	$mysql=mysqli_query($conn,$sql);
	
	if($mysql){
		while($row=mysqli_fetch_array($mysql)){
			// echo $row['Email']."<br>";
			smtp_mailer($row['Email'],"Regarding Tours","Hello Dear!",$Mess);
	
		}
		$msg="<div class='alert alert-success'>Message is successfully transfer to the user </div>";
	}

}



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
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Message Send</title>
<link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	body{
		color: #fff;
		background: #63738a;
		font-family: 'Roboto', sans-serif;
	}
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.signup-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #999;
		border-radius: 13px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 10px 12px 16px 9px rgba(0, 0, 0, 0.4);
        padding: 30px;

    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	}  
	.signup-form .message{
		color:red;
	}
	#MessageE{
		resize:none;
	}
	
</style>
<link rel="stylesheet" href="styling2.css">


<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
<body>
    
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
                    <li><a href="Admin.php">Admin</a></li>
                    
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
                    <li><a href=""></a></li>
                  </ul>
              
              </div>
          </div>
      
      </nav>
<br><br>

<div class="signup-form">
    <form method="post">
		<p class="hint-text">Send Message to User according to your preferences !</p>
		<label>Enter City1</label>
         <div class="form-group">
        	<input type="text" class="form-control" name="Ecity" id="name" placeholder="city1" required>
        </div>
		<label>Enter City2</label>
		<div class="form-group">
        	<input type="text" class="form-control" name="Ecity1" id="name1" placeholder="city2" required>
        </div>
        <label>Enter Your Query</label>
		<div class="form-group">
            <textarea name="EText" id="MessageE" cols="30" rows="5">

			</textarea>
        </div>
		
		<div class="form-group">
            <button type="submit"  name="Emsg" class="btn btn-success  btn-block" onclick="sendmsg()">Send Message</button>
        </div>
		<div class="message">
		<?php
		echo $msg;
		?>
		</div>
    </form>

	<script>
         function sendmsg(){
		   var	var1=document.getElementById("name");
		   var	var2=document.getElementById("name1");
			if(var1==var2){
				alert("please choose different city");
			}
		 }

		</script>


	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="javascript.js"></script>
	
</div>
</body>
</html>                            

