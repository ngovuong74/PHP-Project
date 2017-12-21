<?php
 include('dbconnect.php');
 $uid = $_POST['borrowId'];
 $bid = $_POST['isbnBook'];
 $br = "".date("d/m/Y");

 $sql = $dbhandle->query("UPDATE book set Quantity = Quantity+ 1 where isbnBook ='$bid'");
$sql1 = $dbhandle->query("UPDATE user_borrow_book SET DateReturned = '$br' 
                        WHERE Users_UserName = '$uid' and Book_isbnBook ='$bid'"); 

header('Location: form.php');
?>


