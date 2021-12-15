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

    <div class="update">
            <form action="update.php" method="post">
            <label for="name">Resort Name:</label><br>
            <input type="text" id='name' name="name"><br><br>
            <label for="numRuns">Total Runs:</label><br>
            <input type="text" id='numRuns' name="numRuns"><br><br>
            <label for="openRuns">Open Runs:</label><br>
            <input type="text" id='openRuns' name="openRuns"><br><br>
            <label for="numLifts">Total Lifts:</label><br>
            <input type="text" id='numLifts' name="numLifts"><br><br>
            <label for="openLifts">Open Lifts:</label><br>
            <input type="text" id='openLifts' name="openLifts"><br><br>
            <label for="state">State:</label><br>
            <input type="text" id='state' name="state"><br><br>
            <input type="submit" value="Submit">
        </form >
    </div>
       
    </body>
</html>