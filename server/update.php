<html>
    <head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    </head>

    <body>
    
    <script type="text/javascript">
		function clickme()
		{
		window.location="phptestdbconnect.php";
		}
	</script>
    <?php
    $id = $_GET['idd'];
    include('dbconnect.php');
    $sql = $dbhandle->query("SELECT * FROM book where isbnBook = '$id'");
    $result=$sql->fetch_assoc();
    if(isset($_POST['update']))
    {
        $sd = $_POST['isbnBook'];
        $tit = $_POST['Title'];
        $au = $_POST['Authors']; 
        $gen = $_POST['genre'];
        $quan = $_POST['Quantity'];


        $record = $dbhandle->query("UPDATE book SET isbnBook = '$sd', Title = '$tit', 
                                    Authors = '$au', genre = '$gen', Quantity = '$quan' 
                                    WHERE isbnBook = $sd");

        if($record){
    ?>
                <script>
				alert("Data updated Successfully");
				window.location="phptestdbconnect.php";
			</script>
        <?php  }else{ ?>
            <script>
				alert("Fail! Error updating data, please try again");
				window.location='update.php';
			</script>
    <?php 
    } 
}?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                    aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Book Updating Management Website</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../adminLogin.html">Logout</a>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>
    
    <div class="wrapper">
        <div class="container">
            <h3>UPDATE BOOK FORM</h3>
            <form class="form-horizontal" method="POST">
                <fieldset>
                    <div id="legend">
                        
                            <legend class="">Book Information</legend>
                        
                    </div>
                    <div class="control-group">
                        <label class="control-label">ID: </label>
                        <div class="controls">
                            <input type ="text"  name = "isbnBook" id="isbnBook" maxlength = "1000000000"
                            value ="<?php echo $result['isbnBook'] ?>" class="input-xlarge">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Name: </label>
                        <div class="controls">
                            <input type = "text"name = "Title" id="Title" maxlength="100"
                            value ="<?php echo $result['Title'] ?>" class="input-xlarge">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Authors: </label>
                        <div class="controls">
                            <input type = "text"name = "Authors" id="Authors" maxlength="100"
                            value ="<?php echo $result['Authors'] ?>" class="input-xlarge">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Genre: </label>
                        <div class="controls">
                            <input type = "text" name = "genre" id="genre" maxlength="100"
                            value ="<?php echo $result['genre'] ?>" class="input-xlarge">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Quantity: </label>
                        <div class="controls">
                            <input type ="number" name = "Quantity" id="Quantity" class="input-xlarge"
                            value ="<?php echo $result['Quantity'] ?>" 
                            min ="1"
                            max = "100"
                            step ="1" />
                                
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type = "submit" class="btn success" name="update">Update</button>
                            <button type = "button" class="btn info" onclick="clickme()">Back</button>
                        </div>
                    </div>
                </fieldset>
            </form>
  
    </body>
</html>