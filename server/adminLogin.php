<?php 
    include("dbconnect.php");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($dbhandle, "select * from librarian where idLibrarian = '$username' and Password = '$password'")
        or die("Failed to connect database ");

    $row = mysqli_fetch_array($result);
    if($row['idLibrarian'] == $username && $row['Password'] == $password) {
        
        // $_SESSION['userID'] = $row['idLibrarian'];
        header("Location: addbookform.php");
    }
    else {
        header("Location: ../adminLogin.html");
    }
?>