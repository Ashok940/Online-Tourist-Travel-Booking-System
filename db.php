<?php
 $host="localhost";
 $user="root";
 $pass="";
 $dbname="travelbookingsystem";
 $conn=mysqli_connect($host,$user,$pass,$dbname);
 if($conn){

 }else{
    echo "something Error".mysqli_connect_error();
 }

?>