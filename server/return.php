<html>
<head>
    <meta charset="UFT-8">
    <title>Return Book</title>
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
                        <a class="navbar-brand" href="#">Return submit Website</a>
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
                <form class="form-horizontal" action ="returnbook.php"  method="POST">
                    <fieldset>
                        <div id="legend">
                            
                                <legend>Return Book</legend>
                            
                        </div>
                        <div class="control-group">
                            <label class="control-label">Username: </label>
                            <div class="controls">
                                <input type ="text"  placeholder ="Username" name = "borrowId" id="borrowId" maxlength = "1000000000" class="input-xlarge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Borrowed Book ID: </label>
                            <div class="controls">
                                <input type ="text"  placeholder ="ID of Book" name = "isbnBook" id="isbnBook" maxlength = "1000000000" class="input-xlarge">
                            </div>
                        </div>

                        <button type = "submit" class="btn success" name="sunmit" id="submit" onclick="clicktogo()">Submit</button>
                        <a href="phptestdbconnect.php" type = "button" class="btn success" id="back" style="margin-top: 10px;">Back</a>
                    </fieldset>
                </form>         
            </div>
            </div>
                        
                
</body>

</html>