<?php
session_start();
include 'db.php';

$departsql=" SELECT*FROM travels";
$departMysql=mysqli_query($conn,$departsql);

if(isset($_POST['regist'])){
    $val1=$_POST['Dval1'];
    $val2=$_POST['Dval2'];
    
    // echo $val1." ".$val2;
    $name=$_SESSION['unames'];
    $mobile=$_SESSION['umobiles'];
    $id=$_SESSION['id'];
    $sql=" INSERT INTO userlong (id,Name,Mobile,depart,destination) VALUES ('$id','$name','$mobile','$val1','$val2')";
    $mysqlis=mysqli_query($conn,$sql);
    if($mysqlis){
        $msg="<div class='alert alert-success'>You are find the journey according to the city</div>";
        // header("refresh:5,index.php");
    }else{
        $msg="<div class='alert alert-danger'>something error</div>";
    }
}






?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
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
    <script
      src="https://apis.mappls.com/advancedmaps/api/3f1da70395e855e929c6d6f4587c9ee1/map_sdk?layer=vector&v=3.0&callback=initMap1"
      defer
      async
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
     #map {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 50vh;
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
          <a class="nav-link text-white" aria-current="page" href="#">Update</a>
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

<div id="map"></div>


    <div class="container">
        <h4 class="text-center text-capitalize my-5">Please Select the Depart location</h4>
        
        <div class="row">
            
            <div class="col-lg-6 offset-lg-3">
               <form action="Ajax.php" method="POST">
                   <div class="form-content">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend m-1">
                                        <span class="input-group-text bg-success" id="Addone">Depart</span>

                                    </div>
                                    
                                    <!-- <select name="val1" class="form-control " aria-describedby="Addone" data-bs-toggle="tooltip" title="Please select the your fav lang" onchange="mylang(this.value)">
                                    
                                        <option >Select here</option>
                                        <option><?= $row['Depart']; ?></option>
                                        
                                    </select> -->


                                    <select class="form-select" aria-label="Default select example" name="Dval1" style="border-radius:10px;">
               
                <?php  
                  $query = $conn->query("SELECT DISTINCT Depart  FROM  travels");
        if ($query) {
            while($fetch = $query->fetch_array()) {
                echo "<option>" . $fetch['Depart']."</option>";
            }
        }
    ?>
</select>

                                    
                                </div>

                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend m-1">
                                        <span class="input-group-text bg-warning " id="Addone">Destination</span>

                                    </div>
                                    <select class="form-select" aria-label="Default select example" name="Dval2" style="border-radius:10px;" title="Please Select your Destination City" onchange="mylang(this.value)" id="options" >
               
               <?php  
                 $query = $conn->query("SELECT DISTINCT Destination  FROM  travels ");
                //  $query = $conn->query("SELECT  * FROM `travels`");
             if ($query) {
             while($fetch = $query->fetch_array()) {
               echo "<option>" . $fetch['Destination']."</option>";
           }
       }
   ?>
             </select>

                         </div>


                         <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="Addone">Program</span>

                                    </div>

                          <select class="form-control " aria-describedby="Addone" data-bs-toggle="tooltip" title="Please select the your Tour Places" id="TourPlace" required >
                                <option>Selet your Tours Place</option>
                
                      </select>
               </div>


                  
        
                         <input type="submit" name="regist" id="regist" class="btn btn-primary" value="search">
                   </div>
               </form>

               
            </div>
        </div>
    </div>
    <script>
           function mylang(data){
                alert(data);
                const ajaxreq=new XMLHttpRequest();
                ajaxreq.open('GET','http://localhost/Programs/pj/NotesAppFinalFinal/Finals/getPhp.php?selectvalue='+data,'TRUE');
                ajaxreq.send();

                ajaxreq.onreadystatechange = function(){
                    if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
                        document.getElementById('TourPlace').innerHTML=ajaxreq.responseText;
                    }
                }
                    
           }
        $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
           });
        </script>

<script>
      var map, Marker1;

      function initMap1() {
        map = new mappls.Map("map", {
          center: [28.61, 77.23],
          zoomControl: true,
          location: true,
        });
        Marker1 = new mappls.Marker({
          map: map,
          position: {
            lat: 10.909433399492215,
            lng: 78.36653469999999,
          },
          fitbounds: true,
          icon_url: "https://apis.mapmyindia.com/map_v3/1.png",
        });
      }
    </script>
  </body>
</html>
<?php
?>