<html>
<head>
        <meta charset-"UTF-8">
        <title>Form of Return</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
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
                        <a class="navbar-brand" href="#">Borrow Management Website</a>
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

		<table  id ="a">
		<h1>Borrow Management</h1>
		<hr>
			<thead>
				<tr>
					<th>Borrow ID</th>
                    <th>Book ID</th>
					<th>Date Borrowed</th>
					<th>Date Returned</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
					include('dbconnect.php');
					$sql = $dbhandle->query("SELECT * from user_borrow_book");
					while($user=$sql->fetch_assoc()){
				?>

				<tr>
					<td><?php echo $user['borrowId']?></td>
					<td><?php echo $user['Book_isbnBook']?></td>
					<td><?php echo $user['DateBorrowed']?></td>
					<td><?php echo $user['DateReturned']?></td>
					
                </tr>
                    <?php
                    }?>
				
			</tbody>
        </table>
                    </div>
                    </div>
                    </div>
                    </div>
                   <center><button type = "button" class="btn info" onclick="clicka()">Back</button></center>

                   <script>
                       function clicka()
                       {
				        window.location="phptestdbconnect.php";
                       }
                    </script>
    </body>



</html>