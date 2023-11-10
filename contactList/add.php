<?php

if (isset($_POST['submit'])) {

    $username = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "contact";

    // Create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
        echo "Connection lost";
    } else {
        $SELECT = "SELECT number FROM list WHERE number = ? LIMIT 1";
        $INSERT = "INSERT INTO list (Name, email, number) VALUES (?, ?, ?)";

        // Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("i", $number);
        $stmt->execute();
        $stmt->bind_result($number);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum == 0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);

            // Bind parameters in the correct order
            $stmt->bind_param("ssi", $username, $email, $number);

            $stmt->execute();

            echo "New record inserted successfully";
        } else {
            echo "Someone already registered using this email";
        }
        $stmt->close();
        $conn->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Contact Add</h2>
    <form class="" action="" method="post" autocomplete="off">
        <table >
            
            <tr>
                <td><label for="name">Name: </label></td>
                <td><input type="text" name="name" id="name" required value=""></td>
            </tr>
            <tr>
                <td><label for="email">Email: </label></td>
                <td><input type="text" name="email" id="email" required value=""></td>
            </tr>
            <tr>
                <td><label for="number">Phone number: </label></td>
                <td><input type="number" name="number" id="number" required value=""></td>
            </tr>
            
            
            <tr>
                <td><button type="submit" name="submit" >Submit</button></td>
            </tr>
        </table>
    </form>

</body>
</html>



