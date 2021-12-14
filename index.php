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
        <nav><h1>Ski Trip Planner</h1></nav>
        
        <div class="wrapper">
            <div class="menu">
                <select name="searchType" id="searchType" class="searchType" onchange="updateDisplay()">
                    <option value="empty" id="" selected></option>
                    <option value="all" id="allOpt">Show All Resorts</option>
                    <option value="state" id="stateOpt">Select By State</option>
                    <option value="pass" id="passOpt">Select By Pass</option>
                    <option value="trip" id="tripOpt">Show / Create a Trip</option>
                </select>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="secondLevel">
            <div id="all" class="hidden">
                <p>showing all resorts...</p>


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
                
                $sql = "SELECT name, openRuns, openLifts FROM resortInfo";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  echo "<table><tr><th>name</th><th>openRuns</th><th>openLifts</th></tr>";
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["name"]."</td><td>".$row["openRuns"]."</td><td>".$row["openLifts"]."</td></tr>";
                  }
                  echo "</table>";
                } else {
                  echo "0 results";
                }
                $conn->close();    
                ?>


            </div>
            <div id="state" class="hidden">                
                <div class="menu">
                    <select name="stateMenu" id="searchType">
                        <option value="state1">state1</option>
                        <option value="state2">State2</option>
                        <option value="state3">state3</option>
                        <option value="state4">state4</option>
                    </select>
                </div>
            </div>
            <div id="pass" class="hidden">
                <div class="menu">
                    <select name="passMenu" id="searchType">
                        <option value="pass1">ikon</option>
                        <option value="pass2">epic</option>
                        <option value="pass3">indy</option>
                    </select>
                </div>
            </div>
            <div id="trip" class="hidden">
                <div class="menu">
                    <select name="trip" id="searchType">
                        <option value="trip1">existingtrip</option>
                        <option value="noTrip">create a new Trip</option>
                    </select>
                </div>
            </div>
        </div>
        
        <script src="functions.js"></script>
    
    </body>
</html>