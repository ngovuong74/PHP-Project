<?php
    function connectTable($name) {
        $dbhandle = mysqli_connect('localhost','root','');
    
        if($dbhandle){
            mysqli_select_db($dbhandle,'mydb');
            $sql = "SELECT * FROM $name";
            return $results = mysqli_query($dbhandle,$sql);
        }
        return null;
    }    
?>
