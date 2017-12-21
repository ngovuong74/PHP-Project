
<html>
	<head>
		<title>Book data</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/index.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

	<body>

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
                        <a class="navbar-brand" href="#">Library Book Management Website</a>
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
	<div class="container-fluid">
        <div class="row">
		<div class="col-sm-9 col-sm-offset-1 col-md-10 col-md-offset-1 main">

		<table  id ="mydata">
		<h1>Book Management</h1>
		<hr>
			<thead>
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Authors</th>
					<th>Genre</th>
					<th>Quantity</th>
					<th>Action</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
					include('dbconnect.php');
					$sql = $dbhandle->query("SELECT isbnBook,Title,Authors,genre,Quantity from book");
					while($book=$sql->fetch_assoc()){
				?>

				<tr>
					<td><?php echo $book['isbnBook']?></td>
					<td><?php echo $book['Title']?></td>
					<td><?php echo $book['Authors']?></td>
					<td><?php echo $book['genre']?></td>
					<td><?php echo $book['Quantity']?></td>
					<td>
					
					<a class="btn btn-success" href="update.php?idd=<?php echo $book['isbnBook'] ?>">Edit</a>

						<a class="btn btn-info" onclick="return confirm('Are your sure?')" 
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
						alert("Not Success to delete Because a User is borrowing it");
						window.location='phptestdbconnect.php';
					</script>
					<?php
						}
						}
					?>
				</tr>

				
			</tbody>
		</table>
		<center><button type = "button" class="btn success" onclick="buttonclick()">Add a book</button>
		<button type = "button" class="btn success" onclick="clickreturn()">Return book</button></center>
		
					</div>	
	</div>
	</div>
					
	
	
		<script type="text/javascript">
		function buttonclick()
		{
		window.location="../addbookform.html";
		}
	</script>
			<script type="text/javascript">
		function clickreturn()
		{
		window.location="return.php";
		}
	</script>

	<script type="text/javascript">
		function clickbutton()
		{
		window.location="update.php";
		}
	</script>
 
	</body>
</html>