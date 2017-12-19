<?php 
    include('dbconnect.php');

    $action=$_POST["action"];

    if($action=="getbook"){
        $data = mysqli_query($dbhandle, "select * from book");
        if($data) {
            return "success!";
        }
        else 
            return "no data";
    }
?>