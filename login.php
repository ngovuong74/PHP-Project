<?php
    include('dbconnection.php');    
    $libDB = connectTable("librarian");
?>

<html>
    <head>
        <title>Login</title>
    </head>

    <body>
        <?php
            while($librarian= mysqli_fetch_assoc($libDB)){
                echo "<p>First Name: ".$librarian['FirstName']."</p>";
                echo "<p>Last Name: ".$librarian['LastName']."</p>";
            }
        ?>
    </body>
</html>