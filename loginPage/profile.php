<?php

session_start();
if(isset($_SESSION['id'])){
    

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "loginid";
  
    //create connection.....
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);


    $id = $_SESSION['id'];

    $query= "SELECT * FROM registration WHERE id='$id' ";
    $result = mysqli_query($conn,$query);
    
    $data=mysqli_fetch_assoc($result);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Attractive Resume</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
        }

        .header img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 4px solid #000000;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="R.jpeg" alt="Your Photo">
            <div class="name"> <?php echo $data['name']; ?> </div>
            <div class="contact-info">
                Email: <?php echo $data['email']; ?> <br>
                Gender: <?php echo $data['gender']; ?> <br>
                Date Of Birth: <?php echo $data['dob']; ?> <br>
            </div>
        </div>
        <div class="section">
            <h2>Education</h2>
            <li><b>Pondicherry University</b>- <?php echo $data['course']; ?>(22-24)</li>
            
        </div>
        
        
    </div>
</body>

</html>