<?php




if(isset($_POST['submit'])){

    $username = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    //$phoneCode = $_POST['phoneCode'];
    $phoneNo = $_POST['phoneNo'];
    $details = implode(',',$_POST['details']);
    
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "employe_details";

    //create connection.....
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if(mysqli_connect_error()) {

        echo "Connection lost";
    }else{

        $SELECT = "SELECT email From employe Where email = ? Limit 1";
        $INSERT = "INSERT INTO employe (Name, email, Gender, date, number, details
        )values (?, ?, ?, ?, ?, ?)";


        //prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if($rnum == 0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);

            $stmt->bind_param("ssssis", $username, $email, $gender, $dob, $phoneNo, $details);

            $stmt->execute();

            echo "New record inserted succesfully";
        } else {
            echo "Someone already register using this email";
        }
        $stmt->close();
        $conn->close();
    }

}

?>