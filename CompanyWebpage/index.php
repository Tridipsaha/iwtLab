<?php
session_start();

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "admin&employe";

//create connection.....
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

$role = $_SESSION['role'];

if($role=='admin'){
    $query= "SELECT * FROM details WHERE roll='employe'";
      $result = mysqli_query($conn,$query);
}else{
    $query= "SELECT * FROM details WHERE roll='admin'";
    $result = mysqli_query($conn,$query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My World</title>

    <link rel="stylesheet" type="text/css" href="index.css" />
</head>

<body>

    <nav class="navigation">

        <!---Title--------------->
        <a href="#" class="logo">
            eGrocery
        </a>
        <!---menu---------------->
        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Categories</a></li>
            <li><a href="#">Packages</a></li>
            <li><a href="#">App</a></li>
        </ul>

    </nav>


    <section id="table">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>password</th>
                <?php 
                if($role=='admin'){
                ?>
                <th>Gender</th>
                <th>DOB</th>
                <th>Course</th>
                <?php } ?>
            </tr>
            <?php 
            while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <?php if($role=='admin'){ ?>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['dob']; ?></td>
                <td><?php echo $row['course']; ?></td>
                <?php } ?>

            </tr>
           <?php } ?>
        </table>
    </section>

</body>

</html>