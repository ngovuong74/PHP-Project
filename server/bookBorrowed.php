<?php 
    session_start();
    include 'dbconnect.php';
    $array = [];
    $uid = $_SESSION['userID'];
    $result = mysqli_query($dbhandle, "select * from user_borrow_book where Users_UserName = '$uid'");

    while($row = mysqli_fetch_row($result)) {
        array_push($array, $row);
    }
    echo json_encode($array);
?>