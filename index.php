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
			<li><a href ="index.php" class="navli"><h1>Ski Trip Explorer</h1></a> </li>
			<li ><a href ="trip.php" class="navli">Edit Trip</a> </li>
		</ul>
	</nav>
        <div class="content">
        <div class="wrapper">
            <div class="menu">
                <select name="searchType" id="searchType" class="searchType" onchange="updateDisplay()">
                    <option value="empty" id="" selected></option>
                    <option value="all" id="allOpt">Show All Resorts</option>
                    <option value="state" id="stateOpt">Select By State</option>
                    <option value="pass" id="passOpt">Select By Pass</option>
                    <option value="trip" id="tripOpt">Show a Trip</option>
                </select>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="secondLevel">
            <div id="all" class="hidden">
                <?php
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
                
                $sql = "SELECT * FROM resortInfo";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  echo '<table><tr><th>Resort</th><th>State</th><th>Open Runs</th><th>Total Runs</th><th>Open Lifts</th><th>Total Lifts</th></tr>';
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo '<tr><td>'.$row['name'].'</td><td>'.$row['state'].'</td><td>'.$row['openRuns'].'</td><td>'.$row['numRuns'].'</td><td>'.$row['openLifts'].'</td><td>'.$row['numLifts'].'</td></tr>';
                  }
                  echo '</table>';
                } else {
                  echo "0 results";
                }
                $conn->close();    
                ?>
            </div>
            <div id="state" class="hidden">                
                <div class="menu">
                    <form action="" method="post">
                    <select name="stateMenu" id="searchType" onchange="this.form.submit()">
                        <option value="empty" selected></option>
                        <?php
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
                          
                          $sql = "SELECT distinct(state) FROM resortInfo";
                          $result = $conn->query($sql);
                          
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              echo "<option value=".$row["state"].">".$row["state"]."</option>";
                            }
                          } else {
                            echo "0 results";
                          }
                          $conn->close();      
                        ?>
                    </select>
                    </form>
                </div>
            </div>
            <div id="pass" class="hidden">
                <div class="menu">
                    <form method="POST" action="">
                    <select name="passMenu" id="searchType" onchange="this.form.submit()">
                    <option value="blank" selected></option>
                    <?php
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
                          
                          $sql = "SELECT distinct(passName), passID FROM pass";
                          $result = $conn->query($sql);
                          
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              echo "<option value=".$row["passID"].">".$row["passName"]."</option>";
                            }
                          } else {
                            echo "0 results";
                          }
                          $conn->close();      
                        ?>
                    </select>
                    </form>
                </div>
            </div>
            <div id="trip" class="hidden">
                <div class="menu">
                    <form action="" method="post">
                    <select name="tripMenu" id="searchType" onchange="this.form.submit()">
                    <option value="blank" selected></option>
                    <?php
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
                          
                          $sql = "SELECT distinct(name), trip_id FROM trip";
                          $result = $conn->query($sql);
                          
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              echo "<option value=".$row["trip_id"].">".$row["name"]."</option>";
                            }
                          } else {
                            echo "0 results";
                          }
                          $conn->close();      
                        ?>
                    </select>
                    </form>
                </div>
            </div>
        </div>

        <?php

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
                
            if (isset($_POST["passMenu"])) {
                $pass = $_POST["passMenu"];
                $sql = "SELECT * FROM resort NATURAL JOIN resortInfo where pass_id='$pass'";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  echo '<table><tr><th>Resort</th><th>State</th><th>Open Runs</th><th>Total Runs</th><th>Open Lifts</th><th>Total Lifts</th></tr>';
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo '<tr><td>'.$row['name'].'</td><td>'.$row['state'].'</td><td>'.$row['openRuns'].'</td><td>'.$row['numRuns'].'</td><td>'.$row['openLifts'].'</td><td>'.$row['numLifts'].'</td></tr>';
                  }
                  echo '</table>';
                } else {
                  echo "0 results";
                }
                unset($_POST);
            } else if (isset($_POST["stateMenu"])) {
                $state = $_POST["stateMenu"];

                $sql = "SELECT * FROM resortInfo where state='$state'";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  echo '<table><tr><th>Resort</th><th>State</th><th>Open Runs</th><th>Total Runs</th><th>Open Lifts</th><th>Total Lifts</th></tr>';
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo '<tr><td>'.$row['name'].'</td><td>'.$row['state'].'</td><td>'.$row['openRuns'].'</td><td>'.$row['numRuns'].'</td><td>'.$row['openLifts'].'</td><td>'.$row['numLifts'].'</td></tr>';
                  }
                  echo '</table>';
                } else {
                  echo "0 results";
                }
                unset($_POST);
            } else if (isset($_POST["tripMenu"])) {
                $trip = $_POST["tripMenu"];
                $sql = "SELECT * FROM trip join resortInfo on trip.resort_id = resortInfo.resortID where trip_id = '$trip'";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                echo "<h1>Trip Resort Info:</h1>";

                  echo '<table><tr><th>Resort</th><th>State</th><th>Open Runs</th><th>Total Runs</th><th>Open Lifts</th><th>Total Lifts</th></tr>';
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo '<tr><td>'.$row['name'].'</td><td>'.$row['state'].'</td><td>'.$row['openRuns'].'</td><td>'.$row['numRuns'].'</td><td>'.$row['openLifts'].'</td><td>'.$row['numLifts'].'</td></tr>';
                  }
                  echo '</table>';
                } else {
                  echo "0 results";
                }

                unset($_POST);
            }
            unset($_POST);                            
            $conn->close();   

        ?>
        
        <script src="functions.js"></script>
        </div>
    </body>
</html>