<html>
    <head>
    <meta charset="UTF-8">
    <title>Update</title>
    <style>
			.btn {
   			 border: none;
   			 color: white;
   			 padding: 14px 28px;
   			 font-size: 16px;
   			 cursor: pointer;}
			.success {background-color: #4CAF50;} /* Green */
			.success:hover {background-color: #46a049;}

			.info {background-color: #2196F3;} /* Blue */
			.info:hover {background: #0b7dda;}

			.warning {background-color: #ff9800;} /* Orange */
			.warning:hover {background: #e68a00;}

			.danger {background-color: #f44336;} /* Red */ 
			.danger:hover {background: #da190b;}

			.default {background-color: #e7e7e7; color: black;} /* Gray */ 
			.default:hover {background: #ddd;}
		</style>   
    </head>

    <body>
    <script type="text/javascript">
		function clickme()
		{
		window.location="phptestdbconnect.php";
		}
	</script>
    <left><h1>UPDATE INFORMATION</h1></left>
    <?php
    $id = $_GET['idd'];
    $dbhandle = mysqli_connect('localhost','root','','mydb');
    $sql = $dbhandle->query("SELECT * FROM book where isbnBook = '$id'");
    $result=$sql->fetch_assoc();
    if(isset($_POST['update']))
    {
        $sd = $_POST['isbnBook'];
        $tit = $_POST['Title']; 
        $gen = $_POST['genre'];
        $quan = $_POST['Quantity'];

        $record = $dbhandle->query("UPDATE book set Title='$tit', genre ='$gen', Quantity='$quan' 
        Where isbnBook='$sd' ");
        if($record){
    ?>
                <script>
				alert("Data updated Successfully");
				window.location="phptestdbconnect.php";
			</script>
        <?php  }else{ ?>
            <script>
				alert("Fail! Error updating data, please try again");
				window.location='phptestdbconnect.php';
			</script>
    <?php 
    } 
}?>
    <form method="post">
            <label>Id : 
            <input type ="text"  name = "isbnBook" id="isbnBook"maxlength = "1000000000"
            value ="<?php echo $result['isbnBook'] ?>" </label><br>

            <label>Name: 
            <input type = "text"name = "Title" id="Title" maxlength="100"
            value ="<?php echo $result['Title'] ?>" ></lable><br>

            <label>Genre : 
            <input type = "text" name = "genre" id="genre"maxlength="100"
            value ="<?php echo $result['genre'] ?>" </lable><br>

            <label>Quantity : 
            <input type ="number" name = "Quantity" id="Quantity"
            value ="<?php echo $result['Quantity'] ?>" 
            min ="1"
            max = "100"
            step ="1" />
            </label><br>

            <button type = "submit" class="btn success" name="update">Update</button>
            <button type = "button" class="btn info" onclick="clickme()">Back</button>
    </form>

    </body>
</html>