<?php
  //error_reporting(0);  
  $servername = "localhost";
  $username ="root";
  $password = "";
  $dbname = "club_management_system";

  $conn = mysqli_connect($servername,$username,$password,$dbname);

  if($conn)
  {
    //echo "Conncetion Successful";
  }
  else
  {
    echo "Connection Failed";
  }
  ?>