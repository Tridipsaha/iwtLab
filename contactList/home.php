<?php
session_start();

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "contact";

//create connection.....
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if (isset($_GET['delete'])) {
    $id_to_delete = $_GET['delete'];
    $delete_query = "DELETE FROM list WHERE id = $id_to_delete";
    if (mysqli_query($conn, $delete_query)) {
        echo "Record with ID $id_to_delete has been deleted successfully.";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}


if (isset($_POST['update'])) {
    $id_to_update = $_POST['id'];
    $updated_name = $_POST['name'];
    $updated_email = $_POST['email'];
    $updated_number = $_POST['number'];
    
    $update_query = "UPDATE list SET name = '$updated_name', email = '$updated_email', number = '$updated_number' WHERE id = $id_to_update";
    
    if (mysqli_query($conn, $update_query)) {
        echo "Record with ID $id_to_update has been updated successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

    $query= "SELECT * FROM list";
      $result = mysqli_query($conn,$query);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="home.css" />
</head>

<body>
    <nav class="navigation">

        <!---Title--------------->
        <a href="#" class="logo">
            Contacts
        </a>
        <!---menu---------------->
        <ul class="menu">
            <li><a href="add.php">+</a></li>
            <!-- <li><a href="#">Edit</a></li> -->
            
        </ul>

    </nav>


    <section id="table">
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone number</th>

            </tr>
            <?php 
            while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['number']; ?></td>
                <td><a href="home.php?delete=<?php echo $row['id']; ?>">Delete</a></td>
                <td><a href="home.php?edit=<?php echo $row['id']; ?>">Edit</a></td>
            </tr>
           <?php } ?>

        </table>
    </section>
    <?php if (isset($_GET['edit'])) {

        $id_to_edit = $_GET['edit'];
        $edit_query = "SELECT * FROM list WHERE id = $id_to_edit";
        $edit_result = mysqli_query($conn, $edit_query);
        $row = mysqli_fetch_assoc($edit_result); 
        
        ?>
        <section id="edit-form">
            <h3>Edit Contact</h3>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
                <label for="email">Email:</label>
                <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
                <label for="number">Phone number:</label>
                <input type="number" name="number" value="<?php echo $row['number']; ?>"><br>
                <input type="submit" name="update" value="Update">
            </form>
        </section>
    <?php } ?>
</body>

</html>