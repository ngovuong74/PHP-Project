<?php 
    session_start();
    include('dbconnect.php');
    $bid = $_GET['q'];
    $uid = $_SESSION['userID'];
    $date = "".date("d/m/Y");

    $result = mysqli_query($dbhandle, "UPDATE book SET Quantity = Quantity - 1 WHERE isbnBook = '$bid'");     
    $result1 = mysqli_query($dbhandle, "INSERT INTO user_borrow_book (Users_UserName, Book_isbnBook, DateBorrowed) VALUES ('$uid', '$bid', '$date')");     
    
    echo $result && $result1 ? "Borrow success!" : "Can't operate this action";
?>