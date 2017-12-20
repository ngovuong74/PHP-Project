<?php 
    include 'dbconnect.php';
    $array = [];
    $result = mysqli_query($dbhandle, "select * from book where Quantity > 0");

    while($row = mysqli_fetch_row($result)) {
        array_push($array, $row);
    }
    echo json_encode($array);
?>