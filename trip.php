<!DOCTYPE html>
<html>
    <head>
        <title>Ski Trip Explorer</title>
        <link rel="stylesheet" href="style.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link rel="shortcut icon" href="linerider.png" type="image/x-icon">
    </head>
    <body>
    <script>
            for ( i = 0; i < 50; i++) {
                let div = document.createElement("div");
                div.className = "snowflake";
                document.body.appendChild(div);
                console.log(div.className)
            }
        </script>
    <nav>
		<ul>
			<li><a href ="resort.php" class="navli">Edit/Add Resort</a></li>
			<li><a href ="index.php"><h1>Ski Trip Explorer</h1></a> </li>
			<li ><a href ="trip.php" class="navli">Edit Trip</a> </li>
		</ul>
	</nav>
<div class="content">
    <div class="update">
        <form action="updateTrip.php" method="post">
            <label for="name">Trip Name:</label><br>
            <input type="text" id='name' name="name"><br><br>
            <label for="days">Length in Days:</label><br>
            <input type="text" id='days' name="days"><br><br>
            <label for="resort">Resort Name:</label><br>
            <input type="text" id='resort' name="resort"><br><br>
            <button type="submit" name="Submit">Submit</button>
            <button type="submit" name="Delete">Delete</button>

        </form > 
    </div>
    </div>
    </body>
</html>