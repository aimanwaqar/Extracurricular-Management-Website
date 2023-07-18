<?php include("connection1.php");
$phpLink = "http://localhost/FinalProject/phpfiles/ClubMainPg.php";
$login = "http://localhost/FinalProject/phpfiles/StudLogin.php";
$logout ="http://localhost/FinalProject/phpfiles/logout.php";
$event ="http://localhost/FinalProject/PhpFiles/event.php";
$AdminLogin =  "http://localhost/FinalProject/PhpFiles/AdminLogin.php";
$Home =  "http://localhost/FinalProject/PhpFiles/home.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clubs</title>
    <link rel="stylesheet" href="ClubMainPg.css">
    <link rel="stylesheet" media="screen and (max-width: 1170px)" href="css/phone.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">

</head>

<body>
    <nav id="navbar">
        <div id="logo">
            <!-- <img src="logo.png" alt="MyOnlineMeal.com"> -->

        </div>
        <ul>
            <li class="item"><a href="<?php echo $Home ?>">Home</a></li>
                    <li class="item" ><a href="<?php echo $phpLink ?>">Clubs</a></li>
                    <li class="item" ><a href="<?php echo $event ?>">Events</a></li>
                    <li class="item" ><a href="<?php echo $login ?>">StudentLogin</a></li>
                    <li class="item" ><a href="<?php echo $logout ?>">logout</a></li>
                    <li class="item" ><a href="<?php echo $AdminLogin ?>">Admin Login</a></li>


        </ul>
    </nav>
    <section id="home">
        <h1 class="h-primary">Welcome to Clubs</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed facilis deleniti obcaecati?</p>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit</p>
    </section><br><br><br>
    <section class="clubs-container">
        <h1 class="h-primary center">Clubs</h1>
        <div class="clubs">
            <div class="box">
                <!-- <img src="football.jpg" alt="" class="club-img"> -->
                <img src="./clubphotos/CricketMain.jpg" alt="" class="top club-img">
                <h2 class="h-secondary center">Cricket</h2>
                <p class="center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam architecto illo
                    reiciendis repellendus nobis nulla possimus ipsa doloremque.</p>
                    <a class="box-btn center" href="CricketClubPg.html">View</a>
            </div>
            <div class="box">
                <!-- <img src="img/photography/p2.jpg" alt=""  class="club-img"> -->
                <img src="./clubphotos/photographyBack.jpg" alt=""  class="top club-img">
                <h2 class="h-secondary center">Photography</h2>
                <p class="center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam architecto illo
                    reiciendis repellendus nobis nulla possimus ipsa doloremque. </p>
                    <a class="box-btn center" href="Photography.html">View</a>
            </div>
            <div class="box">
                <!-- <img src="img/debate/d2.jpg" alt="" class="club-img"> -->
                <img src="./clubphotos/g9.jpg" alt="" class="top club-img">
                <h2 class="h-secondary center">Debate</h2>
                <p class="center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam architecto illo
                    reiciendis repellendus nobis nulla possimus ipsa doloremque.</p>
                <a class="box-btn center" href="FootballPage.html">View</a>
            </div>
        </div>
        <div class="clubs">
            <div class="box">
                <!-- <img src="img/painting/p2.jpg" alt="" class="club-img"> -->
                <img src="./clubphotos/p3.jpg" alt="" class="top club-img">
                <h2 class="h-secondary center">Painting</h2>
                <p class="center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam architecto illo
                    reiciendis repellendus nobis nulla possimus ipsa doloremque.</p>
                    <a class="box-btn center" href="FootballPage.html">View</a>
            </div>
            <div class="box">
                <!-- <img src="img/coders/c3.jpg" alt="" class="club-img"> -->
                <img src="./clubphotos/CoderMain.jpg" alt="" class="top club-img">
                <h2 class="h-secondary center">Coders</h2>
                <p class="center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam architecto illo
                    reiciendis repellendus nobis nulla possimus ipsa doloremque. </p>
                    <a class="box-btn center" href="CodersClubPg.html">View</a>
            </div>
            <div class="box">
                <!-- <img src="img/football/f4.jpg" alt="" class="club-img"> -->
                <img src="./clubphotos/footballback.webp" alt="" class="top club-img">
                <h2 class="h-secondary center">Football</h2>
                <p class="center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam architecto illo
                    reiciendis repellendus nobis nulla possimus ipsa doloremque.</p>
                    <a class="box-btn center" href="FootballPage.html">View</a>
            </div>


            <?php 
            
            $query = "SELECT * FROM club WHERE cNAME NOT IN ('Football','Photography','Coders','Debate','Cricket','Painting') ";
            $query_run = mysqli_query($conn,$query);
            $check_rows = mysqli_num_rows($query_run) > 0;


            if($check_rows)
            {

               while($row = mysqli_fetch_assoc($query_run))
               {
                   ?>
                   <div class="box">
                        <!-- <img src="img/football/f4.jpg" alt="" class="club-img"> -->
                        <img src="<?php echo $row['cImage'] ?>" alt="" class="top club-img">
                        <h2 class="h-secondary center"><?php echo $row['cName']; ?></h2>
                        <p class="center"><?php echo $row['description']; ?></p>
                    </div>

                   <?php  
               }
            }
            
            else
            {
                echo "No Club Record Found";
            }
            ?>
        </div>
    </section>
    <footer>
        <div class="center">
            Copyright &copy; www.The_great_school.com. All rights reserved!
        </div>
    </footer>
</body>

</html>