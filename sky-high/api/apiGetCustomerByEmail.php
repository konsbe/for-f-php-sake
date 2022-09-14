<?php
      require_once '../env.php';
      //Open Connection
      $connecionstr="host=".DB_SERVER." port=5432 dbname=".DB_BASE." password=".DB_PASS." user=".DB_USER." options='--client_encoding=UTF8'";
      $dbconn = pg_connect($connecionstr);
      $milliseconds = floor(microtime(true) * 1000);
      
      // Check connection
      if (!$dbconn) {
        die("Connection failed: " . pg_connect_error());
      }
      
      //Sql query
      $sql = "SELECT * from passengers WHERE passenger_mail LIKE '".$_POST['emailF']."';";
      $result = pg_query($dbconn, $sql) ;
      //Check results
      if ($result) {
        // echo json_encode($result);
        // echo var_dump(json_encode($result));
        $seconds = $milliseconds / 1000;
        $toDate = date("d/m/Y H:i:s", $seconds);
        // var_dump($result);
        echo "<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;top:50%;text-align: center;'>
        <p>O πελάτης που Ψαχνεις</p> <br>
        <a href='../routes/dashboard.php'>Back</a>
        </div>";
        echo "<div  class='divTable'>";
        echo "<table  style='height:100px;background-color: antiquewhite;width:100%;margin:auto;position: absolute;top:50%;text-align: center;' id='flyghts'>";
        echo "  <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Id card</th>
        <th>@email</th>
        <th>adress</th>
        <th>Created on</th>
        </tr>";
        while ($column = pg_fetch_row($result)) {
          echo "<tr>
          <td>$column[0]</td>
          <td>$column[1]</td>
          <td>$column[2]</td>
          <td>$column[3]</td>
          <td>$column[4]</td>
          <td>$toDate</td>
          </tr>
          ";
          echo "</div>";
        }       }else {
          echo "<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;top:50%;text-align: center;'>
          <p>Δε βρέθηκε ο πελάτης που Ψαχνεις</p> <br>
          <a href='../routes/dashboard.php'>Back</a>
          </div>";
          die('Query failed: ' . pg_last_error());
        }
        
        //Close connection
        pg_close($dbconn);
        
        $dbconn = pg_connect($connecionstr);
        $milliseconds = floor(microtime(true) * 1000);

        $sqld = "SELECT * from passengers INNER JOIN passenger_flight
           ON passengers.passenger_id=passenger_flight.passenger_id  WHERE passenger_mail LIKE '".$_POST['emailF']."';";
        $resultd = pg_query($dbconn, $sqld) ;
        if ($resultd) {
            // echo json_encode($result);
            // echo var_dump(json_encode($result));
            $seconds = $milliseconds / 1000;
            $toDate = date("d/m/Y H:i:s", $seconds);
            // var_dump($result);
            echo "<div  class='divTable'>";
            echo "<table  style='height:100px;background-color: antiquewhite;width:100%;margin:auto;position: absolute;top:50%;text-align: center;' id='flyghts'>";
            echo "  <tr>
              <th>No.</th>
              <th>Passsenger id</th>
              <th>Flight no</th>
              <th>ticket no</th>
              <th>Book Date</th>
              <th>Book Ref</th>
              <th>Ticket Fare</th>
              <th>Ticket Price</th>
              <th>Arrival Airport</th>
              <th>Departure Airport</th>
            </tr>";
            while ($column = pg_fetch_row($resultd)) {
            echo "<tr>
              <td>$column[7]</td>
              <td>$column[8]</td>
              <td>$column[9]</td>
              <td>$column[10]</td>
              <td>$column[11]</td>
              <td>$column[12]</td>
              <td>$column[13]</td>
              <td>$column[14]</td>
              <td>$column[15]</td>
              <td>$column[16]</td>
              </tr>
              ";
              echo "</div>";
            }} else {
               echo "<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;top:50%;text-align: center;'>
          <p>Δε βρέθηκε πτήση για τον πελάτη που Ψαχνεις</p> <br>
          <a href='../routes/dashboard.php'>Back</a>
          </div>";
          die('Query failed: ' . pg_last_error());
    }
        ?>