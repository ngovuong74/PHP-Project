<?php 
    include 'dbconnect.php';
    $array = [];
    $result = mysqli_query($dbhandle, "select * from user_borrow_book");

    while($row = mysqli_fetch_row($result)) {
        array_push($array, $row);
    }
    echo json_encode($array);
?>