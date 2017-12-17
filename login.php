<?php
    include('dbconnection.php');    
    $libDB = connectTable("librarian");
?>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/mystyle.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-6">
                    <div class="panel panel-default my-panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Welcome to my site</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="button" class="btn btn-success btn-block">Login</button>
                                    <p>New Member? <a href="signUp.html" class="">Sign up</a></p>
                                    <?php
                                        // while($librarian= mysqli_fetch_assoc($libDB)){
                                        //     echo "<p>First Name: ".$librarian['idLibrarian']."</p>";
                                        //     echo "<p>Last Name: ".$librarian['Password']."</p>";
                                        // }
                                    ?>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>