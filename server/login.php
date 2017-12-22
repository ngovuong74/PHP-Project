<?php 
    session_start();
    include("dbconnect.php");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = trim($username);
    $password = trim($password);

    $result = mysqli_query($dbhandle, "select * from users where UserName = '$username' and Password = '$password'")
        or die("Failed to connect database ");

    $row = mysqli_fetch_array($result);
    if($row['UserName'] == $username && $row['Password'] == $password) {
        
        $_SESSION['userID'] = $row['UserName'];
        header("Location: ../home.html");
    }
    else {
        header("Location: ../login.html");
    }
?>