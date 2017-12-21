<?php
    include("dbconnect.php");

    $isbnBook = mysqli_real_escape_string($dbhandle, $_POST['isbnBook']);
    $Title = mysqli_real_escape_string($dbhandle, $_POST['Title']);
    $Authors = mysqli_real_escape_string($dbhandle, $_POST['Authors']);
    $genre = mysqli_real_escape_string($dbhandle, $_POST['genre']);
    $Quantity = mysqli_real_escape_string($dbhandle, $_POST['Quantity']); //incase input has special variable

    $sql = "INSERT INTO book (`isbnBook`, `Title`,`Authors`, `genre`, `Quantity`) 
            VALUES ('$isbnBook', '$Title','$Authors', '$genre', '$Quantity');";

    if($dbhandle->query($sql)===TRUE)
    {
        header('Location:'.'phptestdbconnect.php');
    }
        else
        {
        echo "Fail to add information". $sql."<br>".$dbhandle->error;
        }
    $dbhandle->close();
?>