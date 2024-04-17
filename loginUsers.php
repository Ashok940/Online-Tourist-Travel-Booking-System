<?php
session_start();
include 'db.php';


$departsql=" SELECT*FROM travels";
$departMysql=mysqli_query($conn,$departsql);
$msg="";
if(isset($_POST['registl'])){
    $val1=$_POST['Dval1'];
    $val2=$_POST['Dval2'];
    $val3=$_POST['Dval3'];
    $dates=$_POST['dateb'];
    $durations=$_POST['durat'];
    $tmode=$_POST['bys'];
    $_SESSION['departs']=$val1;
    $_SESSION['Desti']=$val2;
    $_SESSION['Tours']=$val3;
    $lid=$_SESSION['ids'];
    $lname=$_SESSION['lname'];
    $mob=$_SESSION['lmob'];
    $lid=(int)$lid;
    $lname=(string)$lname;
    $mob=(string) $mob;


    $currentDate = date("Y-m-d");
    if (strtotime($dates) > strtotime($currentDate)) {
      $sql="INSERT INTO userlong(Name,Mobile,depart,destination,ToursPlace,Duration,Mode,BookedDate) VALUES ('$lname','$mob','$val1','$val2','$val3','$durations','$tmode','$dates')";
      $mysqlis=mysqli_query($conn,$sql);

    if($mysqlis){
        $msg="<div class='alert alert-success'>You are find the journey according to the city</div>";
         header("refresh:1,Book.php");
    }else{
        $msg="<div class='alert alert-danger'>something error</div>";
    }
  } else {
    $msg="<div class='alert alert-danger'>You have Choosed wrong Booking Date";
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
     .setData{
      display:none;
     }
     .headers{
  background: linear-gradient(90deg,#ff0011,#0d1cc1);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  font-weight: 800;
  font-size:30px;
}
.modes{
  font-weight: 800;
  color:black;
}
#map {
        margin-top: 0px;
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
        <h4 class="text-center text-capitalize my-5 headers">Welcome to My Travel Booking Page</h4>
        
        <div class="row">
            
            <div class="col-lg-6 offset-lg-3">
               <form action="loginUsers.php" method="POST">
                   <div class="form-content">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend m-1">
                                        <span class="input-group-text bg-success" id="Addone" style="width:120px;">Depart</span>

                                    </div>
                                    


                                    <select class="form-select" aria-label="Default select example" name="Dval1" style="margin-left: 80px;border-radius:5px;">
               
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
                                        <span class="input-group-text bg-warning " id="Addone" style="width:120px;">Destination</span>

                                    </div>
                                    <select class="form-select" aria-label="Default select example" name="Dval2" style="margin-left: 80px;border-radius:5px;"  title="Please Select your Destination City" onchange="mylang(this.value)" id="options">
               
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
                                        <span class="input-group-text input-group-text bg-primary" id="Addone" style="width:120px;">Tours Place</span>

                                    </div>

                           <select class="form-control " aria-describedby="Addones"           data-bs-toggle="tooltip" name="Dval3" title="Please select the your Tour Places" id="TourPlace"  style="margin-left: 85px;border-radius:5px;" >
                                <option>Selet your Tours Place</option>
                
                      </select>
               </div>
                 
               <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-group-text bg-info" id="Addone" style="width:120px;">Duration</span>

                                    </div>

                           
                              <select name="durat" id="" class="form-control" style="margin-left: 85px;border-radius:5px;">
                              <option value="">Select Duration Of Journey</option>
                                   <option >2D-1N</option>
                                   <option >3D-2N</option>
                                   <option >4D-3N</option>
                                   <option >5D-4N</option>
                              </select>


               </div>

               <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-group-text bg-secondary" id="Addone" style="width:120px;">Booking Date</span>

                                    </div>

                           <input type="date" name="dateb" class="form-control" id="date" style="margin-left: 85px;border-radius:5px;">
               </div>

                       
                <div>

                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-group-text bg-link" id="Addone" style="width:120px ;">Travel Mode</span>

                                    </div>

                   <label for="" class="text-light modes" style="margin-left: 85px;margin-top:12px;border-radius:5px; font-size:20px;">Train</label>
                   <input type="radio"  name="bys" value="Train" id="" style="margin-inline-start:20px;10px; width:20px; " >

                   <label class="text-light modes" for="" style="margin-left: 70px;margin: 12px;border-radius:5px; font-size:20px;"> Flight</label>
                   <input type="radio"  name="bys" value="flight" id="" style="margin-inline-start:20px;10px; width:20px; "  >
                </div>

        
                <input type="submit" name="registl" id="showDataButton" class="btn btn-primary btn-lg d-block" value="search" style="margin-left:320px;">   
                   </div>
                   
                   
               </form><br>
               <?= $msg ; ?>
              
               
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
      document
        .getElementById("showDataButton")
        .addEventListener("click", function () {
          // Get the data container
          const dataContainer = document.getElementById("dataContainer");

          dataContainer.classList.remove("setData");
        });
    </script>
            <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="599ad1bd-3833-4b53-8085-941ee0439647";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();
          </script>


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
<?php
?>