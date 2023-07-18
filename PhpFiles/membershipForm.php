<?php
include("connection1.php"); 
session_start();

    $user_profile = $_SESSION['user_name'];

    if($user_profile == true)
    {

    }
    else
    {
        header('location:StudLogin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/member.css"> -->
    <title>Contact</title>
    <style>
*{
    margin: 0px;
    padding: 0px;
}

body,html{
    height: 100%;
    background: url('./images/mbg.jpg') no-repeat center center/cover;
}

/* Section */
.h-primary{
    font-size: 3.8rem;
    color: white;
    padding-bottom: 30px;
    padding-top: 49px;
    text-decoration: underline;
}
.center{
    text-align: center;
}

section{
    padding-top:180px;
}
/*Form */

form{
    border: 2px solid white;
    border-radius: 22px;
    /* height: 90%; */
    width: 40%;
    margin: auto;
    background: rgb(0, 0, 0); /* Fallback color */
    background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
    height: 60vh;
}
form input{
    margin: auto;
}

/* Table */

table{
    border-spacing:23px;
    margin: 10px;
    margin-left: 90px;
    margin: auto;
}
table tr{
    text-align: center;
    font-size: 20px;
}

table td{
    color: white;
    text-align: center;
    font-size: 24px;
}

table input{
    border-radius: 21px;
    text-align: center;
    height: 24px;
   
}

button{
   width: 100%;
   height: 40%;
   margin: auto;
   padding: 6px;
   border-radius: 22px;
   border: 2px solid black;
   font-size: 15px;
}

button:hover{
    background-color: gray;
}
#navbar{
    float: right;
}
#navbar ul {
    display: flex;
    font-family: 'Baloo Bhai', cursive;
}

#navbar ul li {
    list-style: none;
    font-size: 1.1rem;
}

#navbar ul li a {
    color: black;
    background-color: azure;
    display: block;
    padding: 3px 23px;
    border-radius: 20px;
    text-decoration: none;
    /* margin: 0px 10px; */
    margin: 20px;
}

#navbar ul li a:hover{
    color: black;
    background-color: peru;
}
 </style>
</head>
<body>
 
<!-- //   $conn=mysqli_connect("localhost","root",""); 
//   if(!$conn)
//   {
//       echo("Unable to connect with server");
//       die();
//     }
//     else{
//         echo("Connected with server <br>");
//     }
    // $mydb="club_management_system";
    // $Db=mysqli_select_db($conn,$mydb);
    // if(!$Db)
    // {
    //     echo("Unable to connect with Database");
    //     die();
    // }
    // else{
    //     echo("Connected with Database");
    // } -->
    <nav id="navbar">
        <div id="logo">
            <!-- <img src="logo.png" alt="MyOnlineMeal.com"> -->

        </div>
        <ul>
            <li class="item"><a href="">Home</a></li>
                    <li class="item" ><a href="">Clubs</a></li>
                    <li class="item"><a href="">Events</a></li>
                    <li class="item"><a href="">Login</a></li>
                    <li class="item"><a href="">Logout</a></li>
                    <li class="item"><a href="">Admin Login</a></li>
        </ul>
    </nav>
    <section id="contact-form">
        <form action="" method="POST">
            <h1 class="h-primary center">Membership Form</h1>
            <table>
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" id="name" placeholder="Enter your name">
                    </td>
                </tr>
                <tr>
                    <td>Roll No</td>
                    <td>
                        <input type="text" name="rollNo" id="name" placeholder="Enter your Roll No">
                    </td>
                </tr>
                <tr>
                    <td>Grade</td>
                    <td>
                        <input type="text" name="grade" id="name" placeholder="Enter your Grade No">
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="email" id="email" placeholder="Enter your email">
                    </td>
                </tr>
                <tr>
                    <td><label for="clubs">Club</label></td>
                    <td>
                        <select name="clubs" id="clubs">
                            <option>Select anyone</option>
                            <option value="cricket">CRICKET</option>
                            <option value="football">FOOTBALL</option>
                            <option value="painting">PAINTING</option>
                            <option value="photography">PHOTOGRAPGHY</option>
                            <option value="debate">DEBATE</option>
                            <option value="coders">CODERS</option>
                            <?php 
            
                            $query = "SELECT * FROM club WHERE cNAME NOT IN ('Football','Photography','Coders','Debate','Cricket','Painting') ";
                            $query_run = mysqli_query($conn,$query);
                            $check_rows = mysqli_num_rows($query_run) > 0;


                            if($check_rows)
                            {

                                while($row = mysqli_fetch_assoc($query_run))
                            {
                            ?>
                            <option value="coders"><?php echo $row['cName'] ?></option>

                             <?php  
                  }
            }
            
            else
            {
               
            } 
            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" value="submit" name="sub1">Send Data</button>
                    </td>
                </tr>
            </table>
        </form>    
    </section> 

    <?php

if (isset($_POST['sub1']))
{
    $name=$_POST['name'];
    $rollNo=$_POST['rollNo'];
    $grade=$_POST['grade'];
    $email=$_POST['email'];
    $clubs=$_POST['clubs'];



    $result=mysqli_query($conn,"INSERT INTO membership(mName,rollNo,sEmail,mGrade,cName) VALUES('$name','$rollNo','$email','$grade','$clubs')");
    
    // if ($result==true)
    // {
    //   echo("The Following Data has been Added To Table");
    //   }
    //   else{
    //        echo "ERROR";
    //   }
 }

 ?>
 </body>
</html>