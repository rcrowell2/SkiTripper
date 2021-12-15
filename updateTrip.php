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

    <?php
        error_reporting(E_ALL);

        if ( isset( $_POST['name'] ) ) { 

            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "skitrip";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            $days = $_POST["days"];
            $resort = $_POST["resort"];
            $name = $_POST["name"];


            #add if resort exists logic ?
            $sql = "SELECT count(*) cnt from trip WHERE name='$name'";
            $result = $conn->query($sql);
            $row = $result->fetch_row();
            $cnt = $row[0];
            echo "<h1>count:  '$cnt'</h1>";


            if ($cnt != 0) { 

                $sql = "UPDATE trip SET days='$days', resort_id='$resort_id' WHERE name='$name'";

                if ($conn->query($sql) === TRUE) {
                    echo "<p> that shit worked'$name' update</p>";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                $sql = "INSERT INTO trip(name, resort_id, days) VALUES (\"'$name'\", '$resort_id','$openRuns', '$numLifts', '$openLifts') ";

                if ($conn->query($sql) === TRUE) {
                    echo "<p> that shit worked'$numRuns'</p>";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }

            $conn->close();
        } else {
            echo "<p>there is nothing going on here :(</p>";
        }

    ?>

    </body>
</html>



