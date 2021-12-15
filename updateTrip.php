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

        if ( isset( $_POST['submit'] ) ) { 

            
            
            $days = $_POST["days"];
            $resort = $_POST["resort"];
            $name = $_POST["name"];


            #add if resort exists logic ?
            $sql = "SELECT count(*) cnt from trip WHERE name='$name'";
            $result = $conn->query($sql);
            $row = $result->fetch_row();
            $cnt = $row[0];

            $sql = "SELECT resortID from resortInfo WHERE name='$resort' ";
            $result = $conn->query($sql);
            $row = $result->fetch_row();
            $id = $row[0];


            if ($cnt != 0) { 

                $sql = "UPDATE trip SET days='$days', resort_id='$id' WHERE name='$name'";

                if ($conn->query($sql) === TRUE) {
                    echo "<h1>Trip: '$name' succesfully updated.</h1>";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {

                # need to find out max resort_id and increment that by 1
                $sql = "SELECT max(trip_id) from trip";
                $result = $conn->query($sql);
                $row = $result->fetch_row();
                $max = $row[0];
                $max = $max + 1;


                $sql = "INSERT INTO trip(name, resort_id, days, trip_id) VALUES ('$name', '$id','$days', '$max') ";

                if ($conn->query($sql) === TRUE) {
                    echo "<h1>Trip: '$name' succesfully created.</h1>";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }

            $conn->close();
        } else {
            $name = $_POST["name"];

            #add if resort exists logic ?
            $sql = "DELETE from trip WHERE name='$name'";
            $result = $conn->query($sql);
            echo "<h1>Trip: '$name' succesfully deleted.</h1>";
        }

    ?>

    </body>
</html>



