<?php


function validateForm() {
    // Check to make sure that the password and confirm password fields match.
    if ($_POST['password'] == $_POST['confirmpassword']) {
      //alert("Password and Confirm Password do not match.");
      return true;
    }

}
if (isset($_POST['submit'])) {
    if (validateForm()) {
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $course = $_POST['course'];

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "loginid";

        // Create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $SELECT = "SELECT email FROM registration WHERE email = ? LIMIT 1";
            $INSERT = "INSERT INTO registration (name, email, password, gender, dob, course) VALUES (?, ?, ?, ?, ?, ?)";

            // Prepare statement for SELECT
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                // Prepare statement for INSERT
                $stmt = $conn->prepare($INSERT);
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt->bind_param("ssisss", $username, $email, $hashed_password, $gender, $dob, $course);
                $stmt->execute();
                echo "New record inserted successfully";
            } else {
                echo "Someone already registered using this email";
            }
            $stmt->close();
            $conn->close();
        }
    }else{
        echo "wrong password";
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
    <h2>Registeration</h2>
    <form class="" action="" method="post" autocomplete="off" onsubmit="return validateForm();">

    <table>
            <tr>
                <td><label for="name">Name: </label></td>
                <td><input type="text" name="name" id="name" required value=""></td>

            </tr>
            <br>
            <tr>

                <td><label for="name">Email: </label></td>
                <td><input type="text" name="email" id="name" required value=""></td>

            </tr>
            <tr>
                <td><label for="password">Password: </label></td>
                <td><input type="password" name="password" id="password" required value=""></td>
            </tr>

            <tr>
                <td><label for="confirmpassword">Confirm Password: </label></td>
                <td><input type="password" name="confirmpassword" id="confirmpassword" required value=""></td>
            </tr>

            <tr>

                <td><label>Gender*</label></td>
                <td><input type="radio" name="gender" value="M" required> M</td>
                <td><input type="radio" name="gender" value="F" required> F</td>

            </tr>

            

            <tr>

                <td><label>DOB:</label></td>
                <td><input type="date" name="dob" required></td>

            </tr>

            

            <tr>

                <td><label>Course:</label></td>
                <td>
                <select name="course" required>
                    <option value=""></option>
                    <option value="MCA">+MCA</option>
                    <option value="M.Tech">+M.Tech</option>
                    <option value="MSC">MSC</option>
                    <option value="PHD">PHD</option>
                </select>
                
                </td>

            </tr>

            

            <tr>

                <td><button type="submit" name="submit" onclick="validateForm()">Submit</button></td>

            </tr>

        </table>
   
    </form>
    
</body>
</html>


