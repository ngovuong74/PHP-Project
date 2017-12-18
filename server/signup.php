<?php 
    include("dbconnect.php");

    $username = $_POST['signup_username'];
    $password = $_POST['signup_password'];
    $confirm_pass = $_POST['password_confirmation'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];

    if($confirm_pass == $password) {
        $result = mysqli_query($dbhandle, "select * from users where UserName = '$username'")
            or die("Failed to connect database ");

        $row = mysqli_fetch_array($result);
        if($row['UserName'] == $username) {
            
            header("Location: ../signup.html");
        }
        else {
            mysqli_query($dbhandle, "INSERT INTO users (`UserName`, `Password`, `fname`, `lname`) VALUES ('$username', '$password', '$firstname', '$lastname')");
            header("Location: ../home.html");        
        }
    } else {
        header("Location: ../signup.html");
    }
?>