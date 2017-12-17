

<html>
    <head>
        <meta charset="UTF-8">
        <title>Add a Book</title>
    </head>

    <body>
        <form action = "add.php" method="post">
            <label>Id : 
            <input type ="text"  name = "isbnBook" id="isbnBook"maxlength = "1000000000"
            placeholder ="ID of the book" </label>0~99999999999<br>

            <label>Name: 
            <input type = "text"name = "Title" id="Title" maxlength="100" 
            placeholder="Name of the book"/></lable>Ex : Java Program<br>

            <label>Genre : 
            <input type = "text" name = "genre" id="genre"maxlength="100" 
            placeholder="Genre of the book"/></lable>Ex : Computer Science<br>

            <label>Id : 
            <input type ="number" name = "Quantity" id="Quantity"
            placeholder ="Quantity of the book"
            min ="1"
            max = "10"
            step ="1" />
            </label>1~10<br>

            <input type = "submit" value="Add">
            <input type ="reset"    value="Clear">

    </body>


</html>