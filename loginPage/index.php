
<?php

if(isset($_POST['submit'])){

  $username = $_POST['username'];
  $password = $_POST['password'];

  
  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbname = "loginid";

  //create connection.....
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

  if(mysqli_connect_error()) {

      echo "Connection lost";
  }else{

      $SELECT = "SELECT email From registration Where email = ? Limit 1";
      $query= "SELECT * FROM registration WHERE email='$username' ";

      $result = mysqli_query($conn,$query);
      $data=mysqli_fetch_assoc($result);

      if(mysqli_num_rows($result)==1){
        session_start();
        $_SESSION['id'] = $data['id'];
        
        header('location: profile.php');
          
      } else {
        echo "No User found";
      }
      
      $conn->close();
  }
}

?> 


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">



  <title>Department application</title>

  <link rel="stylesheet" href="index.css">
</head>

<body>

  <div class="container">
    <h1 class="text-center">Log In</h1>

   

      <form class="form" action="" method="post">
        

          <div class="form1">
            <label for="exampleInputEmail1">Email:</label>
            <input type="email" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            
          </div>

          <div class="form2">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>

         
        <div class="btn">
          <input class="btn1" type="submit" name="submit" value="Ok">
          <a href="home.php">
          SignUp
          </a>
        </div>

      </form>

    
  </div>

</body>



</html>