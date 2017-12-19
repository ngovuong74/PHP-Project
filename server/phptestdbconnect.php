
<html>
	<head>
		<title>Book data</title>
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

			table {
    				border-collapse: collapse;
    				width: 100%;
					}

			th, td {
    			text-align: center;
   				 padding: 8px;
					}

	tr:nth-child(even) {background-color: #f2f2f2;}
	th {
    background-color: #4CAF50;
    color: white;
}
		</style>
	</head>

	<body>
	<script type="text/javascript">
		function buttonclick()
		{
		window.location="../addbookform.html";
		}
	</script>

	<script type="text/javascript">
		function clickbutton()
		{
		window.location="update.php";
		}
	</script>

	<h1><center>BOOK DATA MANGEMENT</center></h1>
		<table align ="center" width="600" border = "1" cellpaddin = "1" cellspacing ="1" id ="mydata">
			<caption><strong>Book data</strong></caption>
			<thead>
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Genre</th>
					<th>Quantity</th>
					<th>Action</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Genre</th>
					<th>Quantity</th>
					<th>Action</th>
				</tr>
			</tfoot>
			<tbody>
				<?php
					// $dbhandle = mysqli_connect('localhost','root','','mydb');
					$dbhandle = mysqli_connect('localhost','root','','cs4443');
					if($dbhandle->connect_errno)
					{
						echo "Fail to connect(".$dbhandle->connect_errno.")".$dbhandle->connect_error;
					}
					$sql = $dbhandle->query("SELECT isbnBook,Title,genre,Quantity from book");
					while($book=$sql->fetch_assoc()){
				?>

				<tr>
					<td><?php echo $book['isbnBook']?></td>
					<td><?php echo $book['Title']?></td>
					<td><?php echo $book['genre']?></td>
					<td><?php echo $book['Quantity']?></td>
					<td>
					
					<a href="update.php?idd=<?php echo $book['isbnBook'] ?>">Edit</a>

						<a onclick="return confirm('Are your sure?')" 
						href="phptestdbconnect.php?idd=<?php echo $book['isbnBook'] ?>">
						Delete</a>
						
						
					</td>
					<?php
						}
						if(isset($_GET['idd']))
						{
							$idd=$_GET['idd'];
							$record = $dbhandle->query("delete from book where isbnBook ='$idd'");
							if($record)
						{
							//header("location: phptestdbconnect.php");
							?>
					<script>
						alert("Success to delete");
						window.location='phptestdbconnect.php';
					</script>
							<?php

						} else
						{
					?>
					<script>
						alert("Not Success to delete");
						window.location='phptestdbconnect.php';
					</script>
					<?php
						}
						}
					?>
				</tr>
			</tbody>
		</table>
		<center><button type = "button" class="btn success" onclick="buttonclick()">Add a book</button></center>
	</body>
</html>