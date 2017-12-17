<?php
	include('dbconnection.php');
	$bookDB = connectTable("book");
?>

<html>
	<head>
		<title>Book data</title>
	</head>

	<body>

		<table width="600" border = "1" cellpaddin = "1" cellspacing ="1">
			<caption>Book data</caption>
			<tr>
				<th>Id</th>
				<th>Title</th>
				<th>Genre</th>
				<th>Quantity</th>
			</tr>
			<tr>
				<?php

				while($book=mysqli_fetch_assoc($bookDB)){
					
					echo "</tr>";
					
					echo "<td>".$book['isbnBook']."</td>";
					
					echo "<td>".$book['Title']."</td>";
					
					echo "<td>".$book['genre']."</td>";
					
					echo "<td>".$book['Quantity']."</td>";
					
					echo "</tr>";
				}

				?>
			</tr>

		</table>
	</body>
</html>