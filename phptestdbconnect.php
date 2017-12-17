<!-- <?php
	include('dbconnection.php');
	$bookDB = connectTable("book");
?> -->

<html>
	<head>
		<title>Book data</title>
	</head>

	<body>
	<script type="text/javascript">
		function buttonclick()
		{
		window.location="addbookform.php";
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
					$dbhandle = mysqli_connect('localhost','root','','mydb');
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
						<a onclick="return confirm('Are your sure?')" 
						href="?idd=<?php echo $book['isbnBook'] ?>">
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
							header("location: phptestdbconnect.php");
						} else
						{
					?>
					<script>
						alert("Success to delete");
						window.location.herf='phptestdbconnect.php';
					</script>
					<?php
						}
						}
					?>
				</tr>
			</tbody>
		</table>
		<center><button type = "button" onclick="buttonclick()">Add a book</button></center>
	</body>
</html>