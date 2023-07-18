<?php include ("connection1.php") ;
error_reporting(0);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Add a New Club</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      background-color: peru;
      }
      body, div, form, input, select, textarea, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      /* #logo {
    margin: 11px 33px;
}

#logo img {
    margin: 7px 18px;
    height: 56px;
} */

/*Navigation bar: List Styling */

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
      h1 {
      position: absolute;
      margin: 0;
      line-height: 42px;
      font-size: 42px;
      color: #fff;
      z-index: 2;
      }
      .testbox {
    
      margin :auto;
      width: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      margin-top:50px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 25px 0 #d6e0f5; 
      }
      .banner {
      position: relative;
      height: 300px;
      background-image: url(./clubphotos/ClubHome.jpg);  
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.3); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      input[type="date"] {
      padding: 4px 5px;
      }
      select {
      width: 100%;
      padding: 7px 0;
      background: transparent;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
    .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #d6e0f5;
      color: black;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #a9a9a9;
      }
      .item i {
      right: 2%;
      top: 28px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 1%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      input[type="submit"] {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #0087cc;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      input[type="submit"]:hover {
      background: #6eb8dd;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .img-display{
        margin: auto;
      }

    </style>
  </head>
  <body>
  <nav id="navbar">
        <ul>
            <li class="item"><a href="">Home</a></li>
                    <li class="item" ><a href="">Clubs</a></li>
                    <li class="item"><a href="">Events</a></li>
                    <li class="item"><a href="">Login</a></li>
                    <li class="item"><a href="">Logout</a></li>
                    <li class="item"><a href="">Admin Login</a></li>
        </ul>
    </nav>
    <div class="testbox">
        <form method="POST" action="#" enctype="multipart/form-data">
        <div class="banner">
          <h1>ADD NEW CLUB</h1>
        </div>
        <div class="item">
          <p>Club Name</p>
          <div class="name-item">
            <input type="text" name="clubName" placeholder="Enter New Club Name" />
          </div>
        </div>
         
         <div class="item">
          <p>Club Description</p>
          <textarea rows="4" name="desc" placeholder="Enter Description About Club"></textarea>
        </div>


        <div class="item">
          <p>Choose an Image For The Club</p>
          <input type="file" name="uploadfile" value="choose a file">
        </div>
         <div class="btn-block">
            <input type="submit" name="added" value="Add">
        </div>
      </form>
    </div>
  </body>
</html>

<?php
    

if($_POST['added'])
{
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    
    $folder = "clubphotos/" .$filename;
    
    move_uploaded_file($tempname, $folder);

    $cname = $_POST['clubName'];
    $cdesc = $_POST['desc'];

    $query = "INSERT INTO club values('$cname','$cdesc','$folder')";

        $data = mysqli_query($conn,$query);

        if($data)
        {
            echo "<script>alert('The Club has been Added')</script>";
        }
        else
        {
            echo "Failed";

        }
    
}


?>