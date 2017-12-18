<?php
    function connectTable($name) {
        $dbhandle = mysqli_connect('localhost','root','');
    
        if($dbhandle){
            mysqli_select_db($dbhandle,'mydb');
            // mysqli_select_db($dbhandle,'cs4443');
            $sql = "SELECT * FROM $name";
            return $results = mysqli_query($dbhandle,$sql);
        }
        return null;
    }    
?>
