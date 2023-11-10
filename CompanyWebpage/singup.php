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
        $role = $_POST['role'];
        if($role=='employe'){
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $course = $_POST['course'];
        }

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "admin&employe";

        // Create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $SELECT = "SELECT email FROM details WHERE email = ? LIMIT 1";
            if($role=='employe'){
                $INSERT = "INSERT INTO details (name, email, password, gender, dob, course, roll) VALUES (?, ?, ?, ?, ?, ?, ?)";
            }else{
                echo "admin";
            $INSERT = "INSERT INTO details (name, email, password, roll) VALUES (?, ?, ?, ?)";
            }
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
                //$hashed_password = password_hash($password, PASSWORD_DEFAULT);
                if($role=='employe'){
                $stmt->bind_param("sssssss", $username, $email, $password, $gender, $dob, $course, $role);
                }else{
                    $stmt->bind_param("ssss", $username, $email, $password, $role);
                }
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
    <h2>Registration</h2>
    <form class="" action="" method="post" autocomplete="off" onsubmit="return validateForm();">
        <table >
            <tr>
                <td><label for="course"></label></td>
                <td>
                    <select name="role" id="select" onchange="check()" required>
                        <option value="">Select</option>
                        <option value="employe">Employee</option>
                        <option value="admin">Admin</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="name">Name: </label></td>
                <td><input type="text" name="name" id="name" required value=""></td>
            </tr>
            <tr>
                <td><label for="email">Email: </label></td>
                <td><input type="text" name="email" id="email" required value=""></td>
            </tr>
            <tr>
                <td><label for="password">Password: </label></td>
                <td><input type="password" name="password" id="password" required value=""></td>
            </tr>
            <tr>
                <td><label for="confirmpassword">Confirm Password: </label></td>
                <td><input type="password" name="confirmpassword" id="confirmpassword" required value=""></td>
            </tr>
            <tr id="table" class="admin-box">
                <td><label>Gender*</label></td>
                <td><input type="radio" name="gender" value="M" > M</td>
                <td><input type="radio" name="gender" value="F" > F</td>
            </tr>
            <tr class="admin-box">
                <td><label>DOB:</label></td>
                <td><input type="date" name="dob" ></td>
            </tr>
            <tr class="admin-box">
                <td><label>Course:</label></td>
                <td>
                    <select name="course" >
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
    <script>
        function check() {
          var change = document.getElementById("select").value;
          var Table = document.getElementById("table");

          var admin = document.getElementsByClassName("admin-box");

          if (change == "admin") {
            for (var i = 0; i < admin.length; i++) {
                admin[i].style.display = 'none';
                
              }

          } else {
          for (var i = 0; i < admin.length; i++) {
                admin[i].style.display = 'block';
              
              }
          }
        }
    </script>
</body>
</html>



